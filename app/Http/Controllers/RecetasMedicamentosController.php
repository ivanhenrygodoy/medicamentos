<?php

namespace App\Http\Controllers;

use App\Models\RecetaMedicamento;
use App\Models\Receta;
use App\Models\Medico;
use App\Models\Establecimiento;
use App\Models\Paciente;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class RecetasMedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $medicos= Medico::all();
         $recetas= Receta::all();
         $recetasmedicamentos= RecetaMedicamento::all();
         $establecimientos=Establecimiento::all();
         $pacientes=Paciente::all();
         $medicamentos=Medicamento::all();
         return view('recetasmedicamentos.recetasmedicamentos_create',['medicos'=>$medicos,'establecimientos'=>$establecimientos,'recetas'=>$recetas,'pacientes'=>$pacientes,'medicamentos'=>$medicamentos,'recetasmedicamentos'=>$recetasmedicamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $recetamedicamento = new RecetaMedicamento;
        $recetamedicamento->cantidad=$request->get('cantidad');
        $recetamedicamento->dosis=$request->get('dosis');
        $recetamedicamento->indicaciones=$request->get('indicaciones');
        $recetamedicamento->id_receta=$request->get('id_receta');
        $recetamedicamento->id_medicamento=$request->get('id_medicamento');
         

        $recetamedicamento->save();
        return redirect()->route("recetasmedicamentos.create")->with(["mensaje" => "Receta creado",]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecetaMedicamento  $recetaMedicamento
     * @return \Illuminate\Http\Response
     */
    public function show(RecetaMedicamento $recetaMedicamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecetaMedicamento  $recetaMedicamento
     * @return \Illuminate\Http\Response
     */
    public function edit(RecetaMedicamento $recetaMedicamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecetaMedicamento  $recetaMedicamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecetaMedicamento $recetaMedicamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecetaMedicamento  $recetaMedicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecetaMedicamento $recetaMedicamento)
    {
        //
    }
}
