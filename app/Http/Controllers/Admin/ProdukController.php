<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Module\StoreRequest;
use App\Models\Admin\Produk;
use App\Models\Admin\ProdukCarousel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $data['list_produk'] = Produk::all();
        return view('admin.produk.index', $data);
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function show($id)
    {
        $produk = Produk::with('carousels')->findOrFail($id);
        return view('admin.produk.show', compact('produk'));
    }

    public function edit($id)
    {
        return view('admin.produk.edit', [
            'produk' => Produk::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'berat' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'nama.string' => 'Nama Harus Berupa Kalimat',
            'nama.max' => 'Nama Maksimal 255 Karakter',
            'deskripsi.required' => 'Deskripsi Harus Diisi',
            'gambar.required' => 'Gambar Harus Diisi',
            'gambar.image' => 'Gambar Harus Berupa Gambar',
            'gambar.mimes' => 'Gambar Harus Berekstensi png, jpg, atau jpeg',
            'gambar.max' => 'Gambar Tidak Boleh Lebih Dari 5 MB',
            'berat.required' => 'Berat Harus Diisi',
            'stok.required' => 'Stok Harus Diisi',
            'harga.required' => 'Harga Harus Diisi',
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous())
                ->withErrors($validator)
                ->withInput();
        }

        $produk = new Produk();
        $produk->nama = request('nama');
        $produk->deskripsi = request('deskripsi');
        $produk->berat = request('berat');
        $produk->stok = request('stok');
        $produk->harga = request('harga');
        $produk->save();

        $id_produk = $produk->id;
        $produk = new ProdukCarousel();
        $produk->handleUploadImage($id_produk);

        return redirect('admin/produk')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg|max:5120',

        ], [
            'nama.string' => 'Nama Harus Berupa Kalimat',
            'nama.max' => 'Nama Maksimal 255 Karakter',
            'gambar.image' => 'Gambar Harus Berupa Gambar',
            'gambar.mimes' => 'Gambar Harus Berekstensi png, jpg, atau jpeg',
            'gambar.max' => 'Gambar Tidak Boleh Lebih Dari 5 MB'
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous())
                ->withErrors($validator)
                ->withInput();
        }

        $produk = Produk::find($id);
        if (request('nama')) $produk->nama = request('nama');
        if (request('deskripsi')) $produk->deskripsi = request('deskripsi');
        if (request('berat')) $produk->berat = request('berat');
        if (request('harga')) $produk->harga = request('harga');
        if (request('stok')) $produk->stok = request('stok');
        $produk->save();

        if (request('gambar')) $produk->handleUploadGambar();

        return redirect('admin/produk')->with('success', 'Data Berhasil di Edit');
    }

    function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->handleDeleteGambar();
        $carousel = new ProdukCarousel();
        $carousel->handleDeleteImage($produk->id);
        $produk->delete();
        return redirect('admin/produk')->with('danger', 'Data Berhasil Dihapus');
    }
}
