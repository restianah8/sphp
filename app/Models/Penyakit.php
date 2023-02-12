<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyakit extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $table = 'penyakit';
    protected $fillable = [ 'id','kode','nama','Diskripsi','solosi','gambar'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
