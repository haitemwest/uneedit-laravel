<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => [
               'required',
                'email'
            ],
            "password" => [
                "required",
                // "min:8",
                // "max:100"
            ]
        ]);

        if(auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $request->session()->regenerate();
            return redirect('/appointments/dashboard');
        }

        return redirect('/appointments');
    }

    public function register(Request $request) {
        $data = $request->validate([
            'firstname' => [
                'required',
                'min:3', 
                'max:100'
            ],
            'lastname' => [
               'required',
               'min:3',
               'max:100'
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
            ],
            "password" => [
                "required",
                // "min:8",
                // "max:100"
            ]
        ]);

        $data["password"] = bcrypt($data["password"]);

        $user = User::create($data);
        auth()->login($user);

        return redirect('/');
    }
}
