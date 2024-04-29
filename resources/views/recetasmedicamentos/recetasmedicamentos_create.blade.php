@extends("layouts.maestra")

@section("titulo", "Registrar Receta Completa")

@section("contenido")
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route("recetasmedicamentos.store")}}">
                @csrf
                <div class="form-group">

                <label class="label">Cantidad </label>
                    <input required autocomplete="off" name="cantidad" class="form-control"
                           type="text" placeholder="Numero">

                <label class="label">Dosis </label>
                    <input required autocomplete="off" name="dosis" class="form-control"
                           type="text" placeholder="Dosis">
                
                <label class="label">Indicaciones </label>
                    <input required autocomplete="off" name="indicaciones" class="form-control"
                           type="text" placeholder="Indicaciones">

                    <label class="label">numero de Receta</label>
                     <div class="form-group">
                     
                <select name ="id_receta" id="id_receta" class=" col-sm-8 form-control">
                <option selected disabled readonly>Seleccione una receta...</option>
                    @foreach($recetas as $receta)
                        <option value="{{$receta->id}}">{{$receta->numero}}</option>
                    @endforeach
                </select>
                <label class="label">Medicamento</label>
                     <div class="form-group">
                     
                <select name ="id_medicamento" id="id_medicamento" class=" col-sm-8 form-control">
                <option selected disabled readonly>Seleccione una Medicamento...</option>
                    @foreach($medicamentos as $medicamento)
                        <option value="{{$medicamento->id}}">{{$medicamento->nombre_medicamento}}</option>
                    @endforeach
                </select>
                 
                <br>
                
            </div>

                </div>
                <br>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("recetas.index")}}">Volver al listado</a>
        </form>

        </div>
    </div>
@endsection