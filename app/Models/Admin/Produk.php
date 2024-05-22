<?php

namespace App\Models\Admin;

use App\Models\ModelAuthenticate;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Produk extends ModelAuthenticate
{
    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar',
        'harga',
        'berat',
        'stok'
    ];

    public function carousels()
    {
        return $this->hasMany(ProdukCarousel::class, 'id_produk');
    }

    function handleUploadGambar()
    {
        $this->handleDeleteGambar();
        if (request()->hasFile('gambar')) {
            $gambar = request()->file('gambar');
            $destination = "images/gambar";
            $randomStr = Str::random(5);
            $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $gambar->extension();
            $url = $gambar->storeAs($destination, $filename);
            $this->gambar = "app/" . $url;
            $this->save();
        }
    }

    function handleDeleteGambar()
    {
        $gambar = $this->gambar;
        if ($gambar) {
            $path = public_path($gambar);
            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        }
    }
}
