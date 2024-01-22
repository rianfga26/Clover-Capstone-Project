<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    use HasFactory;

    protected $table = 'posyandu';
    protected $fillable = ['nik','nkk','t_posyandu_id','p_kategori_id', 'user_id', 'nama', 'tempat_lahir', 'tgl_lahir', 'alamat', 'rt_rw', 'umur'];

}
