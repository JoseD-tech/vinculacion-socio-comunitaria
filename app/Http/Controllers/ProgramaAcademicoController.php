<?php

namespace App\Http\Controllers;

use App\Models\ProgramaAcademico;
use Illuminate\Http\Request;

class ProgramaAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // restorna los diferentes programas academicos que estan presentes en la tabla programa academicos
        $programaAcademico = ProgramaAcademico::all();
        return view('actividades.programa', compact('programaAcademico'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new ProgramaAcademico;
        $data->programa_academico = $request->input('programa_academico');
        $data->save();
        return redirect()->route('programa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgramaAcademico $programaAcademico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramaAcademico $programaAcademico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $programaAcademico = ProgramaAcademico::findOrFail($id);
        $programaAcademico->programa_academico = $request->input('programa_academico');
        $programaAcademico->save();
        return redirect()->route('programa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $programaAcademico = ProgramaAcademico::find($id);
        $programaAcademico->delete();
        return redirect()->route('programa.index');
    }
}





