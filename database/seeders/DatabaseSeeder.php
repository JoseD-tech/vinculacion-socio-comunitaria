<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TipoActividad;
use App\Models\StatusActividad;
use Illuminate\Database\Seeder;
use App\Models\ProgramaAcademico;
use App\Models\LineaInvestigacion;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Estatus de las Actividades

        DB::table('status_actividads')->insert([
            'status_actividad' => 'Inicio'
        ]);

        DB::table('status_actividads')->insert([
            'status_actividad' => 'Cierre'
        ]);

        //Crea Activid

        DB::table('tipo_actividads')->insert([
            'TipoActividad' => 'Actividad Especial'
        ]);

        DB::table('tipo_actividads')->insert([
            'TipoActividad' => 'Curso'
        ]);

        DB::table('tipo_actividads')->insert([
            'TipoActividad' => 'Diplomado'
        ]);

        DB::table('tipo_actividads')->insert([
            'TipoActividad' => 'Proyecto'
        ]);

        //Programas Academicos

        DB::table('programa_academicos')->insert([
            'programa_academico' => 'PIAT'
        ]);

        DB::table('programa_academicos')->insert([
            'programa_academico' => 'Ciencias de la educación'
        ]);

        DB::table('programa_academicos')->insert([
            'programa_academico' => 'Ciencias de la Salud'
        ]);

        DB::table('programa_academicos')->insert([
            'programa_academico' => 'Ciencias del Agro y Mar'
        ]);

        DB::table('programa_academicos')->insert([
            'programa_academico' => 'Ciencias Jurídicas'
        ]);

        DB::table('programa_academicos')->insert([
            'programa_academico' => 'Ciencias Sociales'
        ]);

        DB::table('programa_academicos')->insert([
            'programa_academico' => 'Estudios Avanzados'
        ]);

        //Linea de Investigacion

        DB::table('linea_investigacions')->insert([
            'linea_investigacion' => 'Ambiente'
        ]);
    }
}
