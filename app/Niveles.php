<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveles extends Model
{
    protected $table = "niveles";
    protected $fillable = [
        'nombre',
    ];
}
