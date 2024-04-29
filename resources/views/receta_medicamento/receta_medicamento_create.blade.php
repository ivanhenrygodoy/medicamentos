@extends("layouts.base")

@section("titulo", "Registrar Receta Medica")

@section("contenido")
     <h3>Creacion de Municipio</h3>
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('receta_medicamento.store')}}">
                @csrf
                <div class="form-group">
                   <label class="label">Cantidad</label>
                    <input required autocomplete="off" name="cantidad" class=" col-sm-8 form-control"
                           type="number" placeholder="Cantidad">
                </div> 
                <div class="form-group">
                   <label class="label">Dosis</label>
                    <input required autocomplete="off" name="dosis" class=" col-sm-8 form-control"
                           type="number" placeholder="dosis">
                </div> 
                <div class="form-group">
                   <label class="label">Indicaciones</label>
                    <input required autocomplete="off" name="indicaciones" class=" col-sm-8 form-control"
                           type="text" placeholder="Indicaciones">
                </div> 

                <label class="label">Receta</label>
                <div class="form-group">
                 <select name ="id_receta" id="id_receta" class=" col-sm-8 form-control">
                 <option selected disabled readonly>Seleccione una receta...</option>
                    @foreach($recetas as $receta)
                        <option value="{{$receta->id}}">{{$receta->numero}}</option>
                    @endforeach
                </select>
               </div>
               <label class="label">Medicamento</label>
                <div class="form-group">
                 <select name ="id_medicamento" id="id_medicamento" class=" col-sm-8 form-control">
                 <option selected disabled readonly>Seleccione un medicamento...</option>
                    @foreach($medicamentos as $medicamento)
                        <option value="{{$medicamento->id}}">{{$medicamento->nombre}}</option>
                    @endforeach
                </select>
               </div>
             
               <button class="btn btn-success">Guardar</button>
               <a class="btn btn-primary" href="{{route('recetas.index')}}">Volver al listado</a>     
            </form>
            
        </div>
    </div>
@endsection