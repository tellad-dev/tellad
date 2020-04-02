<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Controllers\Controller;

// Component
use ApiResponseBuilder;
use UserResponseBuilder;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = UserModel::get();
      return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //
    }

  /**
   * Login check
   * 
   * @param \Illuminate\Http\Request $request
   * @return JsonResponse
   */
  public function show(string $key): JsonResponse
  {
    try {
      $user = UserModel::where('key', $key)->firstOrFail();
    }
    catch (ModelNotFoundException $error) {
      return ApiResponseBuilder::unauthorized();
    }
    catch (\Exception $e) {
      return ApiResponseBuilder::serverError();
    }

    return ApiResponseBuilder::createResponse(UserResponseBuilder::formatData($user));
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