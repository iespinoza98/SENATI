<?php
	require_once "../../archivosPHP/connection.php";

	if($_POST["datos"] != ""){
		$con = new BD_Gestion();
		$datos = $_POST["datos"];
		$query = "INSERT INTO gestion VALUES (null, '{$datos[0]}', '{$datos[1]}', '{$datos[2]}', '{$datos[3]}', '{$datos[4]}', '{$datos[5]}', '{$datos[6]}', 1)";
		$resultado = $con->get_query($query);
		if($resultado == 1){
			$result = array('type' => 'S', 'message'=> 'Datos guardado con éxito.');
		}else{
			$result = array('type' => 'E', 'message'=> 'Error al guardar.');
		}	
	}else{
		$result = array('type' => 'E', 'message'=> 'Complete los datos necesario.');
	}
	echo json_encode($result);

?>