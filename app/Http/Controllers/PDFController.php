<?php

namespace App\Http\Controllers;

use PDF;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function downloadpdf(){
        $Transaksi = Transaksi::all();

        $data = [
            'date' => date('m/d/Y'),
            'Transaksi'=> $Transaksi
        ];
        $pdf = PDF::loadView('userPDF',$data);

        return $pdf->download('Transaksi_dbesto.pdf');
    }
}
