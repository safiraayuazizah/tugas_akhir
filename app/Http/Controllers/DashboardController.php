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

    public function filterTopCourses(Request $request)
    {
        $top_courses = "";
        $output = "";
        if ($request->filter == 'today')
        {
            $top_courses = TransactionDetail::select('course_id', DB::raw('count(*) as total'))
                            ->whereDate('created_at', Carbon::today())
                            ->groupBy('course_id')
                            ->orderByDesc('total')
                            ->take(10)
                            ->get();
        }
        else if ($request->filter == 'week')
        {
            $top_courses = TransactionDetail::select('course_id', DB::raw('count(*) as total'))
                            ->whereDate('created_at', '>=', Carbon::today()->subDays(7))
                            ->whereDate('created_at', '<=', Carbon::today())
                            ->groupBy('course_id')
                            ->orderByDesc('total')
                            ->take(10)
                            ->get();
        }
        else if ($request->filter == 'month')
        {
            $top_courses = TransactionDetail::select('course_id', DB::raw('count(*) as total'))
                            ->whereDate('created_at', '>=', Carbon::today()->subDays(30))
                            ->whereDate('created_at', '<=', Carbon::today())
                            ->groupBy('course_id')
                            ->orderByDesc('total')
                            ->take(10)
                            ->get();
        }
        else
        {
            $top_courses = TransactionDetail::select('course_id', DB::raw('count(*) as total'))
                        ->groupBy('course_id')
                        ->orderByDesc('total')
                        ->take(10)
                        ->get();
        }

        foreach ($top_courses as $item) 
        {
            $output .= '<tr>' .
                '<td>' . wordwrap($item->course->title, 110, "<br>\n") . '</td>' .
                '<td class="font-weight-bold">' . $item->course->creator . '</td>' .
                '<td>Rp ' . number_format($item->course->price, 0, ",", ".") . '</td>' .
                '</tr>';
        }

        return $output;
    }
}
