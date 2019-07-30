<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    
    public function getLoginForm()
    {
    	return view('client.pages.login');
    }

    public function getSignupForm()
    {
    	return view('client.pages.signup');
    }
}
