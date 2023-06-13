<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoActividad extends Model
{
    use HasFactory;
    // Relacion Inversa tipoActividad a ActividaSocioComunitaria
    public function tipoActividades()
    {
        return $this->hasMany(ActividaSocioComunitaria::class);
    }
}
