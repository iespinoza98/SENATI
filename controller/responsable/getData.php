<?php
	require_once "../../archivosPHP/connection.php";

	$con = new BD_Gestion();
	$query = "SELECT * FROM responsable WHERE estado = 1";

	$result = array();
	$resultado = $con->get_query($query);
	while($fetchData = $resultado->fetch_assoc()){
		$result[] = $fetchData;
	}
	echo json_encode($result);
?>