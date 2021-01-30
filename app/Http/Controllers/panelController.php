<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;

class panelController extends Controller
{

    public function onlineRequest()
    {

    }

    public function onlineReserved()
    {
        return response()->view('panel.online-reserved');
    }
}
