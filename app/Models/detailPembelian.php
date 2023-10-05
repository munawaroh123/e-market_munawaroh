<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailPembelian extends Model
{
    use HasFactory;
    protected $table = 'detail_pembelian'; //dafinisi nama table
    //protected $id = 'id_pemasok';
    protected $guarded = ['id'];
}
