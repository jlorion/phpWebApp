<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{


    public function create(){
        return view('users.register');

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
        return back()->with('message', 'incorrect password')->with('type', 'error');

    }
    public function login(){

        return view('users.login');

    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }
    public function user(){
        return view('users.edit');
    }
    public function update(Request $request, User $user){

        if($request->has("name")){
            $data=['name'=>$request->name];
             DB::table('users')->where('id', auth()->id())->update($data);
            return back();
        }
        if( $request->has("email")){
            $data=['email'=>$request->email];
            DB::table('users')->where('id', auth()->id())->update($data);
            return back();
        }
        if($request->has('password')){//pending wla ko kabalo ngano dli nako ni ma update
            $formValiate = $request->validate([
                'old_password' => 'required',
                'password' => 'required|confirmed',
            ]);
            dd($formValiate);
        }

    }
}

