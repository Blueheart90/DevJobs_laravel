@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.css" integrity="sha512-iWJx03fFJWrXXXI6ctpoVaLkB6a4yf9EHNURLEEsLxGyup43eF6LrD3FSPdt1FKnGSE8Zp7JZYEDbATHf1Yx8Q==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Crear Vacante</h1>
    <form 
        action="{{ route('vacantes.store') }}"
        method="POST"
        class="max-w-lg mx-auto my-10" 
        novalidate>
        @csrf
        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Vacante</label>
            <input id="titulo" type="text" class="p-3 bg-gray-100 rounded form-input w-full @error('titulo') border-red-500 border @enderror" name="titulo" value="{{ old('titulo') }}">
            @error('titulo')
            <div class="border-dashed border bg-red-100 border-red-400 text-red-700 px-4 py-3 mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block"> {{$message}}</span>
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoría:</label>
            <select name="categoria_id" id="categoria" class="block appearance-none w-full border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                @error('categoria_id') border-red-500 border @enderror" >
                <option disabled selected value>-- Elija una categoria --</option>
                @foreach($categorias as $categoria)
                    // old categoria hace referencia al value no al arreglo que viene de compac, o sea 1,2,3 o 3.. lo compara con cada opcion
                    <option value="{{ $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : ''}}>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            @error('categoria_id')
            <div class="border-dashed border bg-red-100 border-red-400 text-red-700 px-4 py-3 mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block"> {{$message}}</span>
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">Experiencia:</label>
            <select name="experiencia_id" id="experiencia" class="block appearance-none w-full border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                @error('experiencia_id') border-red-500 border @enderror" >
                <option disabled selected value>-- Elija una experiencia --</option>
                @foreach($experiencias as $experiencia)
                    // old experiencia hace referencia al value no al arreglo que viene de compac, o sea 1,2,3 o 3.. lo compara con cada opcion
                    <option value="{{ $experiencia->id }}" {{ old('experiencia') == $experiencia->id ? 'selected' : ''}}>{{ $experiencia->nombre }}</option>
                @endforeach
            </select>
            @error('experiencia_id')
                <div class="border-dashed border bg-red-100 border-red-400 text-red-700 px-4 py-3 mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label 
                for="ubicacion" 
                class="block text-gray-700 text-sm mb-2"
            >Ubicación:</label>

            <select
                id="ubicacion"
                class="block appearance-none w-full 
                        border border-gray-200 text-gray-700 rounded leading-tight 
                        focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                        w-full @error('ubicacion_id') border-red-500 border @enderror"
                name="ubicacion_id"
            >
                <option disabled selected>- Selecciona -</option>

                @foreach ($ubicaciones as $ubicacion)
                    <option 
                        {{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }}
                        value="{{ $ubicacion->id }}"
                    >
                        {{$ubicacion->nombre}}
                    </option>
                @endforeach
            </select>

            @error('ubicacion_id')
                <div class="border-dashed border bg-red-100 border-red-400 text-red-700 px-4 py-3 mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2">Salario:</label>
            <select name="salario_id" id="salario" class="block appearance-none w-full border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                @error('salario_id') border-red-500 border @enderror" >
                <option disabled selected value>-- Elija una salario --</option>
                @foreach($salarios as $salario)
                    // old salario hace referencia al value no al arreglo que viene de compac, o sea 1,2,3 o 3.. lo compara con cada opcion
                    <option value="{{ $salario->id }}" {{ old('salario') == $salario->id ? 'selected' : ''}}>{{ $salario->nombre }}</option>
                @endforeach
            </select>
            @error('salario_id')
                <div class="border-dashed border bg-red-100 border-red-400 text-red-700 px-4 py-3 mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripción de Vacante:</label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700 @error('descripcion') border-red-500 border @enderror"></div>
            <input type="hidden" name="descripcion" id="descripcion" value="{{ old('descripcion') }} " >
            @error('descripcion')
                <div class="border-dashed border bg-red-100 border-red-400 text-red-700 px-4 py-3 mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="imagen" class="block text-gray-700 text-sm mb-2">Imagen Vacante:</label>
            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100 @error('imagen') border-red-500 border @enderror"></div>
            <input type="hidden" name="imagen" id="imagen" value="{{ old('imagen') }}" >
            <p id="error" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm hidden"></p>
            @error('imagen')
               <div class="border-dashed border bg-red-100 border-red-400 text-red-700 px-4 py-3 mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="skills" class="block text-gray-700 text-sm mb-2">Habilidades y Conocimientos:</label>
            @php
                $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
            @endphp
            {{-- el prop  se le anteponen : cuando se quiere pasar un arreglo, sin : cuando es un string --}}
            <lista-skills
                :skills="{{ json_encode($skills) }}"
                :oldskills="{{ json_encode(old('skills')) }}"
            >
            </lista-skills>
            @error('skills')
               <div class="border-dashed border bg-red-100 border-red-400 text-red-700 px-4 py-3 mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>
        <button 
            type="submit"
            class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
        >
            Publicar Vacante
        </button>
    </form>


