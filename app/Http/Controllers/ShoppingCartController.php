<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShoppingCart::where('user_id', Auth::user()->id)->get();
        return view('clients.shopping_cart', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $check_data = ShoppingCart::where('user_id', Auth::user()->id)->where('course_id', $id)->count();
        if ($check_data == 0) {
            ShoppingCart::create([
                'user_id' => Auth::user()->id,
                'course_id' => $id,
            ]);

            $alert = 'Course berhasil dimasukkan ke keranjang!';
        } else {
            $alert = 'Course sudah ada di keranjang Anda!';
        }
        return redirect()->route('home')->with('alert', $alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShoppingCart::where('id', $id)->delete();

        return redirect()->back()->with('alert', 'Course berhasil dihapus dari keranjang!');
    }
}
