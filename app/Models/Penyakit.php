<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    public $table = 'penyakit';
    protected $fillable = [ 'id','kode','nama','Diskripsi','solosi','gambar'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
