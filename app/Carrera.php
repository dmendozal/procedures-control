<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carrera';
    public $timestamps = false;
    protected $fillable = [
        'idcarrera',
        'nombre',
        'codigo_carrera'
    ];
    protected $primaryKey = 'idcarrera';
}
