@extends("layouts.maestra")
@section("titulo", "Editar nivel")
@section("contenido")
    <div class="row">
        <div class="col-12">
        <table class="table table-bordered">
            <br><br>
            <h3>Medicamentos de la receta #{{$numero_receta}}
                <thead>
                <tr>
                    <th>Numero Receta</th>
                    <th>Medicamento</th>
                    <th>Cantidad</th>
                    <th>Dosis</th>
                    <th>Indicaciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($recetas as $receta)
                    <tr>
                        <td>{{$numero_receta}}</td>
                        <td>{{$receta->nombre_medicamento}}</td>
                        <td>{{$receta->cantidad}}</td>
                        <td>{{$receta->dosis}}</td>
                        <td>{{$receta->indicaciones}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{route("recetas.index")}}">Regresar</a>
        </div>
    </div>
@endsection