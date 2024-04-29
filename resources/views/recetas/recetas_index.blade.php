@extends("layouts.maestra")

@section("titulo", "Recetas")

@section("contenido")
    <div class="row">
        <div class="col-12">
         
            
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Numero Receta</th>
                    <th>Medico</th>
                    <th>Paciente</th></tr>
                </thead>
                <tbody>
                @foreach($recetas as $receta)
                    <tr>
                        <td>{{$receta->numero}}</td>
                        <td>{{$receta->med_nombre}} {{$receta->med_apellido}}</td>
                        <td>{{$receta->pa_nombre}} {{$receta->pa_apellido}}</td>
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