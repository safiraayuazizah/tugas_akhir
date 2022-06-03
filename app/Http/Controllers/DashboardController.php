<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $transaction_today_count = Transaction::where('status', 'completed')->whereDate('created_at', Carbon::today())->count();
        $transaction_count = Transaction::where('status', 'completed')->count();
        $course_count = Course::count();
        $customer_count = User::where('role', 'customer')->count();
        $top_course = TransactionDetail::select('course_id', DB::raw('count(*) as total'))
                        ->groupBy('course_id')
                        ->orderByDesc('total')
                        ->take(10)
                        ->get();
        return view('admin.dashboard', compact('transaction_today_count', 'transaction_count', 'course_count', 'customer_count', 'top_course'));
    }
}
