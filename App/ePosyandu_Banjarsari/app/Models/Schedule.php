<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedule';
    protected $fillable = [
        'judul',
        'tgl_awal',
        'tgl_akhir',
        'lokasi',
        'deskripsi',
        'user_id',
        't_posyandu_id',
        't_dusun_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class); // Menetapkan relasi belongsTo
    }
    public function dusun()
    {
        return $this->belongsTo(T_Dusun::class, 't_dusun_id'); // Menetapkan relasi belongsTo
    }
    public function posyandu()
    {
        return $this->belongsTo(T_Posyandu::class, 't_posyandu_id'); // Menetapkan relasi belongsTo
    }
    public function getTglAwalAttribute($value)
    {
        return Carbon::parse($value);
    }
    public function getTglAkhirAttribute($value)
    {
        return Carbon::parse($value);
    }

}
