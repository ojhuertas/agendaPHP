<?php

	$conexion = new mysqli("localhost", "root", "", "agenda");
	if ($conexion){
		session_start();
		if ($_SESSION['agendaID']){
			
			
			$id	= $_POST['id'];
			$fecha_inicio	=date("Y/m/d",strtotime($_POST['start_date']));
			$hora_inicio	=date("H:i:s",strtotime($_POST['start_hour']));
			$fecha_fin	=date("Y/m/d",strtotime($_POST['end_date']));
			$hora_fin	=date("H:i:s",strtotime($_POST['end_hour']));
		

			$add_evento = mysqli_query($conexion, "UPDATE agenda SET start= '$fecha_inicio', start_hour='$hora_inicio', end = '$fecha_fin', end_hour='$hora_fin' where id = '$id' ");
			$php_reponse["msg"]="OK";
			
			
			
		}else{
			$php_reponse["msg"]="La secion a caducado ";
		}
	
	}else{
		$php_reponse["msg"]="No se pudo conectar con el servidor";

	}
	echo json_encode($php_reponse);

 ?>

 



