<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengetahuan extends Model
{
    use HasFactory;
    public $table = 'pengetahuan';
    protected $fillable = [ 'id', 'kode', 'hama_dan_penyakit','gejala'];
    protected $primaryKey = 'id';
    public $timestamps = false;

   
}
