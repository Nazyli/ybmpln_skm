<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';
    public $incrementing = false;
    protected $keyType = 'string';
}
