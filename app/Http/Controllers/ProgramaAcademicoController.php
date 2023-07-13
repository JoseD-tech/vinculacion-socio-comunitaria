<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ProgramaExport;
use App\Models\ProgramaAcademico;
use Maatwebsite\Excel\Facades\Excel;

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

    public function update(Request $request, $id)
    {
        //
        $programaAcademico = ProgramaAcademico::findOrFail($id);
        $programaAcademico->programa_academico = $request->input('programa_academico');
        $programaAcademico->save();
        return redirect()->route('programa.index');
    }

    public function destroy($id)
    {
        //
        $programaAcademico = ProgramaAcademico::find($id);
        $programaAcademico->delete();
        return redirect()->route('programa.index');
    }

    public function export($id) {
        $programaName = ProgramaAcademico::where('id', $id)->get();
        $nombre = $programaName[0]->programa_academico;
        $nombreArchivo = sprintf('Lote de Programa Academico de %s.xlsx', $nombre);
        return Excel::download(new ProgramaExport($id), $nombreArchivo);
    }

}





