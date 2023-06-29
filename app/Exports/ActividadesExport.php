<?php

namespace App\Exports;

use App\Models\ActividaSocioComunitaria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ActividadesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('actividades/exportActividades', [
            'actividades' => ActividaSocioComunitaria::all(),
        ]);
    }
}
