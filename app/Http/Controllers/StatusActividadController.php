<?php

namespace App\Http\Controllers;

use App\Models\StatusActividad;
use Illuminate\Http\Request;

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

    public function show(Request $request, $id)
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
}
