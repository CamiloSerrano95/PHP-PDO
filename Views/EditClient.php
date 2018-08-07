<?php

	require_once("../Models/Cliente.php");

	$id = $_GET["id"];

	$cliente = new Cliente();

	$data = $cliente->info($id);

	//print_r($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Cliente</title>
</head>
<body>

<form action="../Controllers/UpdateClienteController.php" method="POST">

	<h1>Editar un cliente</h1>

	<input type="hidden" name="idcliente" value="<?php echo $id; ?>">
	
	<input type="text" name="nombrescliente" value="<?php echo $data['cliente']['nombres']; ?>" placeholder="Nombres"><br><br>
	<input type="text" name="apellidoscliente" value="<?php echo $data['cliente']['apellidos']; ?>" placeholder="Apellidos"><br><br>
	<input type="text" name="cedulacliente" value="<?php echo $data['cliente']['cedula']; ?>" placeholder="Cedula"><br><br>
	<input type="email" name="correocliente" value="<?php echo $data['cliente']['correo']; ?>" placeholder="Correo"><br><br>

	<input type="submit" name="Editar">

</form>
	
</body>
</html>