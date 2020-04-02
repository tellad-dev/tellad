<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\CreateKey; 
// Component
use ApiResponseBuilder;
use UserResponseBuilder;

// Model
use UserModel;

// Service
use UserService;

class AuthController extends Controller
{
    use CreateKey; 

    public function register(Request $request)
    {
        try {
            $user = UserService::create($request);
        }
        catch (\Exception $e) {
            return ApiResponseBuilder::serverError();
        }
        return ApiResponseBuilder::createResponse(UserResponseBuilder::formatData($user));
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (! $token = auth("api")->attempt($credentials)) {
            return ApiResponseBuilder::unauthorized();
        }
        try {
            $user = UserModel::where('email',$request['email'])->first();
            $user = UserService::tokenRefresh($user);
        }
        catch (\Exception $e) {
            return ApiResponseBuilder::serverError();
        }
        return ApiResponseBuilder::createResponse(UserResponseBuilder::formatData($user));
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'ログアウトしました。']);
    }
}