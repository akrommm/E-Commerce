<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    function home()
    {
        $data['list_produk'] = Produk::with('carousels')->get();
        return view('frontview.home', $data);
    }

    function shop()
    {
        $data['list_produk'] = Produk::with('carousels')->get();
        $data['list_produk'] = Produk::paginate(8);

        return view('frontview.shop', $data);
    }

    public function product($id)
    {
        return view('frontview.product', [
            'produk' => Produk::findOrFail($id)
        ]);
    }
}
