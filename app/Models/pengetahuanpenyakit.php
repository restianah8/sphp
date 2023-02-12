<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengetahuanpenyakit extends Model
{
    use HasFactory;
    public $table = 'pengetahuanpenyakit';
    protected $fillable = ['id', 'id_penyakit', 'id_gejalapenyakit', 'bobot'];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function gejalapenyakit()
    {
        return $this->HasOne(gejalapenyakit::class, 'id', 'id_gejalapenyakit');
    }
    public function penyakit()
    {
        return $this->HasOne(penyakit::class, 'id', 'id_penyakit');
    }
}
