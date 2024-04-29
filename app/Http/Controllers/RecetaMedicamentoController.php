<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicamento;
use App\Models\Receta_Medicamento;
use App\Models\Receta;
class RecetaMedicamentoController extends Controller
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
        $receta_medicamento = Receta_Medicamento::all();
        $medicamentos = Medicamento::all();
        $recetas = Receta::all();
        return view('receta_medicamento.receta_medicamento_create', ['recetas_medicamento' => $receta_medicamento,'medicamentos' => $medicamentos, 'recetas' => $recetas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $receMed = new Receta_medicamento;
       $receMed ->cantidad=$request->get('cantidad');
       $receMed ->dosis=$request->get('dosis');
       $receMed ->indicaciones=$request->get('indicaciones');
       $receMed->id_receta=$request->get('id_receta');
       $receMed->id_medicamento=$request->get('id_receta');

       $receMed->save();

       return redirect()->route("recetas.index")->with(["mensaje" => "receta creada",]);
       

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
}
