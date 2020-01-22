				
				<div class="table-responsive"><!-- tabla -->
					<table class="table table-bordered">
						<thead>
						<tr>
							<th>ID</th>
							<th>Fecha de apertura</th>
							<th>Titulo</th>
							<th>Solicitante</th>
							<th>Asignada</th>
							<!--<th>Categoria</th>-->
							<th>Prioridad</th>
							<th>Estado</th>
							<th>Validación</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						
						<?php while ($registro = $resultado->fetch()): ?>
						
						<tr>
						<td><?php echo $registro['id']; ?></td>
						<td><?php $fechaApertura = strtotime($registro['fecha_apertura']); echo date('d/m/Y H:i', $fechaApertura); ?></td>
						<td><?php echo $registro['titulo']; ?></td>
						<td><?php echo $registro['solicitante']; ?></td>
						<td><?php echo $registro['asignada']; ?></td>
						<!--<td><?php echo $registro['categoria']; ?></td>-->
						<td><?php echo $registro['prioridad']; ?></td>
						<td><?php echo $registro['estado']; ?></td>
						<td><?php echo $registro['validacion']; ?></td>
						<td><?php if($ver == 1) { echo '<a href="index.php?opcion=ver&id=' .$registro['id']. '">Ver</a> ';} ?> <?php if($editar == 1 or $configurar == 1) { echo '<a href="index.php?opcion=editar&id=' .$registro['id']. '">Editar</a> ';} ?> <?php if($eliminar == 1 or $configurar == 1) { echo '<a href="#" data-toggle="modal" data-target="#eliminarModalIncidencia" onClick="eliminarModalIncidencia('.$registro['id'].')">Eliminar</a>'; } ?></td>
						</tr>
						
						<?php endwhile; ?>
						
						</tbody>
					</table><!-- /tabla -->
				</div>
