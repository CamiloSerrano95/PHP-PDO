<?php

require_once('../Models/Cliente.php');

$id = $_GET ['id'];

$cliente = new Cliente();

$data = $cliente->destroy($id);

if ($data['status'] == 1) {

	header("location: ../Views/ShowClients.php?msg=". $data['msg'] ."");

}else{

	print_r($data['error']);
}
