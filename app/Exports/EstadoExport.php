<?php

namespace App\Exports;

use App\Models\ActividaSocioComunitaria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class EstadoExport implements FromView
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
        $estado = ActividaSocioComunitaria::where('status_actividad', $this->id)->get();
        return view('actividades/exportEstado', [
            'estado' => $estado
        ]);
    }
}
