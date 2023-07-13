<?php

namespace App\Exports;

use App\Models\ActividaSocioComunitaria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class TipoExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $tipo = ActividaSocioComunitaria::where('tipo_actividad_id', $this->id)->get();
        return view('actividades/exportTipo', [
            'tipo' => $tipo
        ]);
    }
}
