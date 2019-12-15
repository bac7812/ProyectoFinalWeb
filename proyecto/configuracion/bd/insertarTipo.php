<?php
	// conexión a la base de datos
	include('../conf/conexion.php');
	
	// comprobar solicitud
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$tipo 	= htmlentities(addslashes($_POST['tipo']));
		$estado	= htmlentities(addslashes($_POST['estado']));
		// declaramos la consulta
		$sql = "INSERT INTO tipos (tipo, estado) VALUES (:tipo, :estado)";
		// preparamos la consulta
		$resultado = $conn->prepare($sql);
		// pasamos valores a la consulta mediante parametros
		$resultado->bindParam(':tipo', $tipo);
		$resultado->bindParam(':estado', $estado);
		// ejecutamos la consulta
		if($resultado->execute()){
			$_SESSION['aviso'] = '<p class="correcto">Ya añadido tipo.</p>';
			header ("location: /proyecto/configuracion?opcion=tipos");
		}
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>