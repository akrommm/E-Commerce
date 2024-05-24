<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Model;

class Footer extends ModelAuthenticate
{
    use HasFactory;

    protected $table = 'footer';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'url_logo',
        'url_ico'
    ];
}
