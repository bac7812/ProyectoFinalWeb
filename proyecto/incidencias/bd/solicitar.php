<?php
	// conexión a la base de datos
	require('../conf/conexion.php');
	
	// comprobar solicitud
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$solicitante	= $_SESSION['id'];
		$tipo	 		= htmlentities(addslashes($_POST['tipo']));
		$categoria		= htmlentities(addslashes($_POST['categoria']));
		$prioridad		= htmlentities(addslashes($_POST['prioridad']));
		$estado			= "1";
		$validacion		= "1";
		$titulo			= htmlentities(addslashes($_POST['titulo']));
		$descripcion	= htmlentities(addslashes($_POST['descripcion']));
		if(file_exists($_FILES['adjunto']['tmp_name'])){
			// asignar ruta
			$ruta = "documentos/";
			// asignar tipo de documento
			$tipodoc = $_FILES['adjunto']['type'];
			$tipodoc = explode("/", $tipodoc);
			$tipodoc = '.'.$tipodoc[1];
			// asignar numero
			$numero =  date("YmdHi");
			// asignar documento
			$adjunto = $ruta.$numero.$tipodoc;
		} else {
			$adjunto = NULL;
		}
		// declaramos la consulta
		$sql = "INSERT INTO incidencias (fecha_apertura, solicitante, tipo, categoria, prioridad, estado, validacion, titulo, descripcion, adjunto) VALUES (now(), :solicitante, :tipo, :categoria, :prioridad, :estado, :validacion, :titulo, :descripcion, :adjunto)";
		// preparamos la consulta
		$resultado = $conn->prepare($sql);
		// pasamos valores a la consulta mediante parametros
		$resultado->bindParam(':solicitante', $solicitante);
		$resultado->bindParam(':tipo', $tipo);
		$resultado->bindParam(':categoria', $categoria);
		$resultado->bindParam(':prioridad', $prioridad);
		$resultado->bindParam(':estado', $estado);
		$resultado->bindParam(':validacion', $validacion);
		$resultado->bindParam(':titulo', $titulo);
		$resultado->bindParam(':descripcion', $descripcion);
		$resultado->bindParam(':adjunto', $adjunto);
		// ejecutamos la consulta
		if($resultado->execute()){
			if(isset($_FILES['adjunto']['tmp_name'])){
				move_uploaded_file($_FILES['adjunto']['tmp_name'],$_SERVER['DOCUMENT_ROOT'] .'/proyecto/'.$adjunto);
			}
			$_SESSION['aviso'] = '<p class="correcto">Ya solicitado incidencia.</p>';
			header ("location: /proyecto/incidencias");
		}
	} else {
		// tipos
		// declaramos la consulta
		$sqltipo = "SELECT * FROM tipos WHERE estado=1";
		// preparamos la consulta
		$resultadotipos = $conn->prepare($sqltipo);
		// ejecutamos la consulta
		$resultadotipos->execute();
		
		// categorias
		// declaramos la consulta
		$sqlcategorias = "SELECT * FROM categorias WHERE estado=1";
		// preparamos la consulta
		$resultadocategorias = $conn->prepare($sqlcategorias);
		// ejecutamos la consulta
		$resultadocategorias->execute();
		
		// prioridades
		// declaramos la consulta
		$sqlprioridades = "SELECT * FROM prioridades";
		// preparamos la consulta
		$resultadoprioridades = $conn->prepare($sqlprioridades);
		// ejecutamos la consulta
		$resultadoprioridades->execute();
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>