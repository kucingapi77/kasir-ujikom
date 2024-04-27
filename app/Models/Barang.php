<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table ="barangs";
    protected $fillable = [
        'nama_barang',
        'harga',
        'stok',
        'diskon',
    ];

    public function HistoryStok()
    {
        return $this->hasMany(HistoryStok::class,'id','id_barang');
    }
    public function DetailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class,'id','id_barang');
    }


}
