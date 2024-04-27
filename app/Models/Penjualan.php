<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table ="penjualans";

    protected $fillable = [
        'id_petugas',
        'tanggalPenjualan',
        'TotalHarga',
        'diskon',
        'totalBayar',
        'tunai',
        'kembalian',
        'id_pelanggan',
        'status',
    ];

    public function pelanggan(){
        return $this->belongsTo(pelanggan::class,'id_pelanggan','id');
    }

    public function DetailPenjualan(){
        return $this->hasMany(DetailPenjualan::class,'id','id_penjualan');
    }
}
