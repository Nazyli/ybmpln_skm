<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengeluaranKeluarga extends Model
{
    use SoftDeletes;
    protected $table = 'pengeluaran_keluarga';
}
