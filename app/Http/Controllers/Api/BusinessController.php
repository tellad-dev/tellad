<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Controllers\Controller;

// Component
use ApiResponseBuilder;
use BusinessResponseBuilder;

// Model
use BusinessModel;

// Service
use BusinessService;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        try {
            $businessList = BusinessService::getBusinessList($id);
          }
          catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::unauthorized();
          }
          catch (\Exception $e) {
            return ApiResponseBuilder::serverError();
          }
          return ApiResponseBuilder::createResponse(BusinessResponseBuilder::businessList($businessList));
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
            $business = BusinessService::create($request);
            return $business;
        }
        catch (\Exception $e) {
            return ApiResponseBuilder::serverError();
        }
        return ApiResponseBuilder::createResponse(BusinessResponseBuilder::formatData($business));
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
            $business = BusinessModel::where('key', $key)->firstOrFail();
        }
        catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::modelNotFound('business', $key);
        }
        return ApiResponseBuilder::createResponse(BusinessResponseBuilder::formatData($business));
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
            $business = BusinessModel::where('key', $key)->firstOrFail();
            $business = BusinessService::update($request,$key);
        }
        catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::modelNotFound('request', $key);
        }

        return ApiResponseBuilder::createResponse(BusinessResponseBuilder::formatData($business));
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
