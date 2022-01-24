<x-app-layout>
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Benvingut {{ Auth::user()->name }} {{ Auth::user()->cognoms }}
            <br>
            @if (Auth::user()->imagen != null)
            <img src="../storage/app/{{Auth::user()->imagen}}" class="rounded d-block w-100" alt="...">
            @endif
        </h2>
    </x-slot>

    <div>
        <h1 class="flex justify-content-center mt-5">MISATGE DEL ADMINISTRADOR</h1>
        <h1 id="MensajeAdmin" class="flex justify-content-center mt-2">...</h1>

        <form action="{{route('enviar')}}" method="post" id="formularioResposta" class="">
            @csrf
            <div class="input-group mb-3 flex justify-content-center mt-2">
                <div class="input-group-append">
                    <input type="text" id="respuesta" placeholder="Escriu la teva resposta...">
                    <button class="btn btn-outline-secondary bg-success" id="sendrespuesta" type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (Session::has('message'))
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                </div>
                @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    EL TEU USUARI ÉS: &nbsp;&nbsp;<b>{{ Auth::user()->name }}</b>
                    <a class="float-right pr-3" href="{{ route('usuari.edit') }}">CLICA AQUI PER FER LA EDICIO DEL USUARI</a>
                    <!-- REALTIMENOTIFICATION -->
                    <br><br><br>
                    <!-- SOLO PODRA ACCEDER EL ADMINISTRADOR -->
                    @if (Auth::user()->admin == 1)
                    <h1>ERES ADMIN</h1>
                    <a class="float-right pr-3" href="{{ route('admin') }}">Ir al panel de administración.</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
