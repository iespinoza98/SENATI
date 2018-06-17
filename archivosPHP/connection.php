<?php
	require 'config.php';

	class BD_Gestion{
		
		private $connect;
		function __construct(){
			$this->connect = mysqli_connect(hostname,username,password,db_name) or die ("Error de Conexion");
		}

		public function get_connection(){
			return $this->connect;
		}

		public function get_query($query){
			$result = mysqli_query($this->connect, $query);
			return $result;
		}
	}
?>