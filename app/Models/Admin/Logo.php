<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ModelAuthenticate;
use Illuminate\Support\Str;

class Logo extends ModelAuthenticate
{
    use HasFactory;

    protected $table = 'logo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'url_logo',
        'url_ico'
    ];

    function handleUploadImg()
    {
        $this->handleDeleteImg();
        if (request()->hasFile('url_logo')) {
            $url_logo = request()->file('url_logo');
            $destination = "images/logo";
            $randomStr = Str::random(5);
            $filename = time() . "-" . $randomStr . "." . $url_logo->extension();
            $url = $url_logo->storeAs($destination, $filename);
            $this->url_logo = "app/" . $url;
            $this->save();
        }
    }

    function handleDeleteImg()
    {
        $url_logo = $this->url_logo;
        if ($url_logo) {
            $path = public_path($url_logo);
            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        }
    }

    function handleUploadIco()
    {
        $this->handleDeleteIco();
        if (request()->hasFile('url_ico')) {
            $url_ico = request()->file('url_ico');
            $destination = "images/logo";
            $randomStr = Str::random(5);
            $filename = time() . "-" . $randomStr . "." . $url_ico->extension();
            $url = $url_ico->storeAs($destination, $filename);
            $this->url_ico = "app/" . $url;
            $this->save();
        }
    }

    function handleDeleteIco()
    {
        $url_ico = $this->url_ico;
        if ($url_ico) {
            $path = public_path($url_ico);
            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        }
    }
}
