<?php
	require_once "../../archivosPHP/connection.php";

	if($_POST["prioridad"] != ""){
		$con = new BD_Gestion();
		$prioridad = $_POST["prioridad"];
		$query = "INSERT INTO prioridad (id_prioridad, nom_prioridad,estado) VALUES (null, '$prioridad',1)";
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