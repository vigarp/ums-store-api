<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Penjualan extends Model
{
    use HasFactory;

    protected $table = 'item_penjualans';
    protected $fillable = ['nota', 'kode_barang', 'qty'];
    protected $primaryKey = 'nota';
}
