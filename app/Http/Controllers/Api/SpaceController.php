<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Controllers\Controller;

// Component
use ApiResponseBuilder;
use SpaceResponseBuilder;

// Model
use SpaceModel;

// Service
use SpaceService;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        try {
            $space = SpaceService::create($request);
        }
        catch (\Exception $e) {
            return ApiResponseBuilder::serverError();
        }
        return ApiResponseBuilder::createResponse(SpaceResponseBuilder::formatData($space));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $key)
    {
        try {
            $space = SpaceModel::where('key', $key)->firstOrFail();
          }
          catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::unauthorized();
          }
          catch (\Exception $e) {
            return ApiResponseBuilder::serverError();
          }
          return ApiResponseBuilder::createResponse(SpaceResponseBuilder::formatData($space));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$key)
    {
        try {
            $space = SpaceModel::where('key', $key)->firstOrFail();
            $space = SpaceService::update($request,$key);
        }
        catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::modelNotFound('request', $key);
        }

        return ApiResponseBuilder::createResponse(SpaceResponseBuilder::formatData($space));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
