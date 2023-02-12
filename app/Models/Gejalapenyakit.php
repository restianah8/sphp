<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejalapenyakit extends Model
{
    use HasFactory;
    public $table = 'gejalapenyakit';
    protected $fillable = ['id', 'kode', 'nama', 'gambar'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
