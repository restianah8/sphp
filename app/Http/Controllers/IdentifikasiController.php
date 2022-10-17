<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Pengetahuan;
<<<<<<< HEAD
use App\Models\Riwayat;
=======
>>>>>>> fd9298b1638b0e87e74da06f98f805aa6e671ef5
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IdentifikasiController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
    return view('identifikasi/index',compact('gejala'));
    }

<<<<<<< HEAD
    public function result (Request $request)
    {
        // $request->validate([
        //     'nama'=>'required',
        //     'jenis_kelamin'=>'required',
        //     'umur'=>'required',
        //     'alamat'=>'required',
        //     'response'=>'required',
        //     'hasil'=>'required'
        // ], [
        //     'kode'=>'kode wajib di isi',
        //     'nama.required'=>'nama wajib di isi',
        //     'Diskripsi.required' =>'Diskripsi wajib di isi',
        //     'alamat.required'=>'solosi wajib di isi',
        //     'response.required'=>'silakan masukan gambar',
        //     'hasil'=>'hasil',
        // ]);
    	// $this->validate($request, [
    	// 		'nama' => 'required',
    	// 		'alamat' => 'required',
    	// 		'pekerjaan' => 'required',
    	// 		'gejala' => 'required|min:2'
    	// 	],
        //     [
        //         'gejala.min' => 'Gejala yang di pilih minimal 2',
        //         'gejala.required' => 'Gejala wajib dipilih'
        //     ]);

        //     $riwayat = [
        //         'nama'=> $request -> input('nama'),
        //         'jenis_kelamin'=> $request -> input('jenis_kelamin'),
        //         'umur'=> $request -> input('umur'),
        //         'alamat'=> $request -> input('alamat'),
        //         'response'=> $request -> input('response'),
        //         'id_gejala'=> $request -> input('id_gejala'),
        //         'hasil'=> $request -> input('hasil'),
                
        //     ];
        //     Riwayat ::create($riwayat);

=======
    public function result(Request $request)
    {
>>>>>>> fd9298b1638b0e87e74da06f98f805aa6e671ef5
        $gejala = Gejala::all();
        // $pengetahuan = Pengetahuan::where('id_gejala', $);
        $allgetp = array();
        $gjls = array();
        $allbobot = array();
        foreach($request->kode as $gjl){
<<<<<<< HEAD

=======
>>>>>>> fd9298b1638b0e87e74da06f98f805aa6e671ef5
            // echo $gjl.'<br>';
            // $p = array_push($gjls, $gjl);
            $gjls[] = $gjl;
            // print_r($p);
<<<<<<< HEAD
            $getp = Pengetahuan::where('id_gejala', $gjl)
                                // ->where('id_penyakit', $gjl)   
                                ->get();
=======
            $getp = Pengetahuan::where('id_gejala', $gjl)->get();
>>>>>>> fd9298b1638b0e87e74da06f98f805aa6e671ef5
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
<<<<<<< HEAD
                $getb = Pengetahuan::where('id_gejala', $gjl)
                                    // ->where('id_penyakit', $gjl)   
                                    ->get();
=======
                $getb = Pengetahuan::where('id_gejala', $gjl)->get();
>>>>>>> fd9298b1638b0e87e74da06f98f805aa6e671ef5
                $bobot = $getb[0]['bobot'];
            }
            $allbobot[] = $bobot;
            // echo 'Bobot:'.$bobot.'<br>';
        }
        print_r($allgetp);
<<<<<<< HEAD
        // dd($allbobot);
=======
        dd($allbobot);
>>>>>>> fd9298b1638b0e87e74da06f98f805aa6e671ef5
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
<<<<<<< HEAD
    
=======
>>>>>>> fd9298b1638b0e87e74da06f98f805aa6e671ef5
    }
}
