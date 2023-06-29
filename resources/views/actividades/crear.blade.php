@php
    $configdate = ['format' => 'YYYY-MM-DD HH.mm', 'dayViewHeaderFormat' => 'MMM YYYY', 'minDate' => "js:moment().startOf('month')", 'maxDate' => "js:moment().endOf('month')", 'daysOfWeekDisabled' => [0, 6]];
@endphp

@extends('adminlte::page')

@section('plugins.TempusDominusBs4', true)

@section('title', 'Gestionar Actividades')

@section('content_header')
    <h2>Gestionar Actividades</h2>
@stop

@section('content')
    <div class="mt-4 pa-2 py-4 shadow-sm p-3 mb-5 bg-white rounded">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

            <li class="nav-item">
                <a class="nav-link @if(request()->is('users*')) active @endif" @can('usuario') style="display: none;" @endcan>
                    <i class="nav-icon fas fa-fw fa-users"></i>
                    <p>Lista de Usuarios</p>
                </a>
            </li>
            ...
        </ul>

        @role('usuario')
            <h1>soy un usurio por permissos</h1>
        @endrole

        <div class="d-flex align-items-center justify-content-end">
            <p>Acciones:</p>
            <div>
                <x-adminlte-button label="Registrar Actividad" data-toggle="modal" data-target="#registrarActividad"
                    class="bg-success" icon="fas fa-plus" />
                <a href="{{ route('actividades.export') }}">
                    <x-adminlte-button label="Exportar Actividades" icon="fas fa-file-export" class="bg-cyan" />
                </a>

            </div>
        </div>

        <div class="mt-2 table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipo de actividad</th>
                        <th>Programa Academico</th>
                        <th>Status de la actividad</th>
                        <th>Codigo</th>
                        <th>Titulo</th>
                        <th>Lineas de investigacion</th>
                        <th>Fecha de Aprobacion (Consejo Academico)</th>
                        <th>N° de resolucion de aprobacion</th>
                        <th>Fecha de Inicio de la actividad</th>
                        <th>Fecha de Finalizacion de la Actividad</th>
                        <th>Nº Personas atendidas</th>
                        <th>Responsable Administrativo</th>
                        <th>Responsable</th>
                        <th>Cedula del Responsable</th>
                        <th>Telefono del Responsable</th>
                        <th>Correo del responsable</th>
                        <th>Fecha de cierre de la actividad</th>
                        <th>Fecha de aprobacion de la resolucion del cierre de la actividad</th>
                        <th>Nº de resolucion aprobacion de cierre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actividades as $actividad)
                        <tr>
                            <td>{{ $actividad->id }}</td>
                            <td>{{ $actividad->tipoActividad->TipoActividad }}</td>
                            <td>{{ $actividad->programaAcademico->programa_academico }}</td>
                            <td>{{ $actividad->statusActividad->status_actividad }}</td>
                            <td>{{ $actividad->codigo_actividad }}</td>
                            <td>{{ $actividad->titulo_actividad }}</td>
                            <td>{{ $actividad->lineaInvestigacion->linea_investigacion }}</td>
                            <td>{{ $actividad->fechaAprobacionActividad }}</td>
                            <td>{{ $actividad->numeroResolucionAprobacion }}</td>
                            <td>{{ $actividad->fechaFinalizacionActividad }}</td>
                            <td>{{ $actividad->fechaAprobacionActividad }}</td>
                            <td>{{ $actividad->numeroPersonasAtendidas }}</td>
                            <td>{{ $actividad->responsableAdministrativo->responsable_administrativo }}</td>
                            <td>{{ $actividad->responsableActividad->responsable }}</td>
                            <td>{{ $actividad->responsableActividad->cedula }}</td>
                            <td>{{ $actividad->responsableActividad->telenodo }}</td>
                            <td>{{ $actividad->responsableActividad->correo }}</td>
                            <td>{{ $actividad->fechaCierreActividad }}</td>
                            <td>{{ $actividad->fechaAprobacionActividad }}</td>
                            <td>{{ $actividad->numeroResolucionAprobacion }}</td>
                            <td class="d-flex">
                                <x-adminlte-button id="editar-actividad-{{ $actividad->id }}" data-toggle="modal"
                                    data-target="#editar-actividad-{{ $actividad->id }}" theme="primary"
                                    icon="fa fa-lg fa-fw fa-pen" class="mr-2" />
                                <form action="{{ route('actividades.destroy', $actividad->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-adminlte-button type='submit' theme="danger" icon="fa fa-lg fa-fw fa-trash"
                                        class="mr-2" />
                                </form>
                            </td>
                            <x-adminlte-modal id="editar-actividad-{{ $actividad->id }}" title="Editar Actividad"
                                theme="primary" icon="fas fa-pen" size='lg' disable-animations>
                                <form action="{{ route('actividades.update', $actividad->id) }}" method="POST">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label style="display: block;" for="tipoActividad">Tipo de Actividad</label>
                                                <select class="custom-select" id="tipoActividad" name="tipoActividad[]" required>
                                                    <option selected disabled>Selecciona Tipo de Actividad</option>
                                                    @foreach ($tiposActividades as $tipo)
                                                        <option value="{{ $tipo->id }}">{{ $tipo->TipoActividad }}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label style="display: block;" for="programaActividad">Programa Academico</label>
                                                <select class="custom-select" id="programaActividad" name="programaActividad[]" required>
                                                    <option selected disabled>Selecciona Un Programa Academico</option>
                                                    @foreach ($programas as $tipo)
                                                        <option value="{{ $tipo->id }}">{{ $tipo->programa_academico }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label style="display: block;" for="estadoActividad">Estado Actividad</label>
                                                <select class="custom-select" id="estadoActividad" name="estadoActividad[]" required>
                                                    <option selected disabled value="">Selecciona Un Estado</option>
                                                    @foreach ($status as $tipo)
                                                        <option value="{{ $tipo->id }}">{{ $tipo->status_actividad }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label style="display: block;" for="codigoActividad">Codigo Actividad</label>
                                                <input type="number" class="form-control" style="max-width: 100%" id="codigoActividad" name="codigoActividad" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label style="display: block;" for="tituloActividad">Titulo Actividad</label>
                                                <input type="text" class="form-control" style="max-width: 100%" id="tituloActividad" name="tituloActividad" required>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label style="display: block;" for="lineaActividad">Linea De Investigacion</label>
                                                <select class="custom-select" id="lineaActividad" name="lineaActividad[]" required>
                                                    <option selected disabled value="">Selecciona Una Linea De Investigacion</option>
                                                    @foreach ($linea as $tipo)
                                                        <option value="{{ $tipo->id }}">{{ $tipo->linea_investigacion }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <x-adminlte-input-date name="fechaAprobacion" label="Fecha De Aprobacion" igroup-size="md"
                                                    :config="$configdate" placeholder="Fecha de aprobacion" required>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-dark">
                                                            <i class="fas fa-calendar-day"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input-date>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <x-adminlte-input-date name="fechaFinalizacon" label="Fecha De Finalizacion" igroup-size="md"
                                                    :config="$configdate" placeholder="Fecha de finalizacion" required>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-dark">
                                                            <i class="fas fa-calendar-day"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input-date>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <x-adminlte-input-date name="fechaCierre" label="Fecha De Cierre" igroup-size="md" :config="$configdate"
                                                    placeholder="Fecha de Cierre" required>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-dark">
                                                            <i class="fas fa-calendar-day"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input-date>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label style="display: block;" for="personasAtendidas">Personas Atendidas</label>
                                                <input type="number" class="form-control" style="max-width: 100%" id="personasAtendidas" name="personasAtendidas" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label style="display: block;" for="personasInscritas">Personas Inscritas</label>
                                                <input type="number" class="form-control" style="max-width: 100%" id="personasInscritas" name="personasInscritas" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label style="display: block;" for="responsableAdministrativo">Responsable Administrativo</label>
                                                <select class="custom-select" id="responsableAdministrativo" name="responsableAdministrativo[]"
                                                    required>
                                                    <option selected disabled>Selecciona Una Responsable Administrativo</option>
                                                    @foreach ($administrativo as $tipo)
                                                        <option value="{{ $tipo->id }}">{{ $tipo->responsable_administrativo }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label style="display: block;" for="responsableAcademico">Responsable Academico</label>
                                                <select class="custom-select" id="responsableAcademico" name="responsableAcademico[]" required>
                                                    <option selected disabled value="">Selecciona Una Responsable Academico</option>
                                                    @foreach ($responsable as $tipo)
                                                        <option value="{{ $tipo->id }}">{{ $tipo->responsable }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <button class="btn btn-success w-100 mt-4" type="submit">Registrar Datos</button>
                                </form>
                                <x-slot name="footerSlot">
                                    <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal" />
                                </x-slot>
                            </x-adminlte-modal>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <x-adminlte-modal id="registrarActividad" title="Registrar Actividad" theme="success" icon="fas fa-plus"
        size='lg' disable-animations>
        <form action="{{ route('actividades.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="tipoActividad">Tipo de Actividad</label>
                    <select class="custom-select" id="tipoActividad" name="tipoActividad[]" required>
                        <option selected disabled>Selecciona Tipo de Actividad</option>
                        @foreach ($tiposActividades as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->TipoActividad }}</option>
                        @endforeach


                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="programaActividad">Programa Academico</label>
                    <select class="custom-select" id="programaActividad" name="programaActividad[]" required>
                        <option selected disabled>Selecciona Un Programa Academico</option>
                        @foreach ($programas as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->programa_academico }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="estadoActividad">Estado Actividad</label>
                    <select class="custom-select" id="estadoActividad" name="estadoActividad[]" required>
                        <option selected disabled value="">Selecciona Un Estado</option>
                        @foreach ($status as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->status_actividad }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="codigoActividad">Codigo Actividad</label>
                    <input type="number" class="form-control" id="codigoActividad" name="codigoActividad" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tituloActividad">Titulo Actividad</label>
                    <input type="text" class="form-control" id="tituloActividad" name="tituloActividad" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="lineaActividad">Linea De Investigacion</label>
                    <select class="custom-select" id="lineaActividad" name="lineaActividad[]" required>
                        <option selected disabled value="">Selecciona Una Linea De Investigacion</option>
                        @foreach ($linea as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->linea_investigacion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <x-adminlte-input-date name="fechaAprobacion" label="Fecha De Aprobacion" igroup-size="md"
                        :config="$configdate" placeholder="Fecha de aprobacion" required>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
                <div class="col-md-4 mb-3">
                    <x-adminlte-input-date name="fechaFinalizacon" label="Fecha De Finalizacion" igroup-size="md"
                        :config="$configdate" placeholder="Fecha de finalizacion" required>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
                <div class="col-md-6 mb-3">
                    <x-adminlte-input-date name="fechaCierre" label="Fecha De Cierre" igroup-size="md" :config="$configdate"
                        placeholder="Fecha de Cierre" required>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="personasAtendidas">Personas Atendidas</label>
                    <input type="number" class="form-control" id="personasAtendidas" name="personasAtendidas" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="personasInscritas">Personas Inscritas</label>
                    <input type="number" class="form-control" id="personasInscritas" name="personasInscritas" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="responsableAdministrativo">Responsable Administrativo</label>
                    <select class="custom-select" id="responsableAdministrativo" name="responsableAdministrativo[]"
                        required>
                        <option selected disabled>Selecciona Una Responsable Administrativo</option>
                        @foreach ($administrativo as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->responsable_administrativo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="responsableAcademico">Responsable Academico</label>
                    <select class="custom-select" id="responsableAcademico" name="responsableAcademico[]" required>
                        <option selected disabled value="">Selecciona Una Responsable Academico</option>
                        @foreach ($responsable as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->responsable }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <button class="btn btn-success w-100 mt-4" type="submit">Registrar Datos</button>
        </form>
        <x-slot name="footerSlot">
            <x-adminlte-button theme="danger" label="Cancelar Registro" data-dismiss="modal" />
        </x-slot>
    </x-adminlte-modal>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
