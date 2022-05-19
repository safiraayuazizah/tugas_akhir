<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::orderByDesc('id')->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'total' => $request->total,
            'status' => 'pending',
        ]);

        foreach ($request->courses as $course) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'course_id' => $course,
            ]);
        }

        ShoppingCart::where('user_id', Auth::user()->id)->delete();

        return redirect()->back()->with('alert', 'Pesanan Anda berhasil di checkout!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  string  $status
     * @return \Illuminate\Http\Response
     */
    public function update($id, $status)
    {
        Transaction::where('id', $id)->update([
            'status' => $status
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
