<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_Posyandu extends Model
{
    use HasFactory;

    protected $table = 't_posyandu';
    protected $fillable = ['nama','t_dusun_id', 'deskripsi'];

    public function t_dusun()
    {
        return $this->belongsTo(T_Dusun::class, 't_dusun_id', 'id');
    }

    public function posyandu(){
        return $this->belongsTo(Posyandu::class);
    }
}
