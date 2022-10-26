<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Penguna extends Model implements Authenticatable
{
    use HasFactory, HasFactory, Notifiable, AuthenticableTrait;
    
    public $table = 'penguna';
    protected $fillable = [
        'name',
        'alamat',
        'email',
        'password',
    ];
    public $timestamps = false;
}
