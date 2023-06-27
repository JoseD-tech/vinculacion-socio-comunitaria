<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function index()
    {
        // retorna los valores que esten en la table de responsables administrativos
        $responsableAcademico = Responsable::all();

        return view('actividades.responsable-academico', compact('responsableAcademico'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new Responsable;
        $data->responsable = $request->input('responsable');
        $data->cedula = $request->input('cedula');
        $data->telefono = $request->input('telefono');
        $data->correo = $request->input('correo');
        $data->save();
        return redirect()->route('academico.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $responsableAdministrativo = Responsable::findOrFail($id);
        $responsableAdministrativo->responsable = $request->input('responsable');
        $responsableAdministrativo->cedula = $request->input('cedula');
        $responsableAdministrativo->telefono = $request->input('telefono');
        $responsableAdministrativo->correo = $request->input('correo');
        $responsableAdministrativo->save();
        return redirect()->route('academico.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $responsable = Responsable::find($id);
        $responsable->delete();
        return redirect()->route('academico.index');
    }
}
