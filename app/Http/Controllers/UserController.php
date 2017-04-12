<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests;

class UserController extends Controller
{
    public function getDangnhap(){
    	return view('Login.login');
    }
    public function postDangnhap(Request $request){
    	$this->validate($request,[
    		'username'=>'required',
    		'password'=>'required|min:3|max:20'
    		],[
    		'username.required'=>'Ban chua nhap username',
    		'password.required'=>'Ban chua nhap pass',
    		'password.min'=>'It nhat 3',
    		'password.max'=>'Nhieu nhat 20'
    		]);
    	if (Auth::attempt(['username'=>$request->username,'password'=>$request->password])) {
    		return view('layouts.app');
    	}
    	else  {
    		return view('Login.login');
    	}
    }
}
