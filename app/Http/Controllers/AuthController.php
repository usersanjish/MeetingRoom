<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function registerForm(){
    	return view('pages.register');
    }

    public function register(UserRequest $request){
    	$user = User::add($request->all());
    	$user->generatPassword($request->get('password'));
    	return redirect('/login')->with(['success' => 'Регистрация прошла успешно']);
    }

    public function loginForm(){
    	return view('pages.login');
    }

    public function login(LoginRequest $request){
    	if (Auth::attempt([
    		'email' => $request->get('email'),
    		'password' => $request->get('password')
    	])) {
    		return redirect('/');
    	}
    	return redirect()->back()->with('status', 'Неправильный логин или пароль');
    }

    public function logout(){
    	Auth::logout();
    	return redirect('login');
    }
}
