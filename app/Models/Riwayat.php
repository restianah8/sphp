<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    public $table = 'riwayat';
    protected $fillable = [ 'id', 'Nama', 'jenis_kelamin','umur','alamat','response','hasl'];
    protected $primaryKey = 'id';
    protected $dates = ['created_at'];
    public $timestamps = false;

    
}
