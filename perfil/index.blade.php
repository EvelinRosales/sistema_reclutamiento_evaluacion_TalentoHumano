@extends ('layouts.admi')
@section ('contenido')
<div class="container">
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <h3> Listado del Perfil Profesional <a href="{{route('perfil.create')}}" class="btn btn-info">Nuevo Registro</a></h3>

 
    @include('perfil.search')
    </div>
</div> 

<div class="row">   
    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
        <div class="table.responsive">
            <table class="table table-striped table-bordered table-condensed table-horver">
                <thead>
                    <th>Id_Prof</th>
                    <th>Nombres</th>
                    <th>Ap.Paterno</th>
                    <th>Ap.Materno</th>
                    <th>Titulo</th>
                    <th>Especialidad</th>
                    <th>Exp.Lab</th>
                    <th>Cargo</th>
                    <th>Otros</th>
                    <th>Opciones</th>
                </thead>
                @if(count($perfil_profesional)<=0)
                   <tr>
                       <td colspan="8">No hay resultados</td>
                   </tr>
                @else
                @foreach ($perfil_profesional as $pf)
                <tr>
                    <td>{{ $pf->Cod_Perfil}}</td>
                    <td>{{ $pf->Nombres}}</td>
                    <td>{{ $pf->Apellido_Paterno}}</td>
                    <td>{{ $pf->Apellido_Materno}}</td>
                    <td>{{ $pf->Titulo}}</td>
                    <td>{{ $pf->Especialidad}}</td>
                    <td>{{ $pf->Experiencia_Laboral}}</td>
                    <td>{{ $pf->Cargo}}</td>
                    <td>{{ $pf->Otros}}</td>
                    <td>
                        <a href="{{route('perfil.edit',$pf->Cod_Perfil)}}"><button class="btn btn-success">Modificar</button></a>
                        

                        <form action="{{route('perfil.destroy',$pf->Cod_Perfil)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Desea borrar el registro del perfil profesional')" class="btn btn-danger" >Eliminar</button></form>
                        
                        
                    </td>
                    
                </tr>
                
                @endforeach
                @endif

            </table>

        </div>
        {{$perfil_profesional->links()}}
    </div>
</div>
</div>   
@endsection