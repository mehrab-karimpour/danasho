<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        return response()->view('Client.index.index');
    }
}
