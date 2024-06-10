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
    ];
    public function user()
    {
        return $this->belongsTo(User::class); // Menetapkan relasi belongsTo
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
