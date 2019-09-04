<?php 
	// conexión a la base de datos
	require('../conf/conexion.php');
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$correoelectronico   = htmlentities(addslashes($_POST['correoelectronico']));
		// declaramos la consulta
		$sql = "SELECT * FROM usuarios WHERE correoelectronico=:correoelectronico";
		// preparamos la consulta
		$resultado = $conn->prepare($sql);
		// pasamos valores a la consulta mediante parametros
		$resultado->bindValue(':correoelectronico', $correoelectronico);
		// ejecutamos la consulta
		$resultado->execute();
		$registro = $resultado->fetch();
		// comprobamos la consulta
		if ($registro) {
			$nombre = $registro['nombre'];
			$apellidos = $registro['apellidos'];
			$id = $registro['id'];
			$destinatario = $correoelectronico; 
			$asunto = "Recuperar contraseña"; 
			$cuerpo = ' 
			<html> 
			<head> 
			   <title>Recuperar contraseña</title> 
			</head> 
			<body> 
			<h1>Hola'.$nombre.' '.$apellidos.'</h1>
			<p>Usted solicitó un restablecimiento de contraseña para tu cuenta:</p>
			<p>Para confirmar esta petición, y establecer una nueva contraseña para su
			cuenta, por favor vaya a la siguiente dirección de Internet: 
			<a href="/proyecto/acceso/recuperar?opcion=nuevacontrasena&id='.$id.'" alt="Ir a la web" title="Ir al la web target="_blank">Ir a la web</a></p>
			<p>Muchas gracias, un saludo.</p>
			</body> 
			</html> 
			'; 

			//para el envío en formato HTML 
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

			//dirección del remitente 
			$headers .= "From: Portal del Soporte <soporte@localhost>\r\n"; 

			//dirección de respuesta, si queremos que sea distinta que la del remitente 
			//$headers .= "Reply-To: \r\n"; 

			//ruta del mensaje desde origen a destino 
			//$headers .= "Return-path: \r\n"; 

			//direcciones que recibián copia 
			//$headers .= "Cc: \r\n"; 

			//direcciones que recibirán copia oculta 
			//$headers .= "Bcc: \r\n"; 

			mail($destinatario,$asunto,$cuerpo,$headers);
		}
		else {
			$_SESSION['aviso'] = '<p class="error">El nombre de usuario y la contraseña que ingresaste no coinciden con nuestros registros. Por favor, revisa e inténtalo de nuevo.</p>';
		}
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>