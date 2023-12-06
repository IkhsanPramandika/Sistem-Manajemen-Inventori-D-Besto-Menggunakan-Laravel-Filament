<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;
    protected $fillable = ['Nama_bahan', 'Status','Total_bahan' , 'Tanggal_bahan'];

}
