<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{


    public function create(){
        return view('register');

    }
    public function store(Request $request){
        $formValiate = $request->validate([
            'name' => 'required|string',
            'email' => ['required','email', Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6',
        ]);
        $formValiate['password'] = bcrypt($formValiate['password']);
        $user = User::create($formValiate);
        auth()->login($user);
        return redirect('/')->with('message', 'User created');

    }
    public function authenticate(Request $request){
        $formValiate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt($formValiate)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'you are now logged in');
        }
        return back();

    }
    public function login(){

        return view('login');

    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }
}

