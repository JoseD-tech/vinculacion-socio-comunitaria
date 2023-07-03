@php
    $heads = ['Nombre y Apellido', 'Correo', 'Acciones'];

@endphp

@extends('adminlte::page')


@section('title', 'Responsables Administrativos')

@section('content_header')
    <h2>
        Responsables Administrativos</h2>
    <div class="mt-4 pa-2 py-4 shadow-sm p-3 mb-5 bg-white rounded">

        <div class="d-flex align-items-center justify-content-end">
            <p>Acciones:</p>
            <div>
                <x-adminlte-button label="Registrar Usuario" data-toggle="modal" data-target="#registrarUsuario"
                    class="bg-success" icon="fas fa-plus" />
            </div>
        </div>

        <div class="mt-2">
            <x-adminlte-datatable id="table1" :heads="$heads" class="bg-white">
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            @role('usuarios')
                                <p>Sin Permisos</p>
                            @endrole
                            @role('admin')
                                <form action="{{ route('usuario.destroy', $usuario->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-adminlte-button type='submit' theme="danger" icon="fa fa-lg fa-fw fa-trash"
                                        class="mr-2" />
                                </form>
                            @endrole
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>

    </div>
    @role('admin')
        <x-adminlte-modal id="registrarUsuario" title="Registrar Usuario" theme="success" icon="fas fa-plus" size='md'
            disable-animations>
            <form action="{{ route('usuario.store') }}" method="POST">
                @csrf
                <div class="form-row">

                    <div class="col-md-12 mb-3">
                        <label for="name">Nombre y Apellido:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="email">Correo:</label>
                        <input type="text" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="rol">Rol:</label>
                        <select class="custom-select" id="rol" name="rol[]" required>
                            <option selected disabled>Selecciona Tipo de Actividad</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="clave">Clave:</label>
                        <input type="password" class="form-control" id="clave" name="clave">
                    </div>

                </div>
                <button class="btn btn-success w-100 mt-4" type="submit">Registrar Tipo De Datos</button>
            </form>
            <x-slot name="footerSlot">
                <x-adminlte-button theme="danger" label="Cancelar Registro" data-dismiss="modal" />
            </x-slot>
        </x-adminlte-modal>
    @endrole

@stop

@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
