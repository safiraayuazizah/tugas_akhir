<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home()
    {
        return view('clients.home');
    }

    public function about_us()
    {
        return view('clients.about_us');
    }

    public function contact()
    {
        return view('clients.contact');
    }
}
