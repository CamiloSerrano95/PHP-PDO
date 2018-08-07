<?php

	require_once("Conexion.php");

	class Cliente 
	{
		private $nombres; 
		private $apellidos; 
		private $cedula; 
		private $correo; 

		public function __construct()
		{
			$this->nombres = "";
			$this->apellidos = "";
			$this->cedula = "";
			$this->correo = "";
		}

		public function setNombres($nombres){

			$this->nombres = $nombres;
		}

		public function getNombres(){

			return $this->nombres;
		}

		public function setApellidos($apellidos){

			$this->apellidos = $apellidos;
		}

		public function getApellidos(){

			return $this->apellidos;
		}

		public function setCedula($cedula){

			$this->cedula = $cedula;
		}

		public function getCedula(){

			return $this->cedula;
		}

		public function setCorreo($correo){

			$this->correo = $correo;
		}

		public function getCorreo(){

			return $this->correo;
		}


		public function insert(){

	        $connection = new Conexion();
	        $connect = $connection->get_conexion();

	        try{

	            $sql = "INSERT INTO clientes (nombres,apellidos,cedula,correo) VALUES (?,?,?,?)";

	            $query = $connect->prepare($sql);

	            $data = [$this->getNombres(), $this->getApellidos(), $this->getCedula(), $this->getCorreo()];

	            $query->execute($data);

	            $response = ['status' => 1, 'msg' => "Datos guardados exitosamente"];

        	}catch (Exception $e){
            	$response = ['status' => 0, 'error' => $e];
        	}

        	return $response;

	    }

	    public function getAll(){

	    	$connection = new Conexion();
	    	$connect = $connection->get_conexion();

	    	try {
		    	$sql = "SELECT * FROM clientes";

		    	$query = $connect->prepare($sql);

		    	$query->execute();

		    	$data = $query->fetchAll();

		    	$response = ['status' => 1, 'clientes' => $data];

	    	} catch (Exception $e) {
	    		$response = ['status' => 0, 'error' => $e];
	    	}

	    	return $response;
	    }

	    public function destroy($id){

	    	$connection = new Conexion();
	    	$connect = $connection->get_conexion();

	    	try { 

	    		$sql = "DELETE FROM clientes WHERE id=?";

	    		$query = $connect->prepare($sql);

	    		$data = [$id];

	    		$query->execute($data);

	    		$response = ['status' => 1, 'msg' => "Dato eliminado exitosamente"];
	    		
	    	} catch (Exception $e) {
	    		$response = ['status' => 0, 'error' => $e];
	    	}

	    	return $response;
	    }

	    public function info($id){

	    	$connection = new Conexion();
	    	$connect = $connection->get_conexion();

	    	try {

	    		$sql = "SELECT * FROM clientes WHERE id=?";

	    		$query = $connect->prepare($sql);

	    		$data = [$id];

	    		$query->execute($data);

	    		$infocliente = $query->fetch();

	    		$response = ['status' => 1, 'cliente' => $infocliente];

	    	} catch (Exception $e) {

				$response = ['status' => 0, 'error' => $e];	    		
	    	}

	    	return $response;
	    }

	    public function update($id){

	    	$connection = new Conexion();
	    	$connect = $connection->get_conexion();

	    	try {

	    		$sql = "UPDATE clientes SET nombres=?, apellidos=?, cedula=?,correo=? WHERE id=?";

	    		$query = $connect->prepare($sql);

	    		$data = [$this->getNombres(), $this->getApellidos(), $this->getCedula(), $this->getCorreo(), $id];

	    		$query->execute($data);

	    		$response = ['status' => 1, 'msg' => "Cliente actulizado correctamente"];

	    	} catch (Exception $e) {
	    		$response = ['status' => 0, 'error' => $e];	   
	    	}

	    	return $response;
	    }

	    public function search($cedula){

	    	$connection = new Conexion();
	    	$connect = $connection->get_conexion();

	    	try {

	    		$sql = "SELECT * FROM clientes WHERE cedula LIKE ?";

	    		$query = $connect->prepare($sql);

	    		$data = ["%".$cedula."%"];

	    		$query->execute($data);

	    		$infocliente = $query->fetchAll();

	    		$response = ['status' => 1, 'cliente' => $infocliente];
	    		
	    	} catch (Exception $e) {
	    		
	    		$response = ['status' => 0, 'error' => $e];	
	    	}

	    	return $response;

	    }
	}