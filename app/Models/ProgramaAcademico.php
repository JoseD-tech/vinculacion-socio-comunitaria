<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaAcademico extends Model
{
    use HasFactory;
    // Relacion Inversa programaAcademico a ActividaSocioComunitaria
    public function programaAcademicos()
    {
        return $this->hasMany(ActividaSocioComunitaria::class);
    }
}
