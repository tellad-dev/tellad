<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Controllers\Controller;

// Component
use ApiResponseBuilder;
use ShopResponseBuilder;

// Model
use ShopModel;
use UserModel;
use SpaceModel;

// Service
use UserService;
use ShopService;
use ShopFeaturesService;
use CustomerFeaturesService;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
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
        try {
            $shop = ShopService::create($request);
        }
        catch (\Exception $e) {
            return ApiResponseBuilder::serverError();
        }
        return ApiResponseBuilder::createResponse(ShopResponseBuilder::formatData($shop));
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
            $shop = ShopModel::where('key', $key)->firstOrFail();
        }
        catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::unauthorized();
        }
        catch (\Exception $e) {
            return ApiResponseBuilder::serverError();
        }
        return ApiResponseBuilder::createResponse(ShopResponseBuilder::formatData($shop));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $key)
    {
        try {
            $shop = ShopModel::where('key', $key)->firstOrFail();
            $shop = ShopService::update($request,$key);
            return $shop;
        }
        catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::modelNotFound('request', $key);
        }

        return ApiResponseBuilder::createResponse(ShopResponseBuilder::formatData($shop));
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
