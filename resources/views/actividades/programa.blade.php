@php
    $heads = ['ID', 'Nombre', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
@endphp

@extends('adminlte::page')


@section('title', 'Programas Academicos')

@section('content_header')
    <h2>Programas Academicos</h2>
@stop

@section('content')
    <div class="mt-4 pa-2 py-4 shadow-sm p-3 mb-5 bg-white rounded">

        @role('admin')
            <div class="d-flex align-items-center justify-content-end">
                <p>Acciones:</p>
                <div>
                    <x-adminlte-button label="Registrar Programas Academicos" data-toggle="modal"
                        data-target="#registrarProgramaActividad" class="bg-success" icon="fas fa-plus" />
                </div>
            </div>
        @endrole



        <div class="mt-2">
            <x-adminlte-datatable id="table1" :heads="$heads" class="bg-white">

                @foreach ($programaAcademico as $programa)
                    <tr>
                        <td>{{ $programa->id }}</td>
                        <td>{{ $programa->programa_academico }}</td>
                        <td class="d-flex">
                            <x-adminlte-button id="editar-programa-{{ $programa->id }}" data-toggle="modal"
                                data-target="#editar-programa-{{ $programa->id }}" theme="primary"
                                icon="fa fa-lg fa-fw fa-pen" class="mr-2" />
                            <a href="{{ route('programa.export', $programa->id) }}">
                                <x-adminlte-button theme="info" icon="fa fa-lg fa-fw fa-arrow-down" class="mr-2" />
                            </a>

                            @role('admin')
                                <form action="{{ route('programa.destroy', $programa->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-adminlte-button type='submit' theme="danger" icon="fa fa-lg fa-fw fa-trash"
                                        class="mr-2" />
                                </form>
                            @endrole

                        </td>
                        <x-adminlte-modal id="editar-programa-{{ $programa->id }}" title="Editar Programa" theme="primary"
                            icon="fas fa-pen" size='md' disable-animations>
                            <form method="POST" action=" {{ route('programa.update', $programa->id) }} ">
                                @csrf
                                <div class="form-row">

                                    <div class="col-md-12 mb-3">
                                        <label for="programa_academico">Programa De Actividad</label>
                                        <input type="text" name="programa_academico"
                                            placeholder="{{ $programa->programa_academico }}" class="form-control"
                                            id="programa_academico" required>
                                    </div>

                                </div>
                                <button class="btn btn-success w-100 mt-4" type="submit">Registrar programa De
                                    Datos</button>
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
        <x-adminlte-modal id="registrarProgramaActividad" title="Registrar programa De Actividad" theme="success"
            icon="fas fa-plus" size='md' disable-animations>
            <form method="post" action="{{ route('programa.store') }}">
                @csrf
                <div class="form-row">

                    <div class="col-md-12 mb-3">
                        <label for="programa_academico">Programa Academico</label>
                        <input type="text" class="form-control" id="programa_academico" name="programa_academico" required>
                    </div>

                </div>
                <button class="btn btn-success w-100 mt-4" type="submit">Registrar Programa Academico</button>
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
