<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;
    // Relacion inversa responsables a ActividaSocioComunitaria
    public function responsablesActividades()
    {
        return $this->hasMany(ActividaSocioComunitaria::class, 'id');
    }
}
