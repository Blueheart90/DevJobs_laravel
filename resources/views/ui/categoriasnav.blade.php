@foreach($categorias as $categoria)
    <a class="text-white text-sm uppercase font-bold p-3  {{ Request::is('categoria/' . $categoria->id) ? 'bg-teal-500' : 'hover:bg-gray-600'  }}" href="{{ route('categoria.show', $categoria->id) }}">{{ $categoria->nombre }}</a>
@endforeach
