<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Consulta El Estado De Tu
                Actividad</h2>
        </div>

        <form method="GET" action="{{ route('consulta-estatus.index') }}" class="mt-6">
            @csrf

            <div>
                <label for="cedula" class="block text-sm font-medium leading-6 text-gray-900">Cedula:</label>
                <div class="mt-2">
                    <input id="cedula" name="cedula" type="cedula" autocomplete="cedula"
                        placeholder="Ingresa Tu Cedula" required
                        class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Consultar</button>
                </div>
            </div>
        </form>

        @if (isset($responsable))
            <div class="my-4">
                <h2>Nombre Del Responsable: <span class="font-bold">{{ $responsable[0]->responsable }}</span></h2>
                <p>Numero Del Responsable: <span class="font-bold">{{ $responsable[0]->telefono }}</span></p>
                <p>Correo Del Responsable: <span class="font-bold">{{ $responsable[0]->correo }}</span></p>
                <div class="mt-4">
                    <h3 class="text-h5">Actividad Registradas:</h3>
                    @foreach ($responsable[0]->responsablesActividades as $res)
                        <p class="text-h6 mt-2">{{ $res->titulo_actividad }}</p>
                        <span>
                            @if ($res->status_actividad == 1)
                                <span
                                    class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">inicio</span>
                            @else
                                <span
                                    class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">cierre</span>
                            @endif

                        </span>
                    @endforeach
                </div>

            </div>
        @endif


    </x-authentication-card>
</x-guest-layout>
