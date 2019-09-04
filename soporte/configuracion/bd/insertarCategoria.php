<?php
	// conexión a la base de datos
	include('../conf/conexion.php');
	
	// comprobar solicitud
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$categoria 	= htmlentities(addslashes($_POST['categoria']));
		$estado		= htmlentities(addslashes($_POST['estado']));
		// declaramos la consulta
		$sql = "INSERT INTO categorias (categoria, estado) VALUES (:categoria, :estado)";
		// preparamos la consulta
		$resultado = $conn->prepare($sql);
		// pasamos valores a la consulta mediante parametros
		$resultado->bindParam(':categoria', $categoria);
		$resultado->bindParam(':estado', $estado);
		// ejecutamos la consulta
		if($resultado->execute()){
			$_SESSION['aviso'] = '<p class="correcto">Ya añadido categoria.</p>';
			header ("location: /proyecto/configuracion?opcion=categorias");
		}
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>