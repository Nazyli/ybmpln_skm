<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndikatorKeimanan extends Model
{
    use SoftDeletes;
    protected $table = 'indikator_keimanan';
}
