<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    protected $fillable = [
        'descripcion', 'name_model'
    ];
}