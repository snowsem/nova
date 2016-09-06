<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Facades\Input;
class UserController extends Controller

{
    public function __construct()
    {
       // $this->middleware('guest', ['except' => ['login', 'reg']]);

    }
    public function index() {
        if (Auth::check()) {
            return view('index');

        }
        else {
            return redirect('login');
        }




    }
    public function login() {

        if (Auth::check()) {
           print Auth::user()->name;
            return Redirect::intended();
        }
        else {
            return view('user.login');
        }


    }
    public function loginPost(Request $request) {
        $remember = (Input::has('remember')) ? true : false;
        if (Auth::attempt(
            [
                'login' => $request->input('login'),
                'password' =>$request->input('password')
            ], $remember
        )
        )
        {
            //Auth::login(Auth::user(), true);
            Session::flash('welcome', 'Добро пожаловать! '.Auth::user()->name);
            return Redirect::intended();
            //return Auth::user();
            // The user is being remembered...
        }

    }
    public function reg() {
        return view('user.reg');

    }
    public function regPost(Request $request) {

        return User::create([
            'name' => $request->input('name'),
            'login' => $request->input('login'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

    }
    public function logout() {
        Auth::logout();
        return redirect('login');

    }
    public function ajax() {
        return view('ajax');

    }

    //
}
