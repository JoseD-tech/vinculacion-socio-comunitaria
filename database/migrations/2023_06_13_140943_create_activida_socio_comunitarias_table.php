<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activida_socio_comunitarias', function (Blueprint $table) {
            $table->id();
            // Relacion ActividaSocioComunitaria a tipo_actividads
            $table->foreignId('tipo_actividad_id')->require()->constrained('tipo_actividads');

            // Relacion ActividaSocioComunitaria a programa_academicos
            $table->foreignId('programa_academico_id')->require()->constrained('programa_academicos');

            // Relacion ActividaSocioComunitaria a status_actividads
            $table->foreignId('status_actividad')->default(0)->constrained('status_actividads');

            $table->integer('codigo_actividad')->require();
            $table->string('titulo_actividad')->require();

            // Relacion ActividaSocioComunitaria a linea_investigacions
            $table->foreignId('linea_investigacion_id')->require()->constrained('linea_investigacions');
            $table->date('fechaAprobacionActividad')->require();
            $table->date('fechaFinalizacionActividad')->require();
            $table->integer('numeroPersonasAtendidas')->require();
            $table->integer('numeroPersonasInscritas')->require();

            // Relacion ActividaSocioComunitaria a responsable_administrativos
            $table->foreignId('resp_administrativo_id')->require()->constrained('responsable_administrativos');

            // Relacion ActividaSocioComunitaria a responsables
            $table->foreignId('responsable_id')->require()->constrained('responsables');

            $table->integer('cedula')->require();
            $table->bigInteger('telefono')->require();
            $table->string('correo')->require();
            $table->date('fechaCierreActividad')->require();
            $table->integer('numeroResolucionAprobacion')->nullable();

            // Relacion ActividaSocioComunitaria a users
            $table->foreignId('usuario_registro_id')->require()->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activida_socio_comunitarias');
    }
};
