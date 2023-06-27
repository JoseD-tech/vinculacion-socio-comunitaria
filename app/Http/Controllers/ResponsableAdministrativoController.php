<?php

namespace App\Http\Controllers;

use App\Models\ResponsableAdministrativo;
use Illuminate\Http\Request;

class ResponsableAdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retorna los valores que esten en la table de responsables administrativos
        $responsableAdministrativo = ResponsableAdministrativo::all();

        return view('actividades/responsable-administrativo', compact('responsableAdministrativo'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new ResponsableAdministrativo;
        $data->responsable_administrativo = $request->input('responsable_administrativo');
        $data->cedula = $request->input('cedula');
        $data->telefono = $request->input('telefono');
        $data->correo = $request->input('correo');
        $data->save();
        return redirect()->route('administrativo.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $responsableAdministrativo = ResponsableAdministrativo::findOrFail($id);
        $responsableAdministrativo->responsable_administrativo = $request->input('responsable_administrativo');
        $responsableAdministrativo->cedula = $request->input('cedula');
        $responsableAdministrativo->telefono = $request->input('telefono');
        $responsableAdministrativo->correo = $request->input('correo');
        $responsableAdministrativo->save();
        return redirect()->route('administrativo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $responsableAdministrativo = ResponsableAdministrativo::find($id);
        $responsableAdministrativo->delete();
        return redirect()->route('administrativo.index');
    }
}
