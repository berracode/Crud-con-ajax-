<!DOCTYPE html>
	<html>
	<head>
	      <meta charset="utf-8">
	      <meta http-equiv="X-UA-Compatible" content="IE=edge">
	      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum.scale=1.0, minimu-scale=1.0">
	      <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> 
<style type="text/css">
	#fmod{
		display: none; 
	}
</style>
		<title>CRUD CON AJAX-PHP Y MySQL</title> 
	</head>
	<body id="load">
		<div class="container">
			<div class="jumbotron" style="background: #F76464 ">
			<h1 style="color: white">CRUD CON AJAX-PHP Y MySQL</h1>
			  <p>...</p>
			</div>

			<div class="row">
				<div class="col-md-6">	
					<form id="finsertar" >
						<h3>Formulario para insertar:</h3>
							<table class="table table-hover ">
								<tr>
									<th>Producto:</th>
									<td><input autofocus type="text" name="producto" required="" class="form-control" placeholder="Ingrese nombre del producto"></td>
								</tr>
								<tr>
									<th>Cantidad:</th>
									<td>
										<input type="number" name="cantidad"  class="form-control" placeholder="Ingrese cantidad">
									</td>
								</tr>
								<tr>
									<th>Precio:</th>
									<td><input type="number" name="precio"  class="form-control" placeholder="Ingrese precio"></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="submit" name="insertar"  id="cagar" value="Insertar" class="btn btn-primary"></td>
									<td><span id="insertar"></span></td> 
									<td><span id="remove"></span></td>
									<td><span id="modificar"></span></td>
								</tr>
							</table>
					</form >
					<form id="fmod" >				
					</form>
				</div>

				<div class="col-md-6" id="mostrar"></div>
			</div>
			<a class="btn btn-primary" href="php/truncate.php">Vaciar tabla de productos</a>
		</div>
          <script  src="js/jquery.js"></script>
		  <script  src="js/main.js"></script>
		  
	</body>

	</html>	