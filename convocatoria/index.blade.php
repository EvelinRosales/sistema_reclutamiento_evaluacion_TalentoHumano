@extends ('layouts.admi')
@section ('contenido')
<div class="container">
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <h3> Lista de Convocatorias <a href="{{route('convocatoria.create')}}" class="btn btn-success">Nueva Convocatoria</a></h3>

 
    @include('convocatoria.search')
    </div>
</div>

<div class="row">   
    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
        <div class="table.responsive">
            <table class="table table-striped table-bordered table-condensed table-horver">
                <thead>
                    <th>Cod_Conv.</th>
                    <th>Area</th>
                    <th>Descripcion</th>
                    <th>Requisitos</th>
                    <th>Opciones</th>
                </thead>
                @if(count($convocatoria)<=0)
                   <tr>
                       <td colspan="8">No hay resultados</td>
                   </tr>
                @else
                @foreach ($convocatoria as $conv)
                <tr>
                    <td>{{ $conv->id_convocatoria}}</td>
                    <td>{{ $conv->Area}}</td>
                    <td>{{ $conv->Descripcion}}</td>
                    <td>{{ $conv->Requisitos}}</td>
                    <td>
                        <a href="{{route('convocatoria.edit',$conv->id_convocatoria)}}"><button class="btn btn-info">Modificar</button></a>
                        

                        <form action="{{route('convocatoria.destroy',$conv->id_convocatoria)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Desea borrar la convocatoria')" class="btn btn-danger" >Eliminar</button></form>
                        
                        
                    </td>
                    
                </tr>
                
                @endforeach
                @endif

            </table>

        </div>
        {{$convocatoria->links()}}
    </div>
</div>
</div>   
@endsection