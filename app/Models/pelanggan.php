<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;
    protected $table ="pelanggans";
    protected $fillable = [
        'nama_pelanggan',
        'alamat',
        'nomor_telepon',
    ];

    public function Penjualan(){
        return $this->hasMany(Penjualan::class,'id','id_pelanggan');
    }
}
