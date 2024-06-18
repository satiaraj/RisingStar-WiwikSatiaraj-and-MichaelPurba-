<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BUKU extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = '_book';
    protected $fillable =  [
        'Judul',
        'ISBN', 
        'Penulis', 
        'Tahun'
    ];
}
