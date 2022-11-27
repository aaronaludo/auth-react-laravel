<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User;
        $user->name = $fields["name"];
        $user->email = $fields["email"];
        $user->password = bcrypt($fields["password"]);
        $user->save();

        $token = $user->createToken('tasky')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    public function logout(Request $request){
        // auth()->user()->tokens()->delete();

        // return [
        //     'message' => 'Logged out'
        // ];
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout successful'], 200);
    }
    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields["email"])->first();

        if(is_null($user) || !Hash::check($fields["password"], $user->password)) {
            return response()->json(['error' => 'Invalid login'], 401);
        }

        $token = $user->createToken('tasky')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    public function user(){
        return 'user';
    }
}
