<?php
require_once "conexion.php";
if ($php_response["msg"]=="OK"){
	$u_exiten = mysqli_query($conexion, "SELECT * FROM usuarios");
	if (mysqli_num_rows($u_exiten) > 0 ){
		$php_response['obser']= "los usaurios ya existen ";
	
	}else{

		$email = "oscarh@mail.com";
		$nombre="Oscar Huertas";
		$password =md5("abcde");
		$fecha_nacimiento = "1982/07/30";
		$crear = $conexion->prepare("INSERT INTO usuarios (email, nombre, password, fecha_nacimiento) VALUES (?,?,?,?)"); 
		$crear->bind_param("ssss", $email, $nombre, $password, $fecha_nacimiento);
		$crear->execute();
		
		$email = "clperez@mail.com";
		$nombre="Claudia Perez";
		$password =md5("1234");
		$fecha_nacimiento = "";
		$crear = $conexion->prepare("INSERT INTO usuarios (email, nombre, password, fecha_nacimiento) VALUES (?,?,?,?)"); 
		$crear->bind_param("ssss", $email, $nombre, $password, $fecha_nacimiento);
		$crear->execute();
		
		$email = "paola@mail.com";
		$nombre="Paola Diaz";
		$password =md5("abcd");
		$fecha_nacimiento = "";
		$crear = $conexion->prepare("INSERT INTO usuarios (email, nombre, password, fecha_nacimiento) VALUES (?,?,?,?)"); 
		$crear->bind_param("ssss", $email, $nombre, $password, $fecha_nacimiento);
		$crear->execute();

	}	
	$cumple = date('Y/m/d',strtotime("1982/07/08"));
}
