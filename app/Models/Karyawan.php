<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'gender',
        'sandi'
    ];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'karyawan_id', 'id', 'penjualan');
    }
}
