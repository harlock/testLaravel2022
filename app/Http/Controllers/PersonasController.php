<?php

namespace App\Http\Controllers;

use App\Models\EstadoCivil;
use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $datos_personas=DB::select("SELECT personas.id_persona,personas.nombre,personas.apellidos,personas.direccion,
personas.correo,estado_civil.descripcion
FROM personas,estado_civil WHERE personas.id_estado_civil=estado_civil.id_estado_civil");
       */

       $datos_personas=Personas::join("estado_civil","personas.id_estado_civil","estado_civil.id_estado_civil")
           ->select("personas.*","estado_civil.descripcion")->get();
        //dd($datos_personas);
        $datos_estado_civil=EstadoCivil::all();
        //dd($datos_estado_civil);
       return view ("personas.index",compact("datos_personas","datos_estado_civil"));
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
        $request->validate([
            'nombre' => 'required|alpha|max:20|min:5',

        ]);

        $datosPersonas = $request->all();//request()->except('_token');
        Personas::create($datosPersonas);
        return redirect()->route('personas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(Personas $persona)
    {
        return back()->with(["modal_delete"=>true,"delete_persona"=>$persona]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit(Personas $persona)
    {
        //dd($persona);
        //
        //$persona=Personas::findOrfail($id_personas);
        // return view('personas.edit', compact('persona'));
        return back()->with(["modal_edit"=>true,"edit_persona"=>$persona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Personas $persona)
    {
        //
        $request->validate([
            'nombre' => 'required|alpha|max:20|min:5',

        ]);
        $persona->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personas $persona)
    {
        //
        $persona->delete();
        return redirect('personas');
    }
}
