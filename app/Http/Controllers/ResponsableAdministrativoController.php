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
        return ResponsableAdministrativo::all();
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
    public function show(ResponsableAdministrativo $responsableAdministrativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResponsableAdministrativo $responsableAdministrativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResponsableAdministrativo $responsableAdministrativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResponsableAdministrativo $responsableAdministrativo)
    {
        //
    }
}