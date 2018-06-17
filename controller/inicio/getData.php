<?php
	require_once "../../archivosPHP/connection.php";

	$con = new BD_Gestion();
	$query = "SELECT 
			objetivos.nom_objetivo,
			prioridad.nom_prioridad,
			responsable.nom_responsable,
			gestion.desc_accion,
			gestion.fecha_inicio,
			gestion.fecha_final,
			gestion.notas
			FROM gestion
			INNER JOIN objetivos ON objetivos.id_objetivo = gestion.id_objetivo
			INNER JOIN prioridad ON prioridad.id_prioridad = gestion.id_prioridad
			INNER JOIN responsable ON responsable.id_responsable = gestion.id_responsable
			WHERE gestion.estado = 1 AND
			prioridad.estado = 1 AND
			responsable.estado = 1";

	$result = array();
	$resultado = $con->get_query($query);
	while($fetchData = $resultado->fetch_assoc()){
		$result[] = $fetchData;
	}
	echo json_encode($result);
?>