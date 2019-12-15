<?php
	// comprobar sesiones
	include('../conf/sesion.php');
	// conexión a la base de datos
	include('../conf/conexion.php');
	// comprobar secciones
	include('../conf/seccion.php');
	// conexión a la base de datos
	include('../conf/conexion.php');
	// comprobar premisos
	include('../conf/permiso.php');
?>
<!DOCTYPE html>
<html lang="es">

	<head>
	
    <?php include('../mod/meta.php'); ?>
	
    <title><?php echo $titulo_principal ?> - <?php echo $web ?></title>
 
    <?php include('../mod/css.php'); ?>
	
	</head>
	
	<body>
	
	<?php
		include('../mod/menu.php');
		if($contenido != ""){
			include('bd/'.$contenido.'.php');
			include('mod/'.$contenido.'.php');
		} else {
			header('location: error.php');
		}
		include('../mod/pie.php');
	?>
	
	<?php include('../mod/js.php'); ?>

  </body>
</html>