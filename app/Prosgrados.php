<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prosgrados extends Model
{
    protected $table = "posgrados";
    protected $fillable = [
        'nombre',
    ];
}
