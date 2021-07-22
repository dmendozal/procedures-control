<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTramite extends Model
{
    protected $table = 'tipo_tramite';
    public $timestamps = false;
    protected $fillable = [
        'idtipo_tramite',
        'nombre'
    ];
    protected $primaryKey = 'idtipo_tramite';

}
