<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user instance and set its properties
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password; // Hash the password

        // Save the user to the database
        $user->save();

    }

    public function login(loginRequest $request)
    {
        if (auth()->attempt($request->only(['email', 'password']))){
            $user = auth()->user();

            $token = $user->createToken('CLE_SECRET')->plainTextToken;

            return response()->json([
                "status" => 200,
                "message" => 'utisateur connecté',
                "user" => $user,
                "token" => $token
            ]);

        }else{
            return response()->json([
                "status" => 403,
                "message" => 'information non valide',
            ]);
        }
    }
}
