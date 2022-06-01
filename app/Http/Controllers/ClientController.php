<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Profile;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

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
        $profile = Profile::first();
        return view('clients.about_us', compact('profile'));
    }

    public function contact()
    {
        return view('clients.contact');
    }

    public function profile()
    {
        return view('clients.profile');
    }

    public function enrolled_courses()
    {
        $data = TransactionDetail::whereRelation('transaction', 'user_id', Auth::user()->id)->whereRelation('transaction', 'status', 'completed')->with('transaction', 'course')->get();
        return view('clients.enrolled_courses', compact('data'));
    }

    public function detail_enrolled_courses($id)
    {
        $data = Course::find($id);
        return view('clients.detail_enrolled_course', compact('data'));
    }

    public function history_purchases()
    {
        return view('clients.history_purchases');
    }

    public function settings()
    {
        return view('clients.settings');
    }
}
