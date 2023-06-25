<?php

namespace App\Http\Controllers;

use App\Models\ActividaSocioComunitaria;
use App\Models\TipoActividad;
use Illuminate\Http\Request;

class ActividaSocioComunitariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retorna lo que este en la tabla de actividades socio comunitaria

        //return ActividaSocioComunitaria::all();
        return view('actividades/crear');
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
    public function show(ActividaSocioComunitaria $actividaSocioComunitaria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActividaSocioComunitaria $actividaSocioComunitaria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActividaSocioComunitaria $actividaSocioComunitaria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActividaSocioComunitaria $actividaSocioComunitaria)
    {
        //
    }
}
