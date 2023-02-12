<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identifikasi extends Model
{
    use HasFactory;

    public $table = 'identifikasi';

    public $fillable = ['id_penguna', 'created_at', 'updated_at'];

    public function gejala()
    {
        return $this->hasMany(Identifikasi_gejala::class, 'id_identifikasi', 'id');
    }
    public function gejalahama()
    {
        return $this->hasMany(Identifikasi_gejala::class, 'id_identifikasi', 'id');
    }
    public function gejalapenyakit()
    {
        return $this->hasMany(Identifikasi_gejala::class, 'id_identifikasi', 'id');
    }

    public function penguna()
    {
        return $this->belongsTo(Penguna::class, 'id_penguna', 'id');
    }
}
