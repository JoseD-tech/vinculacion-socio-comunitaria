@php
    $heads = ['ID', 'Nombre', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
@endphp

@extends('adminlte::page')


@section('title', 'Linea De Investigacion')

@section('content_header')
    <h2>Linea De Investigacion</h2>
@stop

@section('content')
    <div class="mt-4 pa-2 py-4 shadow-sm p-3 mb-5 bg-white rounded">

        @role('admin')
            <div class="d-flex align-items-center justify-content-end">
                <p>Acciones:</p>
                <div>
                    <x-adminlte-button label="Registrar Linea de Investigacion" data-toggle="modal"
                        data-target="#registrarlineaActividad" class="bg-success" icon="fas fa-plus" />
                </div>
            </div>
        @endrole



        <div class="mt-2">
            <x-adminlte-datatable id="table1" :heads="$heads" class="bg-white">

                @foreach ($lineasInvestigacion as $linea)
                    <tr>
                        <td>{{ $linea->id }}</td>
                        <td>{{ $linea->linea_investigacion }}</td>
                        <td class="d-flex">
                            <x-adminlte-button id="editar-linea-{{ $linea->id }}" data-toggle="modal"
                                data-target="#editar-linea-{{ $linea->id }}" theme="primary"
                                icon="fa fa-lg fa-fw fa-pen" class="mr-2" />
                            @role('admin')
                                <form action="{{ route('linea.destroy', $linea->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-adminlte-button type='submit' theme="danger" icon="fa fa-lg fa-fw fa-trash"
                                        class="mr-2" />
                                </form>
                            @endrole

                        </td>
                        <x-adminlte-modal id="editar-linea-{{ $linea->id }}" title="Editar Linea De Investigacion" theme="primary"
                            icon="fas fa-pen" size='md' disable-animations>
                            <form method="POST" action=" {{ route('linea.update', $linea->id) }} ">
                                @csrf
                                <div class="form-row">

                                    <div class="col-md-12 mb-3">
                                        <label for="linea_investigacion">linea De Investigacion</label>
                                        <input type="text" name="linea_investigacion"
                                            placeholder="{{ $linea->linea_investigacion }}" class="form-control"
                                            id="linea_investigacion" required>
                                    </div>

                                </div>
                                <button class="btn btn-success w-100 mt-4" type="submit">Actualizar Linea De
                                    Investigacion</button>
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
        <x-adminlte-modal id="registrarlineaActividad" title="Registrar linea De Actividad" theme="success"
            icon="fas fa-plus" size='md' disable-animations>
            <form method="post" action="{{ route('linea.store') }}">
                @csrf
                <div class="form-row">

                    <div class="col-md-12 mb-3">
                        <label for="linea_investigacion">Linea De Investigacion</label>
                        <input type="text" class="form-control" id="linea_investigacion" name="linea_investigacion" required>
                    </div>

                </div>
                <button class="btn btn-success w-100 mt-4" type="submit">Registrar Linea De Investigacion</button>
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
