<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPosyandu extends Model
{
    use HasFactory;

    protected $table = 'p_kategori';
    protected $fillable = [
        'nama',
        'deskripsi'
    ];

    public function posyandu(){
        return $this->belongsTo(Posyandu::class);
    }
}
