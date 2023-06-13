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
        return StatusActividad::all();
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
    public function show(StatusActividad $statusActividad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusActividad $statusActividad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusActividad $statusActividad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusActividad $statusActividad)
    {
        //
    }
}
