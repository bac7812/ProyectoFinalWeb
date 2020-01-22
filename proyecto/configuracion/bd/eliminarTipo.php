<?php
	if($configurar == 1){
		
		// conexión a la base de datos
		require('../conf/conexion.php');
		// comprobar solicitud
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			$id	= htmlentities(addslashes($_GET['id']));
			// declaramos la consulta
			$sql = "SELECT * FROM tipos WHERE id=:id";
			// preparamos la consulta
			$resultado = $conn->prepare($sql);
			// pasamos valores a la consulta mediante parametros
			$resultado->bindValue(':id', $id);
			// ejecutamos la consulta
			$resultado->execute();
			$registro = $resultado->fetch();
			// comprobamos la consulta
			if ($registro) {
				$id	= htmlentities(addslashes($_GET['id']));
				// declaramos la consulta
				$sql = "DELETE FROM tipos WHERE id=:id";
				// preparamos la consulta
				$resultado = $conn->prepare($sql);
				// pasamos valores a la consulta mediante parametros
				$resultado->bindParam(':id', $id);
				// ejecutamos la consulta
				if($resultado->execute()){
					$_SESSION['aviso'] = '<p class="correcto">Ya eliminado tipo.</p>';
					header('location: /proyecto/configuracion/index.php?opcion=tipos');
				}
			}
		}
		
		// cierra la conexión con la base de datos	
		$conn = null;
	} else {
		header('location: error.php');
	}
?>