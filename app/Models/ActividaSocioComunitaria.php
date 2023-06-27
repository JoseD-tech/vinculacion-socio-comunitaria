<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividaSocioComunitaria extends Model
{
    use HasFactory;
    // Relacion ActividaSocioComunitaria a tipoActividad
    public function tipoActividad()
    {
        return $this->belongsTo(TipoActividad::class);
    }

    // Relacion ActividaSocioComunitaria a programaAcademico
    public function programaAcademico()
    {
        return $this->belongsTo(ProgramaAcademico::class);
    }

    // Relacion ActividaSocioComunitaria a statusActividad
    public function statusActividad()
    {
        return $this->belongsTo(StatusActividad::class, 'status_actividad', 'id');
    }

    // Relacion ActividaSocioComunitaria a lineaInvestigacion
    public function lineaInvestigacion()
    {
        return $this->belongsTo(LineaInvestigacion::class);
    }

    // Relacion ActividaSocioComunitaria a responsableAdministrativo
    public function responsableAdministrativo()
    {
        return $this->belongsTo(ResponsableAdministrativo::class, 'resp_administrativo_id', 'id');
    }

    // Relacion ActividaSocioComunitaria a responsableActividad
    public function responsableActividad()
    {
        return $this->belongsTo(Responsable::class, 'responsable_id', 'id');
    }

    // Relacion ActividaSocioComunitaria a User (esto es para saber quien registro la actividad)
    public function UsuarioCreoRegistro()
    {
        return $this->belongsTo(User::class);
    }
}
