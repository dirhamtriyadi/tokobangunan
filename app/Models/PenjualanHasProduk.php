<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanHasProduk extends Model
{
    use HasFactory;

    protected $table = 'penjualan_has_produk';
    public $timestamps = false;
    protected $fillable = [
        'penjualan_id',
        'produk_id',
        'qty',
        'harga'
    ];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id', 'id', 'penjualan');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id', 'produk');
    }
}
