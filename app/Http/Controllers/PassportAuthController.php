<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PassportAuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        //Validate data with form requests
        $data = $request->validated();

        if (auth()->guard('web')->attempt($data)) {

            //get user details
            $user = User::with('roles.permissions')->get()->where('email', $data['email'])->first();

            // token
            $token = $user->createToken('LaravelAuthApp')->accessToken;

            //return user with token
            return response()-> json((compact('user', 'token')));
        } else {
            return response()->json(['message' => ['provided email or password is incorrect']], 401);
        }
    }
    public function logout(Request $request)
    {
        $user = auth()->user();

        $user->tokens->each(function ($token, $key) {
//            $token->delete();
            $token->revoke();
        });
        return response()->json(['message' => 'Successfully logged out'], 201);

    }
}
