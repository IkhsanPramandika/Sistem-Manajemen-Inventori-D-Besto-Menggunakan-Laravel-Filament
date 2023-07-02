<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;
    protected $fillable = ['Kode_bahan' ,'Nama_bahan', 'Total_bahan' , 'Tanggal_bahan'];

}
