<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EstadoExport;
use App\Models\StatusActividad;
use Maatwebsite\Excel\Facades\Excel;

class StatusActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retorna los diferentes status que esten registrados en la base de datos
        $statusActividad = StatusActividad::all();
        return view('actividades.status', compact('statusActividad') );
    }

    public function store(Request $request)
    {
        //
        $statusActividad = new StatusActividad();
        $statusActividad->status_actividad = $request->input('status_actividad');
        $statusActividad->save();
        return redirect()->route('estatus.index');
    }

    public function update(Request $request, $id)
    {
        //

        $linea = StatusActividad::findOrFail($id);
        $linea->status_actividad = $request->input('status_actividad');
        $linea->save();
        return redirect()->route('estatus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $linea = StatusActividad::find($id);
        $linea->delete();
        return redirect()->route('estatus.index');
    }

    public function export($id) {
        $statusName = StatusActividad::where('id', $id)->get();
        $nombre = $statusName[0]->status_actividad;
        $nombreArchivo = sprintf('Lote de Estado de Actividad de %s.xlsx', $nombre);
        return Excel::download(new EstadoExport($id), $nombreArchivo);
    }

}
