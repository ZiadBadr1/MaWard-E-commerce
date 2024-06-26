<?php

namespace App\Http\Controllers\Api\User;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $attribute = $request->validated();

        if (!$token = auth()->attempt($attribute)) {
            return ApiResponse::sendResponse('401','Unauthorized',[]);
        }

        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $attribute = $request->validated();

        $user = User::create($attribute);

        return ApiResponse::sendResponse('200','user created successfully',new UserResource($user));
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->guard('user')->logout();
        return ApiResponse::sendResponse('200','User successfully signed out',[]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return ApiResponse::sendResponse('200','This is user Profile',new UserResource(auth()->guard('user')->user()));
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => new UserResource(auth()->guard('user')->user())
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $attributes = $request->validated();

        $user = auth()->guard('user')->user();

        if(isset($attributes['password']))
        {
            $attributes['password'] = Hash::make($attributes['password']);
        }

        $user->update($attributes);

        return ApiResponse::sendResponse('200','Your profile updated successfully',new UserResource($user));

    }
}
