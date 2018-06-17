<?php
	require_once "../../archivosPHP/connection.php";

	if($_POST["objetivo"] != ""){
		$con = new BD_Gestion();
		$objetivo = $_POST["objetivo"];
		$id = $_POST["id"];
		$query = "UPDATE objetivos SET nom_objetivo = '$objetivo' WHERE id_objetivo = '$id'";
		$resultado = $con->get_query($query);
		if($resultado == 1){
			$result = array('type' => 'S', 'message'=> 'Objetivo editado con éxito.');
		}else{
			$result = array('type' => 'E', 'message'=> 'Error al editar.');
		}	
	}else{
		$result = array('type' => 'E', 'message'=> 'Complete los datos necesarios.');
	}
	echo json_encode($result);

?>