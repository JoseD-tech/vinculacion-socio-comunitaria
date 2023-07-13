<?php

namespace App\Exports;

use App\Models\ActividaSocioComunitaria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ProgramaExport implements FromView
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
        $programa = ActividaSocioComunitaria::where('programa_academico_id', $this->id)->get();
        return view('actividades/exportPrograma', [
            'programa' => $programa
        ]);
    }
}
