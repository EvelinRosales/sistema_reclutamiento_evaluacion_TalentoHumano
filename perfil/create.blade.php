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
		    <h3> Nuevo Perfil Profesional </h3>
		</div>
	</div>
		
		<form action="{{route('perfil.store')}}" method="POST">
		@csrf

		    <div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    		<div class="form-group">
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
			        <label for="Titulo">Titulo</label>
			        <input type="text" name="Titulo" class="form-control" requered maxlength="50" placeholder="Titulo....">
		            </div>
		    	</div>
			
		    </div>

		     <div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    		<div class="form-group">
			        <label for="Especialidad">Especialidad</label>
			        <input type="text" name="Especialidad" class="form-control" requered maxlength="50" placeholder="Especialidad....">
		            </div>
		    	</div>
			
		    </div>

		     <div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    		<div class="form-group">
			            <label for="Experiencia_Laboral">Experiencia_Laboral</label>
			            <input type="number" name="Experiencia_Laboral" class="form-control" requered value="{{old(Experiencia_Laboral)}}" class="form-control" placeholder="Experiencia_Laboral....">
		            </div>
		    	</div>
			
		    </div>

		    <div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    		<div class="form-group">
			            <label for="Cargo">Cargo</label>
			            <input type="text" name="Cargo" class="form-control" requered maxlength="50" placeholder="Cargo....">
		            </div>
		    	</div>
			
		    </div>

		    <div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    		<div class="form-group">
			            <label for="Otros">Otros</label>
			            <input type="text" name="Otros" class="form-control"  maxlength="250" placeholder="Datos adicionales....">
		            </div>
		    	</div>
			
		    </div>

		    <div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    	    <div class="form-group">
        	            <button class="btn btn-primary" type="submit">Registrar</button>
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

