<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;
use App\Models\TipoActividad;
use App\Models\StatusActividad;
use App\Models\ProgramaAcademico;
use App\Exports\ActividadesExport;
use App\Models\LineaInvestigacion;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ActividaSocioComunitaria;
use App\Models\ResponsableAdministrativo;

class ActividaSocioComunitariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retorna lo que este en la tabla de actividades socio comunitaria

        $actividades = ActividaSocioComunitaria::all();
        $tiposActividades = TipoActividad::all();
        $programas = ProgramaAcademico::all();
        $status = StatusActividad::all();
        $linea = LineaInvestigacion::all();
        $administrativo = ResponsableAdministrativo::all();
        $responsable = Responsable::all();

        return view('actividades.crear', compact('actividades', 'tiposActividades', 'programas', 'status', 'linea', 'administrativo', 'responsable'));
    }
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        $data = new ActividaSocioComunitaria;
        $data->tipo_actividad_id = implode(',', $request->input('tipoActividad'));
        $data->programa_academico_id = implode(',', $request->input('programaActividad'));
        $data->status_actividad = implode(',', $request->input('estadoActividad'));
        $data->codigo_actividad = $request->input('codigoActividad');
        $data->titulo_actividad = $request->input('tituloActividad');
        $data->linea_investigacion_id = implode(',', $request->input('lineaActividad'));
        $data->fechaAprobacionActividad = $request->input('fechaAprobacion');
        $data->fechaFinalizacionActividad = $request->input('fechaFinalizacon');
        $data->numeroPersonasAtendidas = $request->input('personasAtendidas');
        $data->numeroPersonasInscritas = $request->input('personasInscritas');
        $data->resp_administrativo_id = implode(',', $request->input('responsableAdministrativo'));
        $data->responsable_id = implode(',', $request->input('responsableAcademico'));
        $data->fechaCierreActividad = $request->input('fechaCierre');
        $data->numeroResolucionAprobacion = $request->input('codigoActividad');
        $data->usuario_registro_id = $user->id;
        $data->save();
        return redirect()->route('actividades.index');
    }

    public function destroy($id)
    {
        //
        $actividad = ActividaSocioComunitaria::find($id);
        $actividad->delete();
        return redirect()->route('actividades.index');
    }

    public function export()
    {
        //
        return Excel::download(new ActividadesExport, 'Actividades.xls');
    }
}
