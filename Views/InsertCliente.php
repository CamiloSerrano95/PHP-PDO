<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insertar Cliente</title>
</head>
<body>

<form action="../Controllers/ClienteController.php" method="POST">

	<h1>Insertar un cliente</h1>
	
	<input type="text" name="nombrescliente" placeholder="Nombres"><br><br>
	<input type="text" name="apellidoscliente" placeholder="Apellidos"><br><br>
	<input type="text" name="cedulacliente" placeholder="Cedula"><br><br>
	<input type="email" name="correocliente" placeholder="Correo"><br><br>

	<input type="submit" name="Registrar">

	<h4>
		<?php

			echo $_GET['msg'];

		?>

	</h4>

</form>
	
</body>
</html>