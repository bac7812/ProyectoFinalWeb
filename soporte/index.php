<?php
	// comprobar sesiones
	include('conf/sesion.php');
	// conexión a la base de datos
	include('conf/conexion.php');
	// comprobar premisos
	include('conf/permiso.php');
?>
<!DOCTYPE html>
<html lang="es">

	<head>
	
    <?php include('mod/meta.php'); ?>
	
    <title>Inicio - Portal del Soporte</title>
 
    <?php include('mod/css.php'); ?>
	
	</head>
	
	<body>
	
	<?php
		include('mod/menu.php');
		include('bd/inicio.php');
		include('mod/inicio.php');
		include('mod/pie.php');
	?>
	
	<?php include('mod/js.php'); ?>

  </body>
</html>