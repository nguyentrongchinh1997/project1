<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotFoundController extends Controller
{
    public function notFound()
    {
        return view('404');
    }
}
