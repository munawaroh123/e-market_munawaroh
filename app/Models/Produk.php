<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk'; //dafinisi nama table
    //protected $id = 'id_produk';
    protected $fillable = ['nama_produk'];
    
}
