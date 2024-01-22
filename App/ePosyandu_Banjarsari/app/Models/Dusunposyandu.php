<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusunposyandu extends Model
{
    use HasFactory;
    protected $table = 'dusunposyandus';
    protected $fillable = [
        'posyandu',
        'dusun',
        'birthdate',
    ];
}
