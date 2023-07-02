<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['Invoice' ,'Nama_kasir', 'Total_harga' , 'Tanggal_transaksi'];
}

