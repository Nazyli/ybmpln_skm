<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendaftarFoto extends Model
{
    use SoftDeletes;
    protected $table = 'pendaftar_foto';
}
