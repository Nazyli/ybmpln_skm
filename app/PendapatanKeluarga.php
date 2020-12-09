<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendapatanKeluarga extends Model
{
    use SoftDeletes;
    protected $table = 'pendapatan_keluarga';
}
