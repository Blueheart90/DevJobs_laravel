@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.categoriasnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Categoria: {{ $categoria->nombre }}</h1>
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


@endsection
