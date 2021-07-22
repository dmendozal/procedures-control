<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $table = 'tecnico';
    public $timestamps = false;
    protected $fillable = [
        'idtecnico',
        'nombre',
        'telefono'
    ];
    protected $primaryKey = 'idtecnico';
}
