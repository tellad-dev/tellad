<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Controllers\Controller;

// Component
use ApiResponseBuilder;
use AdResponseBuilder;

// Model
use AdModel;

// Service
use AdService;

class AdController extends Controller
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
            $ad = AdService::create($request);
        }
        catch (\Exception $e) {
            return ApiResponseBuilder::serverError();
        }
        return ApiResponseBuilder::createResponse(AdResponseBuilder::formatData($ad));
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
            $ad = AdModel::where('key', $key)->firstOrFail();
        }
        catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::modelNotFound('business', $key);
        }
        return ApiResponseBuilder::createResponse(AdResponseBuilder::formatData($ad));
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
            $ad = AdModel::where('key', $key)->firstOrFail();
            $ad = AdService::update($request,$key);
        }
        catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::modelNotFound('request', $key);
        }

        return ApiResponseBuilder::createResponse(AdResponseBuilder::formatData($ad));
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
