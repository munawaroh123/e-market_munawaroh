<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan'; //dafinisi nama table
    //protected $id = 'id_pelanggan';
    protected $guarded = ['id'];
    
}
