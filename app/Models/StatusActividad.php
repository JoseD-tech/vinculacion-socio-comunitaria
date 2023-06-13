<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusActividad extends Model
{
    use HasFactory;
    public function statusActividades()
    {
        return $this->hasMany(ActividaSocioComunitaria::class);
    }
}
