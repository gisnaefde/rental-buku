<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

// fillable digunakan untuk mendaftarkan nama kolom yang akan ditambahkan/edit ke database
    protected $fillable = [
        'name'
    ];
}
