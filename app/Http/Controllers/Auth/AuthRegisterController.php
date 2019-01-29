<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterFormRequest;
use App\Http\Controllers\Auth\AuthBaseController;

class AuthRegisterController extends AuthBaseController
{
    public function __invoke(RegisterFormRequest $request)
    {
        // create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $this->auth->attempt($request->only('email', 'password'));

        return response()->json([
            'data' => $user,
            'meta' => [
                'token' => $token
            ]
        ], 200);

    }
}
