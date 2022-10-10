<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengetahuan extends Model
{
    use HasFactory;
    public $table = 'pengetahuan';
    protected $fillable = [ 'id', 'id_penyakit', 'id_gejala','bobot'];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function gejala() {
        return $this->HasOne(gejala::class, 'id', 'id_gejala');
    }
        public function penyakit() {
            return $this->HasOne(penyakit::class, 'id', 'id_penyakit');
        }
}
