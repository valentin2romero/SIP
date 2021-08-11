<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Textosentencias extends Model
{
    protected $fillable = [
        'variable','opcion','descripcion','fecha_inicio','fecha_final', 'dependencia_id'
    ];
}