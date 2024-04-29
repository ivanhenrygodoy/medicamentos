@extends("layouts.maestra")

@section("titulo", "Registrar Receta")

@section("contenido")
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route("recetas.store")}}">
                @csrf
                <div class="form-group">

                <label class="label">Numero de la receta</label>
                    <input required autocomplete="off" name="numero" class="form-control"
                           type="text" placeholder="Numero">

                    <label class="label">Nombre de Establecimiento</label>
                     <div class="form-group">
                     
                <select name ="id_establecimiento" id="id_establecimiento" class=" col-sm-8 form-control">
                <option selected disabled readonly>Seleccione un Establecimiento...</option>
                    @foreach($establecimientos as $establecimiento)
                        <option value="{{$establecimiento->id}}">{{$establecimiento->nombre}}</option>
                    @endforeach
                </select>
                <br>
                <label class="label">Nombre de Medico</label>
                     <div class="form-group">
                <select name ="id_medico" id="id_medico" class=" col-sm-8 form-control">
                <option selected disabled readonly>Seleccione un Medico...</option>
                    @foreach($medicos as $medico)
                        <option value="{{$medico->id}}">{{$medico->nombres}}</option>
                    @endforeach
                </select>
                <br>
                <label class="label">Nombre de Paciente</label>
                     <div class="form-group">
                <select name ="id_paciente" id="id_paciente" class=" col-sm-8 form-control">
                <option selected disabled readonly>Seleccione un Paciente...</option>
                    @foreach($pacientes as $paciente)
                        <option value="{{$paciente->id}}">{{$paciente->nombres}}</option>
                    @endforeach
                </select>
            </div>

                </div>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("recetas.index")}}">Volver al listado</a>
        </form>

        </div>
    </div>
@endsection