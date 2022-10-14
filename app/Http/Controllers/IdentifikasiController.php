<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Pengetahuan;
use Illuminate\Http\Request;

class IdentifikasiController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
    return view('identifikasi/index',compact('gejala'));
    }

    public function result(Request $request)
    {
        $gejala = Gejala::all();
        // $pengetahuan = Pengetahuan::where('id_gejala', $);
        $allgetp = array();
        $gjls = array();
        $allbobot = array();
        foreach($request->kode as $gjl){
            // echo $gjl.'<br>';
            // $p = array_push($gjls, $gjl);
            $gjls[] = $gjl;
            // print_r($p);
            $getp = Pengetahuan::where('id_gejala', $gjl)->get();
            // echo $getp[0]['penyakit'];
            // echo $getp;
            foreach($getp as $m){
                // echo $m->id.' ';
                // echo $m->id_penyakit;
                $allgetp[] = $m->id_penyakit;
            }
            // echo $getp;
            
            $htngp = Pengetahuan::where('id_gejala', $gjl)->count();
            if($htngp != 1){
                $getb = Pengetahuan::where('id_gejala', $gjl)->orderBy('bobot', 'desc')->limit(1)->get();
                $bobot = $getb[0]['bobot'];
            }else{
                $getb = Pengetahuan::where('id_gejala', $gjl)->get();
                $bobot = $getb[0]['bobot'];
            }
            $allbobot[] = $bobot;
            // echo 'Bobot:'.$bobot.'<br>';
        }
        print_r($allgetp);
        dd($allbobot);
        // for($i = 0; $i > $allbobot; $i++){
        // }
        // foreach($allbobot as $bbt){
        //     echo $bbt;
        // }
        $jumlahbobot = array_sum($allbobot);
        $allph = array();
        foreach($allbobot as $bbt){
            $ph = ($bbt/$jumlahbobot);
            $allph[] = number_format($ph,4);
        }
        
        ////////////////////////////////////
        
        // $angka=array(1,2,3,4,5,6,7,8,9,10);
        // $angka1=array(1,2,3,4,5,6,7,8,9,10);
        
        $allpehx = array();
        for($i=0; $i < count($allbobot); $i++){
            $pehx = $allbobot[$i] * $allph[$i];
            // echo $hasil[$i]. "</br>";
            $allpehx[] = number_format($pehx,4);
        }
        // foreach($allbobot as $bbt){
            // foreach($allph as $aph){
                //     $pehx = ($bbt*$aph);
                //     $pehxs[] = $pehx;
                // }
                // }
        $jumlahallpehx = array_sum($allpehx);

        $allrumus = array();
        for($i=0; $i < count($allbobot); $i++){
            $rumus = ($allbobot[$i] * $allph[$i])/$jumlahallpehx;
            
            $allrumus[] = number_format($rumus,4);
        }

        ///////////////////////////////////////////////

        $allbayes = array();
        for($i=0; $i < count($allbobot); $i++){
            $bayes = ($allbobot[$i] * $allrumus[$i]);
            
            $allbayes[] = number_format($bayes,4);
        }

        $jumlahbayes = array_sum($allbayes);
        $hasilakhir = $jumlahbayes*100;

        print_r($allbobot); //P
        echo '<br>';
        print_r($jumlahbobot); //P(E|Hx)
        echo '<br>';
        print_r($allph); //P(Hx)
        echo '<br>';
        print_r($allpehx); //P(E|Hx)
        echo '<br>';
        print_r($jumlahallpehx); //P(E|Hx)
        echo '<br>';
        print_r($allrumus); //Rumus
        echo '<br>';
        print_r($allbayes); //All bayes
        echo '<br>';
        print_r($jumlahbayes); //All bayes
        echo '<br>';
        print_r($hasilakhir.'%'); //Hasil


        // print_r($pehxs); //P(Hx)
        
        // return view('identifikasi/result');
    }
}
