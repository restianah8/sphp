<?php

use App\Models\Identifikasi_gejala;

if (!function_exists('getGejalaTertinggi')) {
    function getGejalaTertinggi($identifikasi)
    {
        $persentaseTertinggi = Identifikasi_gejala::where('id_identifikasi', $identifikasi)
            ->max('persentase');

        $gejala = Identifikasi_gejala::where('id_identifikasi', $identifikasi)
            ->where('persentase', $persentaseTertinggi)
            ->with('penyakit')
            ->get();

        return $gejala;

        // if (count($gejala) > 0) {
        //     return $gejala[0];
        // }

        // return null;
    }
}

if ( ! function_exists('getGejala'))
{
    function getGejala($identifikasi)
    {
        $gejala = Identifikasi_gejala::where('id_identifikasi', $identifikasi)
            ->orderBy('persentase', 'DESC')
            ->get();

        return $gejala;
    }
}