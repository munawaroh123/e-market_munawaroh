<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    protected $table = 'pemasok'; //dafinisi nama table
    //protected $id = 'id_pemasok';
    protected $guarded = ['id'];
    
}
