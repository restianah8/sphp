<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Pengetahuan;
use App\Models\Penyakit;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $allgetp = array();
        $gjls = array();
        $allgejala = array();
       
        $getpscount = array(); //count pil
       
        $perpenyakit = array();
        $allinputbobot = array();
        foreach($request->kode as $value){
            array_push($allgejala, $value);
            $getps = DB::table('pengetahuan')
                    ->select('id_penyakit', 'id_gejala', 'bobot')
                    ->where('id_gejala', $value)
                    ->get();
            array_push($getpscount, $getps[0]);

            foreach($getps as $psc){
                $idp = $psc->id_penyakit;
                $bobotp = $psc->bobot;
                if(!in_array($idp, $perpenyakit, true)){
                    array_push($perpenyakit, $idp);
                }
                array_push($allinputbobot, $bobotp);
            }
           
        }
        
        // echo '<br>==========================================================================<hr>';
        
        $coba_allgejala = array();
        foreach($request->kode as $gjl){
            $htngp = Pengetahuan::where('id_gejala', $gjl)->get();

            foreach ($htngp as $pp){
                $md_array[$pp['id_penyakit']][] = $pp['bobot'];
            }

        }
        
        $pisahpenyakit = array();
        $pisahskor = array();
        foreach($perpenyakit as $exx){
            
            $pisah = $md_array[$exx];
           
            array_push($pisahpenyakit, $pisah);
            
            foreach ($pisah as $skor){
                
                array_push($pisahskor, $skor);
            }
           
        }
        
       
        $namapenyakit = array();
        $gambarpenyakit = array();
        $solosipenyakit = array();
        foreach($perpenyakit as $item){
            $namap = Penyakit::where('id', $item)->get();
            $name = $namap[0]['nama'];
            $photo = $namap[0]['gambar'];
            $solosi = $namap[0]['solosi'];


            array_push($namapenyakit, $name);
           array_push($gambarpenyakit, $photo);
           array_push( $solosipenyakit,  $solosi);
        }
        
        $done = array();
        for($i=0; $i < count($pisahpenyakit); $i++){
            $jumlahbobot = array_sum($pisahpenyakit[$i]);
            $allpehx = array();
            for($x=0; $x < count($pisahpenyakit[$i]); $x++){
                $allbobot = $pisahpenyakit[$i][$x];
                $allph = $allbobot/$jumlahbobot;
                $pehx = $allbobot * $allph;
                array_push($allpehx, $pehx);
            }
            echo '<br>';
            $jumlahallpehx = array_sum($allpehx);
           
            $allbayes = array();
            for($x=0; $x < count($pisahpenyakit[$i]); $x++){
                $allbobot = $pisahpenyakit[$i][$x];
                // echo 'Bobot:'.$allbobot.'--';
                
                $allphx = $allbobot/$jumlahbobot;
                $allph = number_format($allphx,4);
                // echo 'Ph:'.$allph.'--';
                

                $pehxx = $allbobot * $allph;
                $pehx = number_format($pehxx,4);
                // echo 'Phex:'.$pehx.'--';
                array_push($allpehx, $pehx);
                
                $rumusx = ($allbobot * $allph)/$jumlahallpehx;
                $rumus = number_format($rumusx,4);
                
                // echo 'Rumus:'.$rumus.'--';

                $bayesx = ($allbobot * $rumus);
                $bayes = number_format($bayesx,4);
                // echo 'Bayes:'.$bayes.'||';
               
                array_push($allbayes, $bayes);
            }
            $hasil = array_sum($allbayes) * 100;
            $last = $hasil.'%';
            array_push($done, $last);

            
        }

            for($i=0; $i < count($done); $i++){
                $data = $namapenyakit[$i].' = '.$done[$i];
                // echo '<hr>'.$data.'<br>';
            }
            return view('identifikasi/result',[
                "penyakit"=>$namapenyakit , 
                "gambar"=>$gambarpenyakit,
                "solosi"=>$solosipenyakit,
                "hasil"=>$done]);
    }
}
