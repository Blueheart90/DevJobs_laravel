<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Candidato;
use Illuminate\Http\Request;
use App\Notifications\NuevoCandidato;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // index(Request $request)
        // return 'la id es: ' . $request->route('id');

        // index($id)
        // return 'la id es: ' . $id;

        $vacante = Vacante::findOrFail($id);
        $candidatos= $vacante->candidatos;
        $this->authorize('view', $vacante);
        return view('candidatos.index', compact('candidatos', 'vacante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nombre' => 'required|min:6',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:1000',
            'vacante_id' => 'required',

        ]);

        // Se identifica la Vacante
        $vacante = Vacante::find($validatedData['vacante_id']);

        // Se identifica el reclutador
        $reclutador = $vacante->reclutador;

        // Almacenar Archivo PDF
        if ($request->file('cv')) {

            $ruta = $request->file('cv')->store('/cv', 'public');
            $validatedData['cv'] = $ruta;
        }

        // Forma 1
        Candidato::create($validatedData);

        // Se Notifica al Reclutador el nuevo candidato
        $reclutador->notify( new NuevoCandidato( $vacante->titulo, $vacante->id ) );



        // Forma 2 - atra ves de la relacion vacante-candidatos
        // $vacante = Vacante::find($validatedData['vacante_id']);
        // $vacante->candidatos()->create([
        //     'nombre' => $validatedData['nombre'],
        //     'email' => $validatedData['email'],
        //     'cv' => $validatedData['cv'],
        // ]);


        // return redirect()->action('VacanteController@index');
        return back()->with('estado', 'Tus datos se han enviado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
