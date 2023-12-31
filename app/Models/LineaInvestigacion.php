<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaInvestigacion extends Model
{
    use HasFactory;
    // Relacion inversa lineaInvestigacion a ActividaSocioComunitaria
    public function lineasInvestigaciones()
    {
        return $this->hasMany(ActividaSocioComunitaria::class);
    }
}
