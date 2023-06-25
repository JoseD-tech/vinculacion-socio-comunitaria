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
        //return ProgramaAcademico::all();
        return view('actividades/programa');
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
    public function update(Request $request, ProgramaAcademico $programaAcademico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramaAcademico $programaAcademico)
    {
        //
    }
}
