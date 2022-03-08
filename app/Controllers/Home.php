<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }

    public function coba1(){
        return view('coba1');
    }
    public function dashboard()
    {
    return view('dashboard');
    }
    
}
