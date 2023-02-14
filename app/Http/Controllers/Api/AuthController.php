<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public  function login(LoginRequest $request){
        $credentials =$request->validate();
        if (!Auth::attempt($credentials)){
            return response([
                'message'=>'provided email and password is incorrect'
            ]);
        }
        $user = Auth::user();
         //plain text token is only available for just created token i.e as soon as you get this once,
        //you won't be able to look at it anymore
        $token = $user->createToken('main')->plainTextToken;
        return response (compact('user', 'token'));

    }
    public  function logout(Request $request){
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response('', 204);
    }
}
