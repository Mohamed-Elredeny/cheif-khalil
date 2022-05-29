<?php

namespace App\Http\Controllers\Users\Chief;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ChiefController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:chief');
    }

    public function index()
    {
        if (Auth::guard('chief')->user()->state == '1') {
            //echo 'active';
            return view('chief.sections.container');

        }
        else
        {
            Auth::logout();
            //echo 'ban logout';
            return redirect('/chief/login')->with('success','your account not approved');
        }

    }
}
