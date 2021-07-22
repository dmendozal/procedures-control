<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = 'tramite';
    public $timestamps = false;
    protected $fillable = [
        'idtramite',
        'carta_inicial',
        'carta_final',
        'fecha_inicio',
        'fecha_final',
        'estado',
        'fkidtipo_tramite',
        'fkiduser',
        'fkidtecnico',
        'fkidestudiante'
    ];
    protected $primaryKey = 'idtramite';

    public function tipoTramite()
    {
        return $this->belongsTo(TipoTramite::class, 'fkidtipo_tramite');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fkiduser');
    }

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class, 'fkidtecnico');
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'fkidestudiante');
    }

    public function estadoTramite($estado)
    {
        switch (trim($estado)){
            case "EP":
                return "En proceso";
            case "R":
                return "Rechazado";
            case "F":
                return "Finalizado";
            case "FR":
                return "Finalizado y Recogido";
            default:
                return "";
        }
    }
}
