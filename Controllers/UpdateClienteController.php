<?php

	require_once("../Models/Cliente.php");

	$cliente = new Cliente();

	$cliente->setNombres($_POST['nombrescliente']);
	$cliente->setApellidos($_POST['apellidoscliente']);
	$cliente->setCedula($_POST['cedulacliente']);
	$cliente->setCorreo($_POST['correocliente']);

	$data = $cliente->update($_POST['idcliente']);

	if ($data['status'] == 1) {
		
		header("location: ../Views/ShowClients.php?msg=".$data["msg"]. "");
	}else{

		print_r($data["error"]);
	}