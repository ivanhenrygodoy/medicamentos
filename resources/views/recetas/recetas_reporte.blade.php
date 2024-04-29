@extends('layouts.maestra')

@section("titulo", "Recetas")

@section("contenido")
    <div class="row">
        <div class="col-12">
        <a href="{{route('recetas.create')}}" class="btn btn-info mb-2">Crear Receta</a>
        
        <br><br>
        <h3>Reporte de Recetas por Medico</h3>
        <br>

        <form method="POST" action="{{route("recetas.reportes")}}">
                @csrf
                <div class="form-group">
                    <select name ="id_medico" id="id_medico" class="form-control">
                        <option selected disabled readonly>Seleccione un medico...</option>
                        @foreach($medicos as $medico)
                            <option value="{{$medico->id}}">{{$medico->nombres}} {{$medico->apellidos}}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-success">Buscar</button>
                
        </form>
        <br><br>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Numero Receta</th>
                    <th>Medico</th>
                    <th>Paciente</th>
                    <th>Establecimiento</th>
                    <th>Fecha Emision</th>
                    
                </tr>
                </thead>
                <tbody>
                @foreach($recetas as $receta)
                    <tr>
                        <td>{{$receta->numero}}</td>
                        <td>{{$receta->med_nombre}} {{$receta->med_apellido}}</td>
                        <td>{{$receta->pa_nombre}} {{$receta->pa_apellido}}</td>
                        <td>{{$receta->nombre_est}}</td>
                        <td>{{$receta->created_at->format('d/m/Y')}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route("recetas.medicamentos",[$receta])}}">
                                <i class="fa fa-edit"> Ver Detalle</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ url('/') }}">Home</a>

        </div>
    </div>
@endsection