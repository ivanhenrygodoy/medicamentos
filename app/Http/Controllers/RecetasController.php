<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\RecetaMedicamento;
use App\Models\Medico;
use App\Models\Establecimiento;
use App\Models\Paciente;
use Illuminate\Http\Request;

class RecetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicos = Medico::all();
        $recetas=[];
        return view("recetas.recetas_reporte", ["recetas"=>$recetas, "medicos"=>$medicos]);
    }

    public function establecimientosList()
    {
        //
        $medicos = Establecimiento::all();
        $recetas=[];
        return view("recetas.recetas_reporte", ["recetas"=>$recetas, "medicos"=>$medicos]);
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
         $establecimientos=Establecimiento::all();
         $pacientes=Paciente::all();
         return view('recetas.recetas_create',['medicos'=>$medicos,'establecimientos'=>$establecimientos,'recetas'=>$recetas,'pacientes'=>$pacientes,]);
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
        $receta = new Receta;
        $receta->numero=$request->get('numero');
        $receta->id_establecimiento=$request->get('id_establecimiento');
        $receta->id_paciente=$request->get('id_paciente');
        $receta->id_medico=$request->get('id_medico');

        $receta->save();
        return redirect()->route("recetas.index")->with(["mensaje" => "Receta creado",]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }

    public function reportes(Request $request)
    {
        $id_med=$request->get('id_medico');
        $medicos = Medico::all();

        $recetas = Receta::join('medicos', 'recetas.id_medico', '=', 'medicos.id')
                            ->join('pacientes', 'recetas.id_paciente', '=', 'pacientes.id')
                            ->join('establecimientos', 'recetas.id_establecimiento', '=', 'establecimientos.id')
                            ->select("recetas.*","pacientes.nombres as pa_nombre", "medicos.nombres as med_nombre",
                            "pacientes.apellidos as pa_apellido", "medicos.apellidos as med_apellido",
                            "establecimientos.nombre as nombre_est")
                            ->where('id_medico', $id_med)
                            ->get();
                            //dd($recetas);

        return view("recetas.recetas_reporte", ["recetas"=>$recetas, "medicos"=>$medicos]);
    }

    public function ver_medicamentos(Receta $receta)
    {
        //
        $recetas = RecetaMedicamento::join('medicamentos', 'receta_medicamentos.id_medicamento', '=', 'medicamentos.id')
                            ->select("*")
                            ->where('receta_medicamentos.id_receta', $receta->id)
                            ->get();

                            //dd($recetas);

        return view("recetas.recetas_medicamentos", ["recetas" => $recetas,"numero_receta"=>$receta->id]);
    }


}
