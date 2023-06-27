@php
    $heads = ['ID', 'Nombre', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

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
        'data' => [[22, 'John Bender', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'], [19, 'Sophia Clemens', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'], [3, 'Peter Sousa', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>']],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];

@endphp

@extends('adminlte::page')


@section('title', 'Tipos de Actividades')

@section('content_header')
    <h2>Tipos de Actividades</h2>
    <div class="mt-4 pa-2 py-4 shadow-sm p-3 mb-5 bg-white rounded">

        <div class="d-flex align-items-center justify-content-end">
            <p>Acciones:</p>
            <div>
                <x-adminlte-button label="Registrar Tipo de Actividad" data-toggle="modal"
                    data-target="#registrarTipoActividad" class="bg-success" icon="fas fa-plus" />
            </div>
        </div>

        <div class="mt-2">
            <x-adminlte-datatable id="table1" :heads="$heads" class="bg-white">
                @foreach ($tipoActividad as $tipo)
                    <tr>
                        <td>{{ $tipo->id }}</td>
                        <td>{{ $tipo->TipoActividad }}</td>
                        <td class="d-flex">
                            <x-adminlte-button id="editar-tipo-{{ $tipo->id }}" data-toggle="modal"
                                data-target="#editar-tipo-{{ $tipo->id }}" theme="primary" icon="fa fa-lg fa-fw fa-pen"
                                class="mr-2" />
                            <form action="{{ route('tipo-actividades.destroy', $tipo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-adminlte-button type='submit' theme="danger" icon="fa fa-lg fa-fw fa-trash"
                                    class="mr-2" />
                            </form>
                        </td>
                        <x-adminlte-modal id="editar-tipo-{{ $tipo->id }}" title="Editar Tipo De Actividad" theme="primary"
                            icon="fas fa-pen" size='md' disable-animations>
                            <form method="POST" action=" {{ route('tipo-actividades.update', $tipo->id) }} ">
                                @csrf
                                <div class="form-row">

                                    <div class="col-md-12 mb-3">
                                        <label for="tipoActividad">Tipo De Actividad</label>
                                        <input type="text" name="tipoActividad" placeholder="{{$tipo->TipoActividad}}"  class="form-control" id="tipoActividad"
                                            required>
                                    </div>

                                </div>
                                <button class="btn btn-success w-100 mt-4" type="submit">Registrar Tipo De Datos</button>
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
    <x-adminlte-modal id="registrarTipoActividad" title="Registrar Tipo De Actividad" theme="success" icon="fas fa-plus"
        size='md' disable-animations>
        <form method="POST" action=" {{ route('tipo-actividades.store') }} ">
            @csrf
            <div class="form-row">

                <div class="col-md-12 mb-3">
                    <label for="tipoActividad">Tipo De Actividad</label>
                    <input type="text" name="tipoActividad" class="form-control" id="tipoActividad" required>
                </div>

            </div>
            <button class="btn btn-success w-100 mt-4" type="submit">Registrar Tipo De Datos</button>
        </form>
        <x-slot name="footerSlot">
            <x-adminlte-button theme="danger" label="Cancelar Registro" data-dismiss="modal" />
        </x-slot>
    </x-adminlte-modal>

@stop

@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
