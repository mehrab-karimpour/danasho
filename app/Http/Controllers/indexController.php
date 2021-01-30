<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class indexController extends Controller
{

    public function img()
    {
        return Session::get('online-class-verify');
       /* $img=Storage::get('offline/1/99_10_29.jpg');
       $img= Image::make($img)->resize(23, 23);
       return $img->response('png');*/

    }

    public function index(): \Illuminate\Http\Response
    {
        return response()->view('Client.index.index');
    }

    public function set()
    {
        return Session::get('verify-token-offline');

    }
}
