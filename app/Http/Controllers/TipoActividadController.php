<?php

namespace App\Http\Controllers;

use App\Models\tipoActividad;
use App\Models\TipoActividad as ModelsTipoActividad;
use Illuminate\Http\Request;

class TipoActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retorna los tipos de actividades que hay en la la tabla tipo de actividades
        return ModelsTipoActividad::all();
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
    public function show(tipoActividad $tipoActividad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tipoActividad $tipoActividad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tipoActividad $tipoActividad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tipoActividad $tipoActividad)
    {
        //
    }
}
