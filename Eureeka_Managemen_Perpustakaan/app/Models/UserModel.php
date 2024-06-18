<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = '_users';
    protected $fillable =  [
        'nama',
        'tipe',
        'email',
        'password',
        'nomor'
    ];
}
