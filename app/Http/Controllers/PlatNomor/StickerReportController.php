<?php

namespace App\Http\Controllers\PlatNomor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nopol\Sticker;
use App\Models\Master\Mobil;
use PDF;

class StickerReportController extends Controller
{
    public function print($id)
    {
        $get = Sticker::where('id', $id)->pluck('id_mobil');
        $nopol = Mobil::where('id_mobil', $get)->first()->nopol_mobil;

        view()->share('nopol',$nopol);

        $pdf = PDF::loadView('pages.nopol.stickerPrint');
        $pdf->setOrientation('portrait');
        $options = [
            'margin-top'    => 3,
            'margin-right'  => 3,
            'margin-bottom' => 3,
            'margin-left'   => 3,
            'page-width' => 300,
            'page-height' => 145,
        ];
        $pdf->setOptions($options);
        return $pdf->stream('test.pdf');
    }
}
