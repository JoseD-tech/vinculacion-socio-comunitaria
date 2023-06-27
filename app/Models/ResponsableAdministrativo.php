<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsableAdministrativo extends Model
{
    use HasFactory;
    // Relacion inversa responsableAdministrativo a ActividaSocioComunitaria
    public function responsablesAdministrativos()
    {
        return $this->hasMany(ActividaSocioComunitaria::class, 'resp_administrativo_id', 'id');
    }
}
