<?php
	// conexión a la base de datos
	require('conf/conexion.php');
	
	// abierta
	// declaramos la consulta
	$sqlabierta = "SELECT count(*) AS totalabierta FROM incidencias WHERE estado=1";
	// preparamos la consulta
	$resultadoabierta = $conn->prepare($sqlabierta);
	// ejecutamos la consulta
	$resultadoabierta->execute();
	$registroabierta = $resultadoabierta->fetch();
	
	// estudio
	// declaramos la consulta
	$sqlestudio = "SELECT count(*) AS totalestudio FROM incidencias WHERE estado=2";
	// preparamos la consulta
	$resultadoestudio = $conn->prepare($sqlestudio);
	// ejecutamos la consulta
	$resultadoestudio->execute();
	$registroestudio = $resultadoestudio->fetch();
	
	// desarrollo
	// declaramos la consulta
	$sqldesarrollo = "SELECT count(*) AS totaldesarrollo FROM incidencias WHERE estado=3";
	// preparamos la consulta
	$resultadodesarrollo = $conn->prepare($sqldesarrollo);
	// ejecutamos la consulta
	$resultadodesarrollo->execute();
	$registrodesarrollo = $resultadodesarrollo->fetch();
	
	// finalizadaestado
	// declaramos la consulta
	$sqlfinalizadaestado = "SELECT count(*) AS totalfinalizadaestado FROM incidencias WHERE estado=4";
	// preparamos la consulta
	$resultadofinalizadaestado = $conn->prepare($sqlfinalizadaestado);
	// ejecutamos la consulta
	$resultadofinalizadaestado->execute();
	$registrofinalizadaestado = $resultadofinalizadaestado->fetch();
	
	// reabierta
	// declaramos la consulta
	$sqlreabierta = "SELECT count(*) AS totalreabierta FROM incidencias WHERE estado=5";
	// preparamos la consulta
	$resultadoreabierta = $conn->prepare($sqlreabierta);
	// ejecutamos la consulta
	$resultadoreabierta->execute();
	$registroreabierta = $resultadoreabierta->fetch();
	
	// cerrada
	// declaramos la consulta
	$sqlcerrada = "SELECT count(*) AS totalcerrada FROM incidencias WHERE estado=6";
	// preparamos la consulta
	$resultadocerrada = $conn->prepare($sqlcerrada);
	// ejecutamos la consulta
	$resultadocerrada->execute();
	$registrocerrada = $resultadocerrada->fetch();
	
	// pendiente
	// declaramos la consulta
	$sqlpendiente = "SELECT count(*) AS totalpendiente FROM incidencias WHERE validacion=1";
	// preparamos la consulta
	$resultadopendiente = $conn->prepare($sqlpendiente);
	// ejecutamos la consulta
	$resultadopendiente->execute();
	$registropendiente = $resultadopendiente->fetch();
	
	// aceptado
	// declaramos la consulta
	$sqlaceptado = "SELECT count(*) AS totalaceptado FROM incidencias WHERE validacion=2";
	// preparamos la consulta
	$resultadoaceptado = $conn->prepare($sqlaceptado);
	// ejecutamos la consulta
	$resultadoaceptado->execute();
	$registroaceptado = $resultadoaceptado->fetch();
	
	// rechazado
	// declaramos la consulta
	$sqlrechazado = "SELECT count(*) AS totalrechazado FROM incidencias WHERE validacion=3";
	// preparamos la consulta
	$resultadorechazado = $conn->prepare($sqlrechazado);
	// ejecutamos la consulta
	$resultadorechazado->execute();
	$registrorechazado = $resultadorechazado->fetch();
	
	// finalizadavalidacion
	// declaramos la consulta
	$sqlfinalizadavalidacion = "SELECT count(*) AS totalfinalizadavalidacion FROM incidencias WHERE validacion=3";
	// preparamos la consulta
	$resultadofinalizadavalidacion = $conn->prepare($sqlfinalizadavalidacion);
	// ejecutamos la consulta
	$resultadofinalizadavalidacion->execute();
	$registrofinalizadavalidacion = $resultadofinalizadavalidacion->fetch();
	
	// baja
	// declaramos la consulta
	$sqlbaja = "SELECT count(*) AS totalbaja FROM incidencias WHERE prioridad=1";
	// preparamos la consulta
	$resultadobaja = $conn->prepare($sqlbaja);
	// ejecutamos la consulta
	$resultadobaja->execute();
	$registrobaja = $resultadobaja->fetch();
	
	// media
	// declaramos la consulta
	$sqlmedia = "SELECT count(*) AS totalmedia FROM incidencias WHERE prioridad=2";
	// preparamos la consulta
	$resultadomedia = $conn->prepare($sqlmedia);
	// ejecutamos la consulta
	$resultadomedia->execute();
	$registromedia = $resultadomedia->fetch();
	
	// alta
	// declaramos la consulta
	$sqlalta = "SELECT count(*) AS totalalta FROM incidencias WHERE prioridad=3";
	// preparamos la consulta
	$resultadoalta = $conn->prepare($sqlalta);
	// ejecutamos la consulta
	$resultadoalta->execute();
	$registroalta = $resultadoalta->fetch();
	
	// muyalta
	// declaramos la consulta
	$sqlmuyalta = "SELECT count(*) AS totalmuyalta FROM incidencias WHERE prioridad=4";
	// preparamos la consulta
	$resultadomuyalta = $conn->prepare($sqlmuyalta);
	// ejecutamos la consulta
	$resultadomuyalta->execute();
	$registromuyalta = $resultadomuyalta->fetch();
	
	// urgente
	// declaramos la consulta
	$sqlurgente = "SELECT count(*) AS totalurgente FROM incidencias WHERE prioridad=5";
	// preparamos la consulta
	$resultadourgente = $conn->prepare($sqlurgente);
	// ejecutamos la consulta
	$resultadourgente->execute();
	$registrourgente = $resultadourgente->fetch();
	
	// inmediata
	// declaramos la consulta
	$sqlinmediata = "SELECT count(*) AS totalinmediata FROM incidencias WHERE prioridad=6";
	// preparamos la consulta
	$resultadoinmediata = $conn->prepare($sqlinmediata);
	// ejecutamos la consulta
	$resultadoinmediata->execute();
	$registroinmediata = $resultadoinmediata->fetch();
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>		