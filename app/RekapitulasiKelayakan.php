<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RekapitulasiKelayakan extends Model
{
    use SoftDeletes;
    protected $table = 'rekapitulasi_kelayakan';
}
