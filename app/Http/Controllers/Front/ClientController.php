<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function home()
    {
        $data['list_produk'] = Produk::with('carousels')->get();
        return view('frontview.home', $data);
    }
}
