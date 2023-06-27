@php
    $heads = ['ID', 'Nombre y Apellido', ['label' => 'Cedula', 'width' => 10], ['label' => 'Telefono', 'width' => 10], ['label' => 'Correo', 'width' => 30], ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

    $config = [
        'data' => [[22, 'John Bender', '25555555', '0414555555', 'correo@correo.com', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'], [22, 'John Bender', '25555555', '0414555555', 'correo@correo.com', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'], [22, 'John Bender', '25555555', '0414555555', 'correo@correo.com', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>']],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
@endphp

@extends('adminlte::page')


@section('title', 'Responsables Academicos')

@section('content_header')
    <h2>Responsables Academicos</h2>
@stop

@section('content')
    <div class="mt-4 pa-2 py-4 shadow-sm p-3 mb-5 bg-white rounded">

        <div class="d-flex align-items-center justify-content-end">
            <p>Acciones:</p>
            <div>
                <x-adminlte-button label="Registrar Responsable Academico" data-toggle="modal"
                    data-target="#registrarResponsableAcademico" class="bg-success" icon="fas fa-plus" />
            </div>
        </div>

        <div class="mt-2">
            <x-adminlte-datatable id="table1" :heads="$heads" class="bg-white">

                @foreach ($responsableAcademico as $responsable)
                    <tr>
                        <td>{{ $responsable->id }}</td>
                        <td>{{ $responsable->responsable }}</td>
                        <td>{{ $responsable->cedula }}</td>
                        <td>{{ $responsable->telefono }}</td>
                        <td>{{ $responsable->correo }}</td>
                        <td class="d-flex">
                            <x-adminlte-button id="editar-responsable-{{ $responsable->id }}" data-toggle="modal"
                                data-target="#editar-responsable-{{ $responsable->id }}" theme="primary"
                                icon="fa fa-lg fa-fw fa-pen" class="mr-2" />
                            <form action="{{ route('academico.destroy', $responsable->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-adminlte-button type='submit' theme="danger" icon="fa fa-lg fa-fw fa-trash"
                                    class="mr-2" />
                            </form>
                        </td>
                        <x-adminlte-modal id="editar-responsable-{{ $responsable->id }}"
                            title="Editar Responsable Responsable" theme="primary" icon="fas fa-pen" size='md'
                            disable-animations>
                            <form method="POST" action=" {{ route('academico.update', $responsable->id) }} ">
                                @csrf
                                <div class="form-row">

                                    <div class="col-md-12 mb-3">
                                        <label for="responsable">Nombre y Apellido:</label>
                                        <input type="text" class="form-control" id="responsable"
                                            placeholder="{{ $responsable->responsable }}"
                                            name="responsable" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="cedula">Cedula:</label>
                                        <input type="text" class="form-control" id="cedula"
                                            placeholder="{{ $responsable->cedula }}" name="cedula" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="telefono">Telefono:</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono"
                                            placeholder="{{ $responsable->telefono }}" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="corre">Correo:</label>
                                        <input type="text" class="form-control" id="correo" name="correo"
                                            placeholder="{{ $responsable->correo }}" required>
                                    </div>

                                </div>
                                <button class="btn btn-success w-100 mt-4" type="submit">Registrar Responsable Academico</button>
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
    <x-adminlte-modal id="registrarResponsableAcademico" title="Registrar Responsable Academico" theme="success"
        icon="fas fa-plus" size='md' disable-animations>
        <form method="post" action="{{ route('academico.store') }}">
            @csrf
            <div class="form-row">

                <div class="col-md-12 mb-3">
                    <label for="responsable">Nombre y Apellido:</label>
                    <input type="text" class="form-control" id="responsable"
                        name="responsable" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="cedula">Cedula:</label>
                    <input type="text" class="form-control" id="cedula" name="cedula" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="telefono">Telefono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="corre">Correo:</label>
                    <input type="text" class="form-control" id="correo" name="correo" required>
                </div>

            </div>
            <button class="btn btn-success w-100 mt-4" type="submit">Registrar Responsable Academico</button>
        </form>
        <x-slot name="footerSlot">
            <x-adminlte-button theme="danger" label="Cancelar Registro" data-dismiss="modal" />
        </x-slot>
    </x-adminlte-modal>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
