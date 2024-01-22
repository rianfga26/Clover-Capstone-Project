<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_Dusun extends Model
{
    use HasFactory;

    protected $table = 't_dusun';
    protected $fillable = ['nama'];

    public function t_posyandu()
    {
        return $this->hasMany(T_Posyandu::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
