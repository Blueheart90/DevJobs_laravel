@extends('layouts.app')

@section('navegacion')
    @include('ui.categoriasnav')

@endsection

@section('content')

    <div class="my-10 bg-gray-100 p-10 shadow">
        @if(count($vacantes) > 0)
            <h1 class="text-3xl text-gray-700 m-0">
                Resultados de
                <span class="font-bold">la busqueda</span>
            </h1>
            <ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($vacantes as $vacante)
                    <li class="p-10 border border-gray-300 bg-white shadow">
                    <h2 class="text-2xl font-bold text-teal-500">{{ $vacante->titulo }}</h2>
                    <p class="block text-gray-700 font-noraml my-2">
                        <a href="{{ route('categoria.show', $vacante->categoria) }}">{{ $vacante->categoria->nombre }}</a>
                    </p>
                    <p class="block text-gray-700 font-noraml my-2">
                        Ubicación
                        <span class="font-bold">{{ $vacante->ubicacion->nombre }}</span>

                    </p>
                    <p class="block text-gray-700 font-noraml my-2">
                        Experiencia
                        <span class="font-bold">{{ $vacante->experiencia->nombre }}</span>

                    </p>
                        <a
                            class="bg-teal-500 text-gray-100 mt-2 px-4 py-2 inline-block rounded font-bold text-sm"
                            href="{{ route('vacantes.show', $vacante)}}">
                            Ver Vacante
                        </a>
                    </li>

                @endforeach
            </ul>
        @else
            <h1 class="text-3xl text-gray-700 m-0">
                No hay vacantes en el momento que cumplan los requisitos de
                <span class="font-bold">la busqueda</span>
            </h1>
        @endif
    </div>
@endsection
