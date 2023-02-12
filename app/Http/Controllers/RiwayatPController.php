<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\Penyakit;
use App\Models\Identifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RiwayatPController extends Controller
{
    function index()
    {
        $id_penguna = Auth::guard('web')->user()->id;
        //       $riwayat =Riwayat::where('id_penguna', $id_penguna)->groupBy('created_at')->orderBy('created_at', 'DESC')->get();
        $riwayat = Riwayat::where('id_penguna', $id_penguna)->orderBy('created_at', 'DESC')->get();
        $riwayata = array();
        foreach ($riwayat as $hasil) {
            $index = $hasil->created_at->format('Y-m-d H:i:s');;

            $bnt = (int)$hasil->persentase;
            $bnt3 = $hasil->hama_penyakit;
            if (isset($riwayata[$index])) {

                $bnt2 = (int)$riwayata[$index]->persentase;
                if ($bnt < $bnt2) {
                    $bnt =   $bnt2;
                    $bnt3 = $riwayata[$index]->hama_penyakit;
                }
            }
            $riwayata[$index] = $hasil;
            $riwayata[$index]->persentase = $bnt . '%';
            $riwayata[$index]->hama_penyakit = $bnt3;
        }

        $riwayat = Identifikasi::where('id_penguna', auth()->user()->id)
            ->with('gejala', 'gejalahama', 'gejalapenyakit')->latest()->get();

        return view('Riwayat.index', [
            'riwayat' => $riwayat,
        ]);
    }

    function show($idp, $tgl)
    {
        $riwayat = Riwayat::where([['id_penguna', $idp], ['created_at', $tgl]])->orderBy('persentase', 'DESC')->get();
        return view('Riwayat/show', [
            "riwayat" => $riwayat,
        ]);
    }
}
