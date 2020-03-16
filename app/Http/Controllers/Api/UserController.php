<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Controllers\Controller;

// Component
use ApiResponseBuilder;

// Model
use UserModel;

// Service
use UserService;

class UserController extends Controller
{
  // HACK: get する内容の違いや、更新可不可は apiToken　で判定
  public function __construct()
  {

  }

  /**
   * Login check
   * 
   * @param \Illuminate\Http\Request $request
   * @return JsonResponse
   */
  public function show(Request $request): JsonResponse
  {
    $apiToken = $request->apiToken;
    try {
      $user = UserModel::where('api_token', $apiToken)->firstOrFail();
    }
    catch (ModelNotFoundException $error) {
      return ApiResponseBuilder::unauthorized();
    }
    catch (\Exception $e) {
      return ApiResponseBuilder::serverError();
    }

    return ApiResponseBuilder::createResponse(AuthResponseBuilder::formatData($user));
  }

  /**
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(Request $request, string $key): JsonResponse
  {
    $apiToken = $request->apiToken;
    try {
      $user = UserModel::where('key', $key)->firstOrFail();
    }
    catch (ModelNotFoundException $error) {
      return ApiResponseBuilder::unauthorized();
    }
    catch (\Exception $e) {
      return ApiResponseBuilder::serverError();
    }

    try {
      $user = UserService::save($request->input());
      $user = UserModel::where('key', $key)->firstOrFail();
    }
    catch (\Exception $e) {
      logger()->error('User update error', ['error' => $e]);
      return  ApiResponseBuilder::serverError();
    }

    return ApiResponseBuilder::createResponse(AuthResponseBuilder::formateData($user));
  }
}