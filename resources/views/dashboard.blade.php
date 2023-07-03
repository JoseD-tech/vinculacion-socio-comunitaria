@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel General</h1>
@stop

@section('content')
    <div class="container d-flex flex-wrap">
        <div class="col-md-6">
            <x-adminlte-small-box title="{{$actividades}}" text="Actividades" icon="fas fa-file-medical text-white" theme="cyan" url="/actividades/crear"
                url-text="Ver Actividades" />
        </div>
        <div class="col-md-6">
            <x-adminlte-small-box title="{{$tipos}}" text="Tipos De Actividades" icon="fas fa-file-invoice text-white" theme="indigo" url="/actividades/tipo"
                url-text="Ver Tipos De Actvidades" />
        </div>
        <div class="col-md-6">
            <x-adminlte-small-box title="{{$programas}}" text="Programas Academicos" icon="fas fa-solid fa-school text-white" theme="green" url="/actividades/programas"
                url-text="Ver Programas Academicos" />
        </div>
        <div class="col-md-6">
            <x-adminlte-small-box title="{{$cantidadLinea}}" text="Lineas De Investigacion" icon="fas fa-solid fa-money-check text-white" theme="blue" url="linea"
                url-text="Ver Lineas de Investigacion" />
        </div>
        <div class="col-md-6">
            <x-adminlte-small-box title="{{$estados}}" text="Estados De Actividades" icon="fas fa-check-square text-white" theme="pink" url="estatus"
                url-text="Ver Estados De Actividades" />
        </div>
        <div class="col-md-6">
            <x-adminlte-small-box title="{{$administrativos}}" text="Responsables Administrativos" icon="fas fa-solid fa-user-clock text-white" theme="purple" url="actividades/administrativo"
                url-text="Ver Responsables Administrativos" />
        </div>
        <div class="col-md-6">
            <x-adminlte-small-box title="{{$academicos}}" text="Ver Responsables Academicos" icon="fas fa-solid fa-user-graduate text-white" theme="info" url="actividades/academicas"
                url-text="Ver Responsables Academicos" />
        </div>
        <div class="col-md-6">
            <x-adminlte-small-box title="{{$usuarios}}" text="Ver Usuarios" icon="fas fa-fw fa-user text-white" theme="danger" url="usuarios"
                url-text="Ver Usuarios" />
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
