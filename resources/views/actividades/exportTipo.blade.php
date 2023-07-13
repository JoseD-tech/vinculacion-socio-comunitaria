<table class="table">
    <thead>
        <tr>
            <th style="font-size: 14px; font-weigth: 700;">Tipo de actividad</th>
            <th style="font-size: 14px; font-weigth: 700;">Programa Academico</th>
            <th style="font-size: 14px; font-weigth: 700;">Status de la actividad</th>
            <th style="font-size: 14px; font-weigth: 700;">Codigo</th>
            <th style="font-size: 14px; font-weigth: 700;">Titulo</th>
            <th style="font-size: 14px; font-weigth: 700;">Lineas de investigacion</th>
            <th style="font-size: 14px; font-weigth: 700;">Fecha de Aprobacion (Consejo Academico)</th>
            <th style="font-size: 14px; font-weigth: 700;">N° de resolucion de aprobacion</th>
            <th style="font-size: 14px; font-weigth: 700;">Fecha de Inicio de la actividad</th>
            <th style="font-size: 14px; font-weigth: 700;">Fecha de Finalizacion de la Actividad</th>
            <th style="font-size: 14px; font-weigth: 700;">Nº Personas atendidas</th>
            <th style="font-size: 14px; font-weigth: 700;">Responsable Administrativo</th>
            <th style="font-size: 14px; font-weigth: 700;">Responsable</th>
            <th style="font-size: 14px; font-weigth: 700;">Cedula del Responsable</th>
            <th style="font-size: 14px; font-weigth: 700;">Telefono del Responsable</th>
            <th style="font-size: 14px; font-weigth: 700;">Correo del responsable</th>
            <th style="font-size: 14px; font-weigth: 700;">Fecha de cierre de la actividad</th>
            <th style="font-size: 14px; font-weigth: 700;">Fecha de aprobacion de la resolucion del cierre de la
                actividad</th>
            <th style="font-size: 14px; font-weigth: 700;">Nº de resolucion aprobacion de cierre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tipo as $actividad)
            <tr>
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
                <td>{{ $actividad->responsableActividad->telefono }}</td>
                <td>{{ $actividad->responsableActividad->correo }}</td>
                <td>{{ $actividad->fechaCierreActividad }}</td>
                <td>{{ $actividad->fechaAprobacionActividad }}</td>
                <td>{{ $actividad->numeroResolucionAprobacion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
