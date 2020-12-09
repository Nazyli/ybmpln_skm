<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramLain extends Model
{
    use SoftDeletes;
    protected $table = 'program_lain';
}
