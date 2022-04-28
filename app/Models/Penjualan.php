<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_nota', 'tgl', 'kode_pelanggan', 'subtotal'];
    protected $primaryKey = 'id_nota';
}
