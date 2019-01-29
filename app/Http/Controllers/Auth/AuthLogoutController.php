<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthBaseController;

class AuthLogoutController extends AuthBaseController
{
    public function __invoke()
    {
        // invalidate the user token
        $this->auth->invalidate($this->auth->getToken());

        return response(null, 200);
    }
}
