<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthBaseController;
use App\Http\Requests\Auth\LoginFormRequest;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthLoginController extends AuthBaseController
{
    public function __invoke(LoginFormRequest $request)
    {
        try {
            if (!$token = $this->auth->attempt($request->only('email', 'password'))) {
                return response()->json([
                    'errors' => [
                        'root' => 'Could not sign you in with that credentials. Please try again.'
                    ]
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'errors' => [
                    'root' => 'Failed'
                ]
            ], $e->getStatusCode());
        }

        // everthing is ok
        return response()->json([
            'data' => $request->user(),
            'meta' => [
                'token' => $token
            ]
        ], 200);
    }
}
