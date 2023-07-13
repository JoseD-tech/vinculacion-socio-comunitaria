<?php

namespace App\Http\Controllers;

use App\Exports\LineaExport;
use Illuminate\Http\Request;
use App\Models\LineaInvestigacion;
use Maatwebsite\Excel\Facades\Excel;

class LineaInvestigacionController extends Controller
{

    public function index()
    {
        // retorna los valores que esten en la tabla linea de investigacion
        $lineasInvestigacion = LineaInvestigacion::all();
        return view('actividades.linea', compact('lineasInvestigacion') );
    }

    public function store(Request $request)
    {
        //
        $data = new LineaInvestigacion();
        $data->linea_investigacion = $request->input('linea_investigacion');
        $data->save();
        return redirect()->route('linea.index');
    }
    public function update(Request $request, $id)
    {
        //
        $linea = LineaInvestigacion::findOrFail($id);
        $linea->linea_investigacion = $request->input('linea_investigacion');
        $linea->save();
        return redirect()->route('linea.index');
    }

    public function destroy($id)
    {
        //
        $linea = LineaInvestigacion::find($id);
        $linea->delete();
        return redirect()->route('linea.index');
    }

    public function export($id) {
        $lineaName = LineaInvestigacion::where('id', $id)->get();
        $nombre = $lineaName[0]->linea_investigacion;
        $nombreArchivo = sprintf('Lote de Linea de %s.xlsx', $nombre);
        return Excel::download(new LineaExport($id), $nombreArchivo);
    }


}
