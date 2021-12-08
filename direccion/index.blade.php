@extends ('layouts.admi')
@section ('contenido')
<div class="container">
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <h3> Listado de las Direcciones del Personal <a href="{{route('direccion.create')}}" class="btn btn-success">Nueva Direccion</a></h3>

 
    @include('direccion.search')
    </div>
</div> 

<div class="row">   
    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
        <div class="table.responsive">
            <table class="table table-striped table-bordered table-condensed table-horver">
                <thead>
                    <th>Id_Dir</th>
                    <th>Nombres</th>
                    <th>Ap.Paterno</th>
                    <th>Ap.Materno</th>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Ciudad</th>
                    <th>Zona</th>
                    <th>Calle/Av.</th>
                    <th>Nro.Viv</th>
                    <th>Opciones</th>
                </thead>
                @if(count($dirección)<=0)
                   <tr>
                       <td colspan="8">No hay resultados</td>
                   </tr>
                @else
                @foreach ($dirección as $dir)
                <tr>
                    <td>{{ $dir->Cod_Direccion}}</td>
                    <td>{{ $dir->Nombres}}</td>
                    <td>{{ $dir->Apellido_Paterno}}</td>
                    <td>{{ $dir->Apellido_Materno}}</td>
                    <td>{{ $dir->Departamento}}</td>
                    <td>{{ $dir->Municipio}}</td>
                    <td>{{ $dir->Ciudad}}</td>
                    <td>{{ $dir->Zona}}</td>
                    <td>{{ $dir->Calle_Avenida}}</td>
                    <td>{{ $dir->Nro_Vivienda}}</td>
                    <td>
                        <a href="{{route('direccion.edit',$dir->Cod_Direccion)}}"><button class="btn btn-info">Modificar</button></a>
                        

                        <form action="{{route('direccion.destroy',$dir->Cod_Direccion)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Desea borrar el registro de la direccion')" class="btn btn-danger" >Eliminar</button></form>
                        
                        
                    </td>
                    
                </tr>
                
                @endforeach
                @endif

            </table>

        </div>
        {{$dirección->links()}}
    </div>
</div>
</div>   
@endsection