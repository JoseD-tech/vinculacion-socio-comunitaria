@php
    $heads = ['ID', 'Nombre', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
@endphp

@extends('adminlte::page')


@section('title', 'Estatus De Actividad')

@section('content_header')
    <h2>Estatus De Actividad</h2>
@stop

@section('content')
    <div class="mt-4 pa-2 py-4 shadow-sm p-3 mb-5 bg-white rounded">

        @role('admin')
            <div class="d-flex align-items-center justify-content-end">
                <p>Acciones:</p>
                <div>
                    <x-adminlte-button label="Registrar Estatus" data-toggle="modal" data-target="#registrarEstatus"
                        class="bg-success" icon="fas fa-plus" />
                </div>
            </div>
        @endrole



        <div class="mt-2">
            <x-adminlte-datatable id="table1" :heads="$heads" class="bg-white">

                @foreach ($statusActividad as $estatus)
                    <tr>
                        <td>{{ $estatus->id }}</td>
                        <td>{{ $estatus->status_actividad }}</td>
                        <td class="d-flex">
                            <x-adminlte-button id="editar-estatus-{{ $estatus->id }}" data-toggle="modal"
                                data-target="#editar-estatus-{{ $estatus->id }}" theme="primary"
                                icon="fa fa-lg fa-fw fa-pen" class="mr-2" />
                            <a href="{{ route('estatus.export', $estatus->id) }}">
                                <x-adminlte-button theme="info" icon="fa fa-lg fa-fw fa-arrow-down" class="mr-2" />
                            </a>
                            @role('admin')
                                <form action="{{ route('estatus.destroy', $estatus->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-adminlte-button type='submit' theme="danger" icon="fa fa-lg fa-fw fa-trash"
                                        class="mr-2" />
                                </form>
                            @endrole

                        </td>
                        <x-adminlte-modal id="editar-estatus-{{ $estatus->id }}" title="Editar Estatus" theme="primary"
                            icon="fas fa-pen" size='md' disable-animations>
                            <form method="POST" action=" {{ route('estatus.update', $estatus->id) }} ">
                                @csrf
                                <div class="form-row">

                                    <div class="col-md-12 mb-3">
                                        <label for="status_actividad">Estatus</label>
                                        <input type="text" name="status_actividad"
                                            placeholder="{{ $estatus->status_actividad }}" class="form-control"
                                            id="status_actividad" required>
                                    </div>

                                </div>
                                <button class="btn btn-success w-100 mt-4" type="submit">Actualizar Estatus</button>
                            </form>
                            <x-slot name="footerSlot">
                                <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal" />
                            </x-slot>
                        </x-adminlte-modal>
                    </tr>
                @endforeach

            </x-adminlte-datatable>
        </div>

    </div>

    @role('admin')
        <x-adminlte-modal id="registrarEstatus" title="Registrar Estatus" theme="success" icon="fas fa-plus" size='md'
            disable-animations>
            <form method="post" action="{{ route('estatus.store') }}">
                @csrf
                <div class="form-row">

                    <div class="col-md-12 mb-3">
                        <label for="status_actividad">Estatus</label>
                        <input type="text" class="form-control" id="status_actividad" name="status_actividad" required>
                    </div>

                </div>
                <button class="btn btn-success w-100 mt-4" type="submit">Registrar Estatus</button>
            </form>
            <x-slot name="footerSlot">
                <x-adminlte-button theme="danger" label="Cancelar Registro" data-dismiss="modal" />
            </x-slot>
        </x-adminlte-modal>
    @endrole


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
