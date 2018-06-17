<?php
	require_once "../../archivosPHP/connection.php";

	if($_POST["prioridad"] != ""){
		$con = new BD_Gestion();
		$prioridad = $_POST["prioridad"];
		$id = $_POST["id"];
		$query = "UPDATE prioridad SET nom_prioridad = '$prioridad' WHERE id_prioridad = '$id'";
		$resultado = $con->get_query($query);
		if($resultado == 1){
			$result = array('type' => 'S', 'message'=> 'Prioridad editado con éxito.');
		}else{
			$result = array('type' => 'E', 'message'=> 'Error al editar.');
		}	
	}else{
		$result = array('type' => 'E', 'message'=> 'Complete los datos necesario.');
	}
	echo json_encode($result);

?>