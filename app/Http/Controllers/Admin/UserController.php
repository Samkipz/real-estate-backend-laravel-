<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
//        dd(auth()->user());
        $this->middleware('permission:add role|update role|delete role|list role', ['only' => ['index','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles.permissions')->get();
        return response([
            'users' => UserResource::collection($users),
            'message' => 'Successful'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //Validate data with form requests
        $input = $request->validated();

        $new_password = Str::random(8);

        $hashed_random_password = Hash::make($new_password);
        $input['password'] = $hashed_random_password;

//        dd($input['name']);


        $user = User::create($input);

        event(new UserCreated($input['email'], $new_password , $input['name']));

        $user->assignRole($request->input('role'));

        return response([
            'user' => new UserResource($user),
            'message' => 'User successfully created'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $users = User::with('roles.permissions')->get();
        return User::with('roles.permissions')->get()->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $data = $request->validated();
        $input = $request->all();

        $user = User::find($id);

        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$user->id)->delete();

        $user->assignRole($request->input('roles'));

        return response([
            'user' => new UserResource($user),
            'message' => 'User successfully updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response(['message' => 'User has been deleted']);
    }
}
