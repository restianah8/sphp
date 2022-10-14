<?php

namespace App\Http\Controllers;

use App\Models\Pengetahuan;
use App\Models\Penyakit;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IdentifikasiPengunaController extends Controller
{
    public function index()
    {
        $gejala = Pengetahuan::all();
    return view('identifikasipenguna/index',compact('gejala'));
    }

    public function result ()
    {
        // $riwayat = Riwayat::findOrFail();

        // $penyakit = Penyakit::find(unserialize($riwayat->hasil)['id_penyakit']);

       
        return view('identifikasipenguna/result');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'umur'=>'required',
            'alamat'=>'required',
            'response'=>'required',
            'hasil'=>'required'
        ], [
            'kode'=>'kode wajib di isi',
            'nama.required'=>'nama wajib di isi',
            'Diskripsi.required' =>'Diskripsi wajib di isi',
            'alamat.required'=>'solosi wajib di isi',
            'response.required'=>'silakan masukan gambar',
            'hasil'=>'hasil',
        ]);
    	$this->validate($request, [
    			'nama' => 'required',
    			'alamat' => 'required',
    			'pekerjaan' => 'required',
    			'gejala' => 'required|min:2'
    		],
            [
                'gejala.min' => 'Gejala yang di pilih minimal 2',
                'gejala.required' => 'Gejala wajib dipilih'
            ]);

        $gejala= DB::table('gejala')->whereIn('id', $request->input('gejala'))->get();

    	$penyakit = Penyakit::orderBy('id', 'asc')->get();

        // jika ada penyakit yang belum mendapatkan hubungan dengan gejala, maka dianggap terjadi kesalahan
        $countPengetahuan = DB::table('pengetahuan')->groupBy('id_penyakit')->get(['id_penyakit'])->count();
        $countPenyakit = $penyakit->count();
        if ($countPenyakit != $countPengetahuan) {
            session()->flash('danger', 'alert-danger');
            session()->flash('notifikasi', 'Maaf, terjadi kesalahan. Silakan coba beberapa saat lagi.');

            return redirect()->route('identifikasipenguna/index');
        }

        $dataStep1 = $this->prosesStep1($penyakit, $request);

        $response = $this->prosesStep2($dataStep1, $request);

        $hasil = collect($response)
                        ->sortByDesc(function($value, $key) {
                            return $value['persen'];
                        })
                        ->values()
                        ->first();
        $riwayat = [
            'nama'=> $request -> input('nama'),
            'jenis_kelamin'=> $request -> input('jenis_kelamin'),
            'umur'=> $request -> input('umur'),
            'alamat'=> $request -> input('alamat'),
            'response'=> $request -> input('response'),
            'hasil'=> $request -> input('hasil'),
            
        ];

        // save temp identity user
        session()->flashInput($request->all());

    	return redirect()->route('identifikasipenguna.result');
    }

    private function prosesStep1($penyakit, Request $request)
    {
        $no = 0;
        foreach ($penyakit as $item) {
            $dataStep1[] = [
                                'penyakit_id' => $item->id,
                                'penyakit_nama' => $item->nama,
                                'gambar' => $penyakit->gambar,
                                'gejala' => null,
                                'sum' => null,
                                'persen' => null
                            ];

            $selectedGejala = collect($request->input('gejala'))
                                    ->sort()
                                    ->values()
                                    ->all();

            foreach ($selectedGejala as $gejala) {
                $pengetahuan = DB::table('gejala_penyakit')
                                ->select('gejala_penyakit.*')
                                ->where('id_penyakit', $penyakit->id)
                                ->where('id_gejala', $gejala)
                                ->first();
                $dataGejala = DB::table('gejala')
                                ->select('gejala.*')
                                ->where('id', $gejala)
                                ->first();

                if ($pengetahuan) {
                    $bobot = $pengetahuan->bobot;
                } else {
                    $bobot = 0;
                }

                $dataStep1[$no]['gejala'][] = [
                                                'id_gejala' => $gejala,
                                                'gejala_nama' => $dataGejala->nama,
                                                'bobot' => $bobot,
                                                'atas' => null,
                                                'bawah' => null,
                                                'dibagi' => null
                                                ];
            }

            $no++;
        }

        return $dataStep1;
    }

    private function prosesStep2($dataStep1, Request $request)
    {
        for ($i=0; $i < count($dataStep1); $i++) {
            $selectedGejala = collect($request->input('gejala'))
                                    ->sort()
                                    ->values()
                                    ->all();

            for ($j=0; $j < count($selectedGejala); $j++) {
                $dataStep1[$i]['gejala'][$j]['atas'] = $dataStep1[$i]['gejala'][$j]['bobot'] * $dataStep1[$i]['penyakit_probabilitas'];

                for ($k=0; $k < count($dataStep1); $k++) {
                    $bawah[] = $dataStep1[$k]['gejala'][$j]['bobot'] * $dataStep1[$k]['penyakit_probabilitas'];
                }

                $dataStep1[$i]['gejala'][$j]['bawah'] = array_sum($bawah);
                unset($bawah);

                $dibagi = $dataStep1[$i]['gejala'][$j]['atas'] / $dataStep1[$i]['gejala'][$j]['bawah'];
                $dataStep1[$i]['gejala'][$j]['dibagi'] = round($dibagi, 6);
                $arrDibagi[] = $dataStep1[$i]['gejala'][$j]['dibagi'];
            }

            $dataStep1[$i]['sum'] = array_sum($arrDibagi);
            unset($arrDibagi);

            $dataStep1[$i]['persen'] = $dataStep1[$i]['sum'] * 100 / count($selectedGejala);
        }

        return $dataStep1;
    }

}
