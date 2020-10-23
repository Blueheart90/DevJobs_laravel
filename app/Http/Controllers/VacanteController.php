<?php

namespace App\Http\Controllers;

use App\Salario;
use App\Vacante;
use App\Categoria;
use App\Ubicacion;
use App\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VacanteController extends Controller
{

    // No se usa ya que tenemos agrupadas varias rutas con  proteccion

    // public function __construct()
    // {
    //     // Revisa que el user este autenticado y verificado
    //     $this->middleware(['auth', 'verified']);
    // }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Opcion 1
        // $vacantes = auth()->user()->vacantes()->paginate(3);

        // Opcion 2
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(3);

        return view('vacantes.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();

        return view('vacantes.create', compact('categorias', 'experiencias', 'ubicaciones', 'salarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData  = $request->validate([
            'titulo' => 'required|min:6',
            'categoria_id' => 'required',
            'experiencia_id' => 'required',
            'ubicacion_id' => 'required',
            'salario_id' => 'required',
            'descripcion' => 'required|min:50',
            'imagen' => 'required',
            'skills' => 'required',
        ]);

        // Menos codigo
        auth()->user()->vacantes()->create($validatedData);

        return redirect()->action('VacanteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        if($vacante->activa === 0) return abort(404);
        return view('vacantes.show', compact('vacante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        $this->authorize('view', $vacante);
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();

        return view('vacantes.edit', compact('categorias', 'experiencias', 'ubicaciones', 'salarios', 'vacante'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        $this->authorize('update', $vacante);
        $validatedData  = $request->validate([
            'titulo' => 'required|min:6',
            'categoria_id' => 'required',
            'experiencia_id' => 'required',
            'ubicacion_id' => 'required',
            'salario_id' => 'required',
            'descripcion' => 'required|min:50',
            'imagen' => 'required',
            'skills' => 'required',
        ]);

        // Si agregamos una nueva imagen, borramos la antigua
        if ($validatedData['imagen'] != $vacante->imagen) {
            if (Storage::exists( 'public/' . $vacante->imagen)) {
                Storage::delete( 'public/' . $vacante->imagen);
            }
        }

        // Menos codigo
        $vacante->update($validatedData);

        return redirect()->action('VacanteController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        $this->authorize('delete', $vacante);
        $vacante->delete();
        return response()->json(['mensaje' => 'Se eliminó la vacante: ' .  $vacante->titulo]);
    }

    public function imagen(Request $request)
    {

        $ruta = $request->file('file')->store('/vacantes', 'public');
        return response()->json(['correcto' => $ruta]);
        // return "imagen controller";

    }

    public function borrarimagen(Request $request)
    {

        if ($request->ajax()) {

            // $imagen = $request->get('nombreFinal');
            $imagen = $request->imagen;

            if (Storage::exists( 'public/' . $imagen)){

                Storage::delete( 'public/' . $imagen);

                return response('Imagen Eliminada borrarimagen', 200);
            }

        }
    }

    public function estado(Request $request, Vacante $vacante)
    {
        $vacante->activa = $request->estado;
        $vacante->save();
        return response()->json(['respuesta' => 'Correcto']);
    }

    // Form del inicio
    public function buscar(Request $request)
    {
        $validatedData  = $request->validate([
            'categoria_id' => 'required',
            'ubicacion_id' => 'required',

        ]);
        $categoria = $validatedData['categoria_id'];
        $ubicacion = $validatedData['ubicacion_id'];

        $ubicaciones = Ubicacion::all();
        // $vacantes = Vacante::latest()->where('categoria_id', $validatedData['categoria_id'])->where('ubicacion_id', $validatedData['ubicacion_id'])->get();

        // Alternativa Where como un arreglo
        $vacantes = Vacante::latest()->where([
            'categoria_id' => $categoria,
            'ubicacion_id'=> $ubicacion
        ])->get();
        return view('busqueda.resultados', compact('vacantes', 'ubicaciones'));
    }

    public function resultados(Request $request)
    {

    }

}
