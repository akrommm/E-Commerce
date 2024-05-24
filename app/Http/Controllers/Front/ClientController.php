<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Footer;
use App\Models\Admin\Logo;
use App\Models\Admin\Produk;
use App\Models\Admin\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    function home()
    {
        $data['list_produk'] = Produk::with('carousels')->get();
        $logo = Logo::first();
        $footer = Footer::first();
        $sosmed = Sosmed::all();
        return view('frontview.home', $data, compact('logo', 'footer', 'sosmed'));
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
