<?php

namespace App\Http\Controllers;

use App\Models\Gejalapenyakit;
use App\Models\Identifikasi;
use App\Models\pengetahuanpenyakit;
use App\Models\Penguna;
use App\Models\Penyakit;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class identifikasipenyakitp extends Controller
{
    public function index()
    {
        $gejalapenyakit = Gejalapenyakit::all();
        return view('identifikasipenyakitp/index', compact('gejalapenyakit'));
    }
    public function result(Request $request)
    {
        if (!$request->kode) {
            return redirect()->back()->with('succses', 'Maaf Anda Belum Memilih Gejala!!!
             Silahkan Pilih Terlebih Dahulu');;
        }
        $identifikasi = Identifikasi::create(['id_penguna' => auth()->user()->id]);


        $penguna = Penguna::all();
        $gejalahama = Gejalapenyakit::all();
        $allgetp = array();
        $gjls = array();
        $allgejala = array();

        $getpscount = array(); //count pil

        $perpenyakit = array();
        $allinputbobot = array();
        foreach ($request->kode as $value) {
            array_push($allgejala, $value);
            $getps = DB::table('pengetahuanpenyakit')
                ->select('id_penyakit', 'id_gejalapenyakit', 'bobot')
                ->where('id_gejalapenyakit', $value)
                ->get();
            array_push($getpscount, $getps[0]);

            foreach ($getps as $psc) {
                $idp = $psc->id_penyakit;
                $bobotp = $psc->bobot;
                if (!in_array($idp, $perpenyakit, true)) {
                    array_push($perpenyakit, $idp);
                }
                array_push($allinputbobot, $bobotp);
            }
        }

        // echo '<br>==========================================================================<hr>';

        $coba_allgejala = array();
        foreach ($request->kode as $gjl) {
            $htngp = pengetahuanpenyakit::where('id_gejalapenyakit', $gjl)->get();

            foreach ($htngp as $pp) {
                $md_array[$pp['id_penyakit']][] = $pp['bobot'];
            }
        }

        $pisahpenyakit = array();
        $pisahskor = array();
        foreach ($perpenyakit as $exx) {

            $pisah = $md_array[$exx];

            array_push($pisahpenyakit, $pisah);

            foreach ($pisah as $skor) {

                array_push($pisahskor, $skor);
            }
        }


        $namapenyakit = array();
        $gambarpenyakit = array();
        $solosipenyakit = array();
        $Diskripsipenyakit = array();
        $id_penyakit = [];

        foreach ($perpenyakit as $item) {
            $namap = Penyakit::where('id', $item)->get();
            $name = $namap[0]['nama'];
            $photo = $namap[0]['gambar'];
            $solosi = $namap[0]['solosi'];
            $Diskripsi = $namap[0]['Diskripsi'];

            array_push($id_penyakit, $namap[0]['id']);
            array_push($namapenyakit, $name);
            array_push($gambarpenyakit, $photo);
            array_push($solosipenyakit,  $solosi);
            array_push($Diskripsipenyakit,  $Diskripsi);
        }

        $done = array();
        for ($i = 0; $i < count($pisahpenyakit); $i++) {
            $jumlahbobot = array_sum($pisahpenyakit[$i]);
            $allpehx = array();
            for ($x = 0; $x < count($pisahpenyakit[$i]); $x++) {
                $allbobot = $pisahpenyakit[$i][$x];
                $allph = $allbobot / $jumlahbobot;
                $pehx = $allbobot * $allph;
                array_push($allpehx, $pehx);
            }
            echo '<br>';
            $jumlahallpehx = array_sum($allpehx);

            $allbayes = array();
            for ($x = 0; $x < count($pisahpenyakit[$i]); $x++) {
                $allbobot = $pisahpenyakit[$i][$x];
                // echo 'Bobot:'.$allbobot.'--';

                $allphx = $allbobot / $jumlahbobot;
                $allph = number_format($allphx, 4);
                // echo 'Ph:'.$allph.'--';


                $pehxx = $allbobot * $allph;
                $pehx = number_format($pehxx, 4);
                // echo 'Phex:'.$pehx.'--';
                array_push($allpehx, $pehx);

                $rumusx = ($allbobot * $allph) / $jumlahallpehx;
                $rumus = number_format($rumusx, 4);

                // echo 'Rumus:'.$rumus.'--';

                $bayesx = ($allbobot * $rumus);
                $bayes = number_format($bayesx, 4);
                // echo 'Bayes:'.$bayes.'||';

                array_push($allbayes, $bayes);
            }
            $hasil = array_sum($allbayes) * 100;
            $last = $hasil . '%';
            array_push($done, $last);
        }

        $_temp = [];

        for ($i = 0; $i < count($done); $i++) {
            $data = $namapenyakit[$i] . ' = ' . $done[$i];

            // echo '<hr>'.$data.'<br>';
            Riwayat::create([

                'hama_penyakit' => $namapenyakit[$i],
                'persentase' => $done[$i],
                "gambar" => $gambarpenyakit[$i],
                "solosi" => $solosipenyakit[$i],
                "Diskripsi" => $Diskripsipenyakit[$i],
                'id_penguna' => Auth::user()->id,
            ]);

            $_temp[] = $done[$i];
        }


        foreach ($id_penyakit as $index => $id) {
            $identifikasi->gejalapenyakit()->insert([
                'id_identifikasi' => $identifikasi->id,
                'id_penyakit' => $id,
                'persentase' => $_temp[$index],
            ]);
        }
        $data = [
            'penyakit' => $namapenyakit,
            'hasil' => $done,
        ];

        return view('identifikasipenyakitp/result', [
            "penyakit" => $namapenyakit,
            "gambar" => $gambarpenyakit,
            "solosi" => $solosipenyakit,
            "hasil" => $done
        ]);
    }
}
