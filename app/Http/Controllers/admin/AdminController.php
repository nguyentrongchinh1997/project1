<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    public function getLayoutIndex()
    {
    	return view('admin.layouts.index');
    }
}
