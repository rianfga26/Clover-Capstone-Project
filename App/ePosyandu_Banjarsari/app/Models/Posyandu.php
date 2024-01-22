<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    use HasFactory;
<<<<<<< HEAD

    protected $table = 'posyandu';
    protected $fillable = ['nik','nkk','t_posyandu_id','p_kategori_id', 'user_id', 'nama', 'tempat_lahir', 'tgl_lahir', 'alamat', 'rt_rw', 'umur'];
=======
    protected $table = 'posyandus';
    protected $fillable = [
        'nama',
        'deskripsi',
        'birthdate',
    ];
>>>>>>> 961a66c8f69d95524b4c50b628615e2b2a92c1a8
}
