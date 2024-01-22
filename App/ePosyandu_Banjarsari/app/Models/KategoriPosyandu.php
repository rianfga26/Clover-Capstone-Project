<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPosyandu extends Model
{
    use HasFactory;

    protected $table = 'posyandus';
    protected $fillable = [
        'nama',
        'deskripsi',
        'birthdate',
    ];
}
