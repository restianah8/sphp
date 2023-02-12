<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identifikasi_gejala extends Model
{
    use HasFactory;

    public $table = 'identifikasi_gejala';

    public $fillable = ['ide_identifikasi', 'hama_penyakit', 'persentase', 'deskripsi', 'solusi', 'gambar', 'created_at', 'updated_at'];

    public function penyakit()
    {
        return $this->hasOne(Penyakit::class, 'id', 'id_penyakit');
    }
}
