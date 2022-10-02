<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Penguna extends Model
{
    use HasFactory, HasFactory, Notifiable;
    public $table = 'penguna';
    protected $fillable = [
        'name',
        'alamat',
        'email',
        'password',
    ];
    public $timestamps = false;
}
