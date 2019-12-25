<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Override method
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return UserResource
     */
    protected function sendLoginResponse(Request $request)
    {
        $user = $this->guard()->user();

        $token = $user->createToken('Laravel Personal Access Client')->accessToken;

        $logged_in_time = now();

        $status = [ 'code' => 200, 'message' => 'Access Granted' ];

        return (new UserResource($user))->additional(['token' => $token, 'status' => $status, 'logged_in_time' => $logged_in_time]);
    }

    /**
     * Override method
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Get current auth user info
     * @return UserResource
     */
    public function me()
    {
        $user = $this->guard()->user();

        return new UserResource($user);
    }
}
