<?php

	require_once("../Models/Cliente.php");

	$cliente = new Cliente();

	if (isset($_GET['buscar'])) {

		$data = $cliente->search($_GET['buscar']);

		//print_r ($data);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buscar</title>
</head>
<body>

	<h1>Buscar Cliente</h1>

	<form action="" method="GET">
		
		<input type="text" name="buscar"  value="<?php echo $_GET['buscar']; ?>" autofocus>
		<input type="submit" value="buscar">

	</form>

	<?php

		if (isset($_GET['buscar'])){

			if ($data['status'] == 1 && sizeof($data['cliente']) > 0) {
				
	?>

	<table>
		
		<tr>
			<td>Nombres</td>
			<td>Apellidos</td>
			<td>Cedula</td>
			<td>Correo</td>
		</tr>
		<?php
		foreach ($data['cliente'] as $cliente){
		?>
		<tr>
			<td><?php echo $cliente['nombres']; ?></td>
			<td><?php echo $cliente['apellidos']; ?></td>
			<td><?php echo $cliente['cedula']; ?></td>
			<td><?php echo $cliente['correo']; ?></td>
		</tr>

		<?php
		}
		?>

	</table>

	<?php

			}elseif ($data['status'] == 1 && sizeof($data['cliente']) == 0) {
				
				?>

				<h2>La cedula digitada no existe</h2>

				<?php
			}else{

				print_r($data['error']);
			}

			}
	?>
	
</body>
</html>