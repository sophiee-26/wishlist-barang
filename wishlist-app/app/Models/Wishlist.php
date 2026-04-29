<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
 protected $fillable = [
        'user_id',
        'nama_barang',
        'harga',
        'link_toko',
        'prioritas',
        'catatan',
        'status',
        'gambar'
    ];
}
