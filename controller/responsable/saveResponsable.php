<?php
	require_once "../../archivosPHP/connection.php";

	if($_POST["responsable"] != ""){
		$con = new BD_Gestion();
		$responsable = $_POST["responsable"];
		$query = "INSERT INTO responsable (id_responsable, nom_responsable,estado) VALUES (null, '$responsable',1)";
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