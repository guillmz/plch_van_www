<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';

    protected $fillable = ['clave', 'name', 'description', 'notes'];

}
