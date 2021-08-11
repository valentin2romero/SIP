<?php

namespace App\Http\Controllers;

use App\Dependencias;
use Illuminate\Http\Request;
use App\Textosentencias;
use \App\Tables\TextosentenciasTable;

class TextosentenciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = (new TextosentenciasTable())->setup();
        return view('texto-sentencia.index', compact('table'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Sentencias  $sentencias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $texto_sentencia = Textosentencias::find($id);
        $dependencia = Dependencias::find($texto_sentencia->dependencia_id);
        return view('texto-sentencia.show', compact('texto_sentencia', 'dependencia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dependencias = Dependencias::all();
        return view('texto-sentencia.create', compact('dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'variable' => 'required|string|max:100',
            'opcion' => 'required|integer|min:0|max:1',
            'descripcion' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date',
            'fecha_final' => 'required|date',
            'dependencia_id' => 'nullable|numeric',
        ]);
        Textosentencias::create($request->all());
        return redirect(route('texto-sentencia.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sentencias  $sentencias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $texto_sentencia = Textosentencias::find($id);
        $dependencias = Dependencias::all();
        return view('texto-sentencia.edit', compact('texto_sentencia', 'dependencias'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Personas $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Textosentencias $Textosentencias)
    {
        $request->validate([
            'variable' => 'required|string|max:100',
            'opcion' => 'required|integer|min:0|max:1',
            'descripcion' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date',
            'dependencia_id' => 'nullable|numeric',
        ]);
        $texto_sentencia = Textosentencias::find($request->id);
        $texto_sentencia->variable = $request->variable;
        $texto_sentencia->opcion = $request->opcion;
        $texto_sentencia->descripcion = $request->descripcion;
        $texto_sentencia->fecha_inicio = $request->fecha_inicio;
        $texto_sentencia->fecha_final = $request->fecha_final;
        $texto_sentencia->dependencia_id = $request->dependencia_id;
        $texto_sentencia->save();
        return redirect(route('texto-sentencia.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sentencias  $sentencias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Textosentencias::destroy($id);
        return redirect(route('texto-sentencia.index'));
    }
}
