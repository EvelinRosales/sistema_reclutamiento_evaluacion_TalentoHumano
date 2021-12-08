@extends ('layouts.admi')
@section ('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema Reclutamiento Evaluación Talento Humano</title>
    
</head>
<body>

<div class="container">

    <div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3> Editar Direccion</h3>
	</div>
	</div>
		<form action="{{route('direccion.update',$direccion->Cod_Direccion)}}" method="POST">
		@csrf
		@method('PUT')

		<div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    		<div class="form-group" value="{{$perfil->Cod_Personal}}">>
		    			<label for="">id_Personal</label>
		    			<select name="persona_id" class="form-control">
		    			@foreach[$lista_personal as list]
		    			<option value="{{$list->Cod_Personal}}">{{$list->Nombres}}{{list->Apellido_paterno}}</option>
		    			@endforeach	
		    			</select>
		    			
		    		</div>
		    	</div>
			
		    </div>

		     <div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    		<div class="form-group">
			        <label for="Departamento">Titulo</label>
			        <input type="text" name="Departamento" class="form-control" requered maxlength="50" value="{{$direccion->Departamento}}">
		            </div>
		    	</div>
			
		    </div>

		     <div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    		<div class="form-group">
			        <label for="Municipio">Municipio</label>
			        <input type="text" name="Municipio" class="form-control" requered maxlength="50" value="{{$direccion->Municipio}}">
		            </div>
		    	</div>
			
		    </div>

		     <div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    		<div class="form-group">
			            <label for="Ciudad">Ciudad</label>
			            <input type="text" name="Ciudad" class="form-control" value="{{old(Experiencia_Laboral)}}" class="form-control" maxlength="50" value="{{$direccion->Ciudad}}">
		            </div>
		    	</div>
			
		    </div>

		    <div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    		<div class="form-group">
			            <label for="Zona">Zona</label>
			            <input type="text" name="Zona" class="form-control" maxlength="50" value="{{$direccion->Zona}}">
		            </div>
		    	</div>
			
		    </div>

		    <div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    		<div class="form-group">
			            <label for="Calle_Avenida">Calle_Avenida</label>
			            <input type="text" name="Calle_Avenida" class="form-control"  maxlength="60" value="{{$direccion->Calle_Avenida}}">
		            </div>
		    	</div>
			
		    </div>

		     <div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    		<div class="form-group">
			            <label for="Nro_Vivienda">Nro_Vivienda</label>
			            <input type="text" name="Nro_Vivienda" class="form-control" requered  maxlength="10" value="{{$direccion->Nro_Vivienda}}">
		            </div>
		    	</div>
			
		    </div>

		    <div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    	    <div class="form-group">
        	            <button class="btn btn-primary" type="submit">Guardar</button>
        	            <button class="btn btn-danger" type="reset">Cancelar</button>
        	            <button style="background:hsla(0, 100%, 50%, 1.0);"><a href="javascript:history.back()">Ir al Listado</a></button>
        	
                    </div>	
		    	</div>
			
		    </div>

        </form>
		
</div>
</body>
</html>


@endsection

