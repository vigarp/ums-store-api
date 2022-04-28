<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = ['id_pelanggan','nama', 'domisili', 'jenis_kelamin', 'password'];
    protected $primaryKey = 'id_pelanggan';
}
