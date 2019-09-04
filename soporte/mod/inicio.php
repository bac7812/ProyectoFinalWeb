
	<div class="container"><!-- contenido -->
			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-default"><!-- grupo -->
						<div class="panel-body"><!-- subgrupo -->
						
							<div class="titulo"><!-- titulo -->
								<h1>Incidencias</h1>
							</div><!-- /titulo -->
							
							<table class="table table-bordered"><!-- tabla -->
								<thead>
								<tr>
									<th>Incidencias</th>
									<th>Cantidad</th>
								</tr>
								</thead>
								<tbody>
								
								<tr>
								<td>Abierta</td>
								<td><?php echo $registroabierta['totalabierta']; ?></td>
								</tr>
								
								<tr>
								<td>En estudio</td>
								<td><?php echo $registroestudio['totalestudio']; ?></td>
								</tr>
								
								<tr>
								<td>En desarrollo</td>
								<td><?php echo $registrodesarrollo['totaldesarrollo']; ?></td>
								</tr>
								
								<tr>
								<td>Finalizada</td>
								<td><?php echo $registrofinalizadaestado['totalfinalizadaestado']; ?></td>
								</tr>
								
								<tr>
								<td>Reabierta</td>
								<td><?php echo $registroreabierta['totalreabierta']; ?></td>
								</tr>
								
								<tr>
								<td>Cerrada</td>
								<td><?php echo $registrocerrada['totalcerrada']; ?></td>
								</tr>
								
								</tbody>
							</table><!-- /tabla -->
						</div><!-- /subgrupo -->
					</div><!-- /grupo -->
				</div>
				<div class="col-sm-6">
					<div class="panel panel-default"><!-- grupo -->
						<div class="panel-body"><!-- subgrupo -->
							
							<div class="titulo"><!-- titulo -->
								<h1>Prioridad</h1>
							</div><!-- /titulo -->
							
							<table class="table table-bordered"><!-- tabla -->
								<thead>
								<tr>
									<th>Prioridad</th>
									<th>Cantidad</th>
								</tr>
								</thead>
								<tbody>
								
								<tr>
								<td>Baja</td>
								<td><?php echo $registrobaja['totalbaja']; ?></td>
								</tr>
								
								<tr>
								<td>Media</td>
								<td><?php echo $registromedia['totalmedia']; ?></td>
								</tr>
								
								<tr>
								<td>Alta</td>
								<td><?php echo $registroalta['totalalta']; ?></td>
								</tr>
								
								<tr>
								<td>Muy alta</td>
								<td><?php echo $registromuyalta['totalmuyalta']; ?></td>
								</tr>
								
								<tr>
								<td>Urgente</td>
								<td><?php echo $registrourgente['totalurgente']; ?></td>
								</tr>
								
								<tr>
								<td>Inmediata</td>
								<td><?php echo $registroinmediata['totalinmediata']; ?></td>
								</tr>
								
								</tbody>
							</table><!-- /tabla -->
						</div><!-- /subgrupo -->
					</div><!-- /grupo -->
				</div>
				<div class="col-sm-12">
					<div class="panel panel-default"><!-- grupo -->
						<div class="panel-body"><!-- subgrupo -->
							<div class="titulo"><!-- titulo -->
								<h1>Validación</h1>
							</div><!-- /titulo -->
							<table class="table table-bordered"><!-- tabla -->
								<thead>
								<tr>
									<th>Validación</th>
									<th>Cantidad</th>
								</tr>
								</thead>
								<tbody>
								
								<tr>
								<td>Pendiente</td>
								<td><?php echo $registropendiente['totalpendiente']; ?></td>
								</tr>
								
								<tr>
								<td>Aceptado</td>
								<td><?php echo $registroaceptado['totalaceptado']; ?></td>
								</tr>
								
								<tr>
								<td>Rechazado</td>
								<td><?php echo $registrorechazado['totalrechazado']; ?></td>
								</tr>
								
								<tr>
								<td>Finalizada</td>
								<td><?php echo $registrofinalizadavalidacion['totalfinalizadavalidacion']; ?></td>
								</tr>

								</tbody>
							</table><!-- /tabla -->
						</div><!-- /subgrupo -->
					</div><!-- /grupo -->
				</div>
			</div>
	</div><!-- /contenido -->
