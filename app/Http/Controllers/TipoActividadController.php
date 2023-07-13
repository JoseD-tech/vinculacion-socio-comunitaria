<?php

namespace App\Http\Controllers;

use App\Exports\TipoExport;
use Illuminate\Http\Request;
use App\Models\tipoActividad;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TipoActividad as ModelsTipoActividad;

class TipoActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retorna los tipos de actividades que hay en la la tabla tipo de actividades
        $tipoActividad = ModelsTipoActividad::all();
        return view('actividades.tipo', compact('tipoActividad'));
    }

    public function store(Request $request)
    {
        //
        $data = new tipoActividad;
        $data->tipoActividad = $request->input('tipoActividad');
        $data->save();
        return redirect()->route('tipo-actividades.index');
    }

    public function update(Request $request, $id)
    {
        //
        $tipoActividad = tipoActividad::findOrFail($id);
        $tipoActividad->TipoActividad = $request->input('tipoActividad');
        $tipoActividad->save();
        return redirect()->route('tipo-actividades.index');
    }

    public function destroy($id)
    {
        //
        $tipoActividad = tipoActividad::find($id);
        $tipoActividad->delete();
        return redirect()->route('tipo-actividades.index');
    }

    public function export($id) {
        $tipoName = tipoActividad::where('id', $id)->get();
        $nombre = $tipoName[0]->TipoActividad;
        $nombreArchivo = sprintf('Lote de Tipo de Actividad de %s.xlsx', $nombre);
        return Excel::download(new TipoExport($id), $nombreArchivo);
    }

}
