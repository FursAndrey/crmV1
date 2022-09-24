<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $credentional = $request->only(['email', 'password']);

        if (Auth::attempt($credentional)) {
            return response(true);
        } else {
            return response(false, 301);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response(true);
    }
}
