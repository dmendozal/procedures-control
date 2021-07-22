<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiante';
    public $timestamps = false;
    protected $fillable = [
        'idestudiante',
        'nombre',
        'ci',
        'matricula',
        'estado',
        'telefono',
        'fkidcarrera'
    ];
    protected $primaryKey = 'idestudiante';

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'fkidcarrera');
    }
}
