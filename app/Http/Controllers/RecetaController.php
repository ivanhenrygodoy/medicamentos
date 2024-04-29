<?php

namespace App\Http\Controllers;
use App\Models\RecetaMedicamento;
use App\Models\Medico;
use App\Models\Receta;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
             //
             $medicos = Medico::all();
             
             $recetas=[]; 
                                 
     
             return view("receta.recetas_reporte", ["recetas"=>$recetas, "medicos"=>$medicos]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
                            ->select("recetas.*","pacientes.nombre as pa_nombre", "medicos.nombre as med_nombre",
                            "pacientes.apellidos as pa_apellido", "medicos.apellidos as med_apellido",
                            "establecimientos.nombre"
                            
                            )
                            ->where('id_medico', $id_med)
                            ->get();
                            

        return view("receta.recetas_reporte", ["recetas"=>$recetas, "medicos"=>$medicos]);
    }

    public function ver_medicamentos(Receta $receta)
    {
        //
        $recetas = RecetaMedicamento::join('medicamentos', 'receta_medicamentos.id_medicamento', '=', 'medicamentos.id')
                            ->select("*")
                            ->where('receta_medicamentos.id_receta', $receta->id)
                            ->get();

                            


        return view("receta.recetas_medicamentos", ["recetas" => $recetas,"numero_receta"=>$receta->id]);
    }
}
