<?php
	require_once "../../archivosPHP/connection.php";

	if($_POST["responsable"] != ""){
		$con = new BD_Gestion();
		$responsable = $_POST["responsable"];
		$id = $_POST["id"];
		$query = "UPDATE responsable SET nom_responsable = '$responsable' WHERE id_responsable = '$id'";
		$resultado = $con->get_query($query);
		if($resultado == 1){
			$result = array('type' => 'S', 'message'=> 'Responsable editado con éxito.');
		}else{
			$result = array('type' => 'E', 'message'=> 'Error al editar.');
		}	
	}else{
		$result = array('type' => 'E', 'message'=> 'Complete los datos necesario.');
	}
	echo json_encode($result);

?>