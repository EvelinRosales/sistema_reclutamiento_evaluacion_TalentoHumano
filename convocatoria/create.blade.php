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
		<h3> Nueva Convocatoria </h3>
		<form action="{{route('convocatoria.store')}}" method="POST">
		@csrf

		<div class="form-group">
			<label for="Area">Area</label>
			<input type="text" name="Area" class="form-control" requered maxlength="50" placeholder="Area....">
		</div>

		<div class="form-group">
			<label for="Descripcion">Descripcion</label>
			<input type="text" name="Descripcion" class="form-control" requered maxlength="100" placeholder="Descripcion....">
		</div>

		<div class="form-group">
			<label for="Requisitos">Requisitos</label>
			<input type="text" name="Requisitos" class="form-control" requered maxlength="250" placeholder="Requisitos....">
		</div>

		<div class="form-group">
			<label for="Condicion">Condicion</label>
			<input type="text" name="Condicion" class="form-control" requered>
		</div>

		

		
        <div class="form-group">
        	<button class="btn btn-primary" type="submit">Registrar</button>
        	<button class="btn btn-danger" type="reset">Cancelar</button>
        	<button style="background:hsla(0, 100%, 50%, 1.0);"><a href="javascript:history.back()">Ir al Listado</a></button>
        	
        </div>		


	</form>
	</div>
</div>
	
</div>
</body>
</html>


@endsection

