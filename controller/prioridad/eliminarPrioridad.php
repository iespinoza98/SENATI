<?php
	require_once "../../archivosPHP/connection.php";

	if($_POST["prioridad"] != ""){
		$con = new BD_Gestion();
		$prioridad = $_POST["prioridad"];
		$query = "UPDATE prioridad SET estado = 0 WHERE id_prioridad = '$prioridad'";
		$resultado = $con->get_query($query);
		if($resultado == 1){
			$result = array('type' => 'S', 'message'=> 'prioridad eliminado con éxito.');
		}else{
			$result = array('type' => 'E', 'message'=> 'Error al eliminar.');
		}	
	}
	echo json_encode($result);

?>