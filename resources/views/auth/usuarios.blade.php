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


@section('title', 'Responsables Administrativos')

@section('content_header')
    <h2>Responsables Administrativos</h2>
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
                @foreach ($config['data'] as $row)
                    <tr>
                        @foreach ($row as $cell)
                            <td>{!! $cell !!}</td>
                        @endforeach
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>

    </div>
    <x-adminlte-modal id="registrarUsuario" title="Registrar Usuario" theme="success" icon="fas fa-plus"
        size='md' disable-animations>
        <form>
            <div class="form-row">

                <div class="col-md-12 mb-3">
                    <label for="tipoActividad">Tipo De Actividad</label>
                    <input type="text" class="form-control" id="tipoActividad" required>
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