@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', () => {

            // Medium Editor
            const editor = new MediumEditor('.editable', {
                toolbar : {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull',  'orderedlist', 'unorderedlist', 'h2', 'h3'],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: 'Información de la vacante'
                }
            });

             // Agrega al input hidden lo que el usuario escribe en medium editor
             editor.subscribe('editableInput', function(eventObj, editable) {
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            });

            // Llena el editor con el contenido del input hidden
            editor.setContent(document.querySelector('#descripcion').value );

            // DropZone -- error 419 es por la ausencia del token en el request, aqui se lo pasamos en x-csrf
            var elementError = document.querySelector('#error');
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: "/vacantes/imagen",
                dictDefaultMessage: 'Arrastra y suelta tus archivos aqui',
                acceptedFiles: '.png, .jpg, .jpeg, .gif, .bmp',
                addRemoveLinks: true,
                dictRemoveFile: 'Eliminar archivo', 
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                init: function(){
                    // cuando se instancia dropzone se ejecuta init
                    if (document.querySelector('#imagen').value.trim()) {
                        let imagenPublicada = {};
                        imagenPublicada.size = 1234;
                        imagenPublicada.name = document.querySelector('#imagen').value;

                        this.options.addedfile.call(this, imagenPublicada);
                        this.options.thumbnail.call(this, imagenPublicada, `/storage/${imagenPublicada.name}`);

                        imagenPublicada.previewElement.classList.add('dz-sucess');
                        imagenPublicada.previewElement.classList.add('dz-complete');
                    }
                },
                success: function(file, response){
                    console.log(response);
                    // console.log(response.correcto);
                    elementError.textContent = '';
                    elementError.classList.add("hidden");

                    // Coloca la respuesta del servidor en el value del input hidden
                    document.querySelector('#imagen').value = response.correcto;

                    // Añadimos el nombre final de la imagen, ya que en el controller se cambia
                    file.nombreFinal = response.correcto;
                },
                error: function(file, response){
                    // console.log(file);
                    // console.log(response);
                    elementError.textContent = 'Formato no válido';
                    elementError.classList.remove("hidden");
                    
                },
                maxfilesexceeded: function(file){
                    if( this.files[1] != null ){
                        // this.removeFile(this.files[0]); // Elimina el archivo anterior
                        this.removeAllFiles();
                        this.addFile(file);
                        elementError.classList.add("hidden");
                        console.log('prueba');
                    }
                },
                removedfile: function(file, response){
                    console.log('El archivo borrado fue: ', file)
                    file.previewElement.parentNode.removeChild(file.previewElement);

                    params = {
                        imagen: file.nombreFinal ?? document.querySelector('#imagen').value
                    }

                    axios.post('/vacantes/borrarimagen', params)
                        .then(respuesta => console.log(respuesta))
                } 
            });
        })
    </script>
@endsection

