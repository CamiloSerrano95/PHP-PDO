<?php
    require_once ('../Models/Cliente.php');

    $cliente = new Cliente();

    $clientes = $cliente->getAll();

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Clientes</title>
</head>
<body>
    <h1>Clientes</h1>

    <?php

        if (isset($_GET['msg'])){
            echo "<h2> ". $_GET['msg'] ." </h2>";
        }


        if (sizeof($clientes['clientes']) > 0) {


    ?>

        <table>
            <tr>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Cédula</td>
                <td>Correo</td>
                <td>Más</td>
            </tr>
            <?php

            foreach ($clientes['clientes'] as $cliente) {
                    $deleteRoute = "../Controllers/DestroyClientController.php?id=".$cliente['id'];
                    $editRoute = "./EditClient.php?id=".$cliente['id'];
                ?>
                <tr>
                    <td> <?php echo $cliente['nombres']; ?> </td>
                    <td> <?php echo $cliente['apellidos']; ?> </td>
                    <td> <?php echo $cliente['cedula']; ?> </td>
                    <td> <?php echo $cliente['correo']; ?> </td>
                    <td>
                        <a href="<?php echo $editRoute; ?>">Editar</a>
                        &nbsp;
                        <a href="<?php echo $deleteRoute; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php

            }
            ?>
        </table>
    <?php
        }else{
            echo "<h2>No existen Registros</h2>";
        }
    ?>
</body>
</html>