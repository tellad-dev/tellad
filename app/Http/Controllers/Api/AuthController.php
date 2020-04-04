<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\{JsonResponse, Request, Response};
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// Component
use ApiResponseBuilder;
use AuthResponseBuilder;
use UserResponseBuilder;

// Model
use UserModel;

// Service
use UserService;

use Auth;
use Hash;

class AuthController extends Controller
{

    public function register(Request $request): JsonResponse
    {
        $email = $request->email;
        $password = $request->password;

        try {
            $user = UserModel::where('email', $email)->first();
        }
        catch (\Exception $e) {
            logger()->error('User get error', ['error' => $e]);
            return ApiResponseBuilder::serverError();
        }

        // if (!empty($user)) {
        //     return AuthResponseBuilder::validationError();
        // }
        
        // $user = UserService::create(['email' => $email, 'password' => $password]);
        $user = UserService::create(['email' => $email, 'password' => $password]);

        return ApiResponseBuilder::createResponse(UserResponseBuilder::formatData($user));
    }

    /**
     * Activate on users
     * @param Request $request
     * @return JsonResponse
     */
    public function activate(Request $request): JsonResponse
    {
        $activationCode = $request->activationCode;
        try {
            $user = UserModel::where('activation_code', $activationCode)->firstOrFail();
        }
        catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::modelNotFound('user', $activationCode);
        }
        catch (\Exception $e) {
            logger()->error('User get error', ['error' => $e]);
            return ApiResponseBuilder::serverError();
        }

        if ($user->activate_expire_at < now()) {
            return ApiResponseBuilder::unauthorized();
        }

        $user->activated_at = now();
        $user->save();

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