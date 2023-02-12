<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengetahuanhama extends Model
{
    use HasFactory;
    public $table = 'pengetahuanhama';
    protected $fillable = ['id', 'id_penyakit', 'id_gejalahama', 'bobot'];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function gejalahama()
    {
        return $this->HasOne(gejalahama::class, 'id', 'id_gejalahama');
    }
    public function penyakit()
    {
        return $this->HasOne(penyakit::class, 'id', 'id_penyakit');
    }
}
