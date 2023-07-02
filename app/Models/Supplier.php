<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Supplier extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = ['Kode_supplier' ,'Nama_supplier', 'Nomor_telepon' , 'Nama_produk_supplier','Informasi_produk'];
}

