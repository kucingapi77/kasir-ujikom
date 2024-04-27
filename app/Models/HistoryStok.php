<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryStok extends Model
{
    use HasFactory;
    protected $table = "history_stoks";
    protected $fillable = [
        'id_barang',
        'stok_masuk',
        'stok_keluar',

    ];


    public function Barang()
    {
        return $this->belongsTo(Barang::class,'id_barang','id');
    }
}
