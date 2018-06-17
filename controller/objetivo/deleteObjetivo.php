<?php
	require_once "../../archivosPHP/connection.php";

	if($_POST["objetivo"] != ""){
		$con = new BD_Gestion();
		$objetivo = $_POST["objetivo"];
		$query = "UPDATE objetivos SET estado = 0 WHERE id_objetivo = '$objetivo'";
		$resultado = $con->get_query($query);
		if($resultado == 1){
			$result = array('type' => 'S', 'message'=> 'Objetivo eliminado con éxito.');
		}else{
			$result = array('type' => 'E', 'message'=> 'Error al eliminar.');
		}	
	}
	echo json_encode($result);

?>