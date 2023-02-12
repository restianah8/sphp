<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Riwayat extends Model
{
    use HasFactory;
    public $table = 'riwayat';
    protected $fillable = [ 'id', 'id_penguna','tanggal','hama_penyakit','persentase','Diskripsi', 'solosi','gambar'];
    protected $primaryKey = 'id';
    
    

    

    public function penguna() {
        return $this->hasOne(Penguna ::class, 'id', 'id_penguna');
    }
   
   
      
}
