<?php

namespace App\Http\Controllers;

use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index(): \Illuminate\Http\Response
    {
        return response()->view('Client.index.index');
    }

    public function set()
    {
        $data =  ['id' => 344];
        Session::put('online', $data);
        return Session::get('online')['id'];
    }
}
