<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Profile;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function home()
    {
        $courses = Course::all();
        $courses_total = Course::count();
        $best_sellers = TransactionDetail::select('course_id', DB::raw('count(*) as total'))
                        ->groupBy('course_id')
                        ->orderByDesc('total')
                        ->take(4)
                        ->get();
        return view('clients.home', compact('courses', 'courses_total', 'best_sellers'));
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

    public function downloadVideo($id)
    {
        $data = Course::find($id);
        return response()->download(storage_path('app/public/'. $data->video));
    }

    public function history_purchases()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->orderByDesc('created_at')->get();
        return view('clients.history_purchases', compact('transactions'));
    }

    public function history_purchases_detail($id)
    {
        $data = Transaction::find($id);
        return view('clients.detail_history_purchases', compact('data'));
    }

    public function settings()
    {
        return view('clients.settings');
    }
}
