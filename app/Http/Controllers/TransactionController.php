<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
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
            'expired_date' => Carbon::today()->add(30, 'day'),
        ]);

        foreach ($request->courses as $course) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'course_id' => $course,
            ]);
        }

        ShoppingCart::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('confirmation', $transaction->id);
    }

    public function confirmation($id)
    {
        $data = Transaction::find($id);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-XfCCy1VM3TBeutMteqli_OlH';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => $data->id,
                'gross_amount' => 10000,
            ),
            'item_details' => array(),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'last_name' => '',
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone_number,
            ),
        );

        foreach ($data->transactions as $item) {
            $params['item_details'][] = array(
                'id' => $item->id,
                'price' => (int) $item->course->price,
                'quantity' => 1,
                'name' => $item->course->title,
            );
        }

        // dd($data->transactions);
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('clients.confirmation', ['data' => $data, 'snapToken' => $snapToken]);
    }

    public function submit_midtrans(Request $request)
    {
        $json = json_decode($request->get('json'));
        
        $transaction_update= Transaction::where('id',$json->order_id)->first();
        $transaction_update->status='sukses';
        $transaction_update->pdf_url=$json->pdf_url;
        $transaction_update->save();

        return redirect()->route('history_purchases');
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
            'status' => $status,
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
