<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelAuthenticate;

class Sosmed extends ModelAuthenticate
{
    use HasFactory;

    protected $table = 'sosmed';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'link'
    ];
}
