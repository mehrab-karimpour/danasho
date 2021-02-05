<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class fileController extends Controller
{
    public function getFile($img_name)
    {
        $user_id = Auth::id();
        return Storage::get("users/$user_id/profile/$img_name");
    }
}
