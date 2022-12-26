<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }

    public function index()
    {
        return redirect('/');
    }

    public function user()
    {
        $datauser=User::all();
        return view('user/user', compact('datauser'));
    }

    public function verif()
    {
        Session::flash('message', 'Email Belum Diverifikasi'); 
        Session::flash('alert-class', 'alert-danger'); 
        Auth::logout();
        return view('auth.login');
    }
}
