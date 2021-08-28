<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|filled|string',
            'email' => 'required|filled|email|unique:users',
            'password' => 'required|filled|string'
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        return new UserResource($user);
    }

    public function index(){
        $users = User::paginate(10);
        return UserResource::collection($users);
    }

    public function show($userId){
        $user = User::findOrFail($userId);
        return new UserResource($user);
    }

    public function update($userId, Request $request){
        $user = User::findOrFail($userId);
        $validationRules = [
            'name' => 'filled|string',
            'email' => 'filled|email|unique:users',
            'password' => 'filled|string'
        ];
        $request->validate($validationRules);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        foreach($validationRules as $field => $rules){
            if($$field){
                $user->$field = $$field;
            }
        }
        $user->save();
        return new UserResource($user);
    }

    public function destroy($userId, Request $request){
        $user = User::findOrFail($userId);
        $user->delete();
        return response()->json(["status" => "ok"]);
    }
}
