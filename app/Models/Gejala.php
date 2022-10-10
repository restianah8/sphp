<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    public $table = 'gejala';
    protected $fillable = [ 'id','kode','nama','gambar'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
