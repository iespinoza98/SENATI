<?php
	require_once "../../archivosPHP/connection.php";

	if($_POST["objetivo"] != ""){
		$con = new BD_Gestion();
		$objetivo = $_POST["objetivo"];
		$query = "INSERT INTO objetivos (id_objetivo, nom_objetivo,estado) VALUES (null, '$objetivo',1)";
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