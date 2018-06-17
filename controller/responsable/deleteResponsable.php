<?php
	require_once "../../archivosPHP/connection.php";

	if($_POST["responsable"] != ""){
		$con = new BD_Gestion();
		$responsable = $_POST["responsable"];
		$query = "UPDATE responsable SET estado = 0 WHERE id_responsable = '$responsable'";
		$resultado = $con->get_query($query);
		if($resultado == 1){
			$result = array('type' => 'S', 'message'=> 'Responsable eliminado con éxito.');
		}else{
			$result = array('type' => 'E', 'message'=> 'Error al eliminar.');
		}	
	}
	echo json_encode($result);

?>