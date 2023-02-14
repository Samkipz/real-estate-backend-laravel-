<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class PassportAuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        //Validate data with form requests
        $data = $request->validated();

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;

            //get user details
            $user = auth()->user();

            //return user with token
            return response()-> json((compact('user', 'token')));
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
