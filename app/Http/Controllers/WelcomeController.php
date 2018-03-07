<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome.index');
    }

    public function admin()
    {
        return view('welcome.admin');
    }

    public function client()
    {
        return view('welcome.client');
    }

    public function user()
    {
        return view('welcome.user');
    }
}
