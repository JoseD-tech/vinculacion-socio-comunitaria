<?php

namespace App\Http\Controllers;

use App\Models\LineaInvestigacion;
use Illuminate\Http\Request;

class LineaInvestigacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retorna los valores que esten en la tabla linea de investigacion
        return LineaInvestigacion::all();
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
    public function show(LineaInvestigacion $lineaInvestigacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LineaInvestigacion $lineaInvestigacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LineaInvestigacion $lineaInvestigacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LineaInvestigacion $lineaInvestigacion)
    {
        //
    }
}
