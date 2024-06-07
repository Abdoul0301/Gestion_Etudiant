<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

        public function logout()
        {
            Auth::logout();
            return to_route('login');
        }

        public function dologin(loginRequest $request)
        {
            $credentials = $request->validated();

            if(Auth::attempt($credentials))
            {
                $request->session()->regenerate();
                return redirect()->intended(route('etudiant.index'));
            }
            return to_route('login')->withErrors([
                'email' => "Email invalide"
            ])->onlyInput('email');
        }
}
