<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'email' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect(route('dashboard'));
        }
    }
}
