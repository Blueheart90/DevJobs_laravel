<aside class="md:w-2/5 bg-teal-500 p-5 rounded m-3">
    <h2 class="text-2xl my-5 text-white uppercase font-bold text-center">Contacta al Reclutador</h2>
    <form enctype="multipart/form-data" action="{{ route('candidatos.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-white text-sm font-bold mb-4">
                Nombre:
            </label>
            <input
                type="text"
                name="nombre"
                id="nombre"
                class="p-3 bg-gray-100 rounded form-input w-full @error('nombre') border-red-500 border @enderror"
                placeholder="Tu Nombre"
                value="{{ old('nombre') }}"
            >
            @error('nombre')
                <div class="border-l-4 bg-red-100 border-red-500 text-red-700 px-4 py-3 mt-3 mb-6" role="alert">
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-white text-sm font-bold mb-4">
                E-mail:
            </label>
            <input
                type="text"
                name="email"
                id="email"
                class="p-3 bg-gray-100 rounded form-input w-full @error('email') border-red-500 border @enderror"
                placeholder="Tu email"
                value="{{ old('email') }}"
            >
            @error('email')
                <div class="border-l-4 bg-red-100 border-red-500 text-red-700 px-4 py-3 mt-3 mb-6" role="alert">
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="curriculum" class="block text-white text-sm font-bold mb-4">
                Curriculum (PDF):
            </label>
            <input
                type="file"
                name="cv"
                id="cv"
                class="p-3 rounded form-input w-full @error('cv') border-red-500 border @enderror"
                accept="application/pdf"

            >
            @error('cv')
                <div class="border-l-4 bg-red-100 border-red-500 text-red-700 px-4 py-3 mt-3 mb-6" role="alert">
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>
        <input type="hidden" name="vacante_id" value="{{$vacante->id}}" id="">
        <input
            type="submit"
            class="bg-teal-600 w-full hover:bg-teal-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase"
        >
    </form>
</aside>
