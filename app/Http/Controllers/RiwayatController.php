<?php

namespace App\Http\Controllers;

use App\Models\Identifikasi;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RiwayatController extends Controller
{



    function show($idp, $tgl)
    {
        // $riwayat= Riwayat::where([['id_penguna', $idp], ['created_at', $tgl]])->orderBy('persentase', 'DESC')->get();
        $riwayat = Riwayat::where('id', $idp)
            ->whereDate('created_at', $tgl)
            ->orderBy('persentase', 'DESC')
            ->get();

        $riwayat = $riwayat[0];
        // dd($riwayat);

        return view('riwayatA/show', [
            "item" => $riwayat,
        ]);
    }

    function hasil(Identifikasi $identifikasi)
    {
        // $riwayat = Riwayat::where('id', $idp)
        // ->orderBy('persentase', 'DESC')
        // ->whereDate('created_at', $tgl)->get();

        // $id_penguna = $riwayat[0]->id_penguna;

        // $hasil = Riwayat::where('id_penguna', $id_penguna)
        //     ->whereDate('created_at', $tgl)
        //     ->whereTime('created_at', $waktu)
        //     ->orderBy('persentase', 'DESC')
        //     ->get();

        // $collection = collect($hasil);
        // $hasil = $collection->unique('hama_penyakit')->values()->all();
        $tertinggi = getGejalaTertinggi($identifikasi->id);

        return view('riwayatA.hasil', compact('identifikasi', 'tertinggi'));
    }

    public function destroy(Identifikasi $identifikasi)
    {
        $identifikasi->delete();
        
        return redirect()
            ->back()
            ->withSuccess('Berhasil menghapus data');
    }
}
