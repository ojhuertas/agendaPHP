<?php
	require_once "conexion.php";
	if (!$conexion->error){
		session_start();
		if (!$_SESSION['agendaID']){
			$php_response['msg']= "La sesion a caducado ";

		}else{
			$id = $_SESSION['agendaID'];
	  	
	  		
			$consulta = "SELECT * FROM agenda WHERE fk_usuario = '$id'" ;
			if ($resultado = mysqli_query($conexion, $consulta)) {
			    while ($obj = mysqli_fetch_object($resultado)) {
					$php_response["eventos"][]= $obj;
			    }			
			    
			    mysqli_free_result($resultado);
			}									
		}

	}else{
		$php_response['msg']= "Error de conexion al servidor" ;
	}
	echo json_encode($php_response);
 ?>
