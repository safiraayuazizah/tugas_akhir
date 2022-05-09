<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home()
    {
        $courses = Course::all();
        $courses_total = Course::count();
        return view('clients.home', compact('courses', 'courses_total'));
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
