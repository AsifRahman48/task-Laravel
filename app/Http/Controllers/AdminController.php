<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    function admin(){
        return view('auth.login');
    }
    function register_view(){
        return view('auth.register');
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
