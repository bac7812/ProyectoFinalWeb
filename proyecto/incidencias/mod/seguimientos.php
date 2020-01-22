					
					<table class="table table-bordered"><!-- tabla -->
						
						<thead>
						<tr>
							<th>Fecha</th>
							<th>Descripción</th>
							<th>Usuario</th>
							<?php if($IdUsuarioSeguimientos == $_SESSION['id']) { echo '<th></th>'; } ?>
						</tr>
						</thead>
						<tbody>
						
						<?php while ($registroseguimientos = $resultadoseguimientos->fetch()): ?>
						
						<tr>
						<td><?php $fecha = strtotime($registroseguimientos['fecha']); echo date('d/m/Y H:i', $fecha); ?></td>
						<td><?php echo $registroseguimientos['descripcion']; ?></td>
						<td><?php echo $registroseguimientos['usuario']; ?></td>
						<?php if($registroseguimientos['id'] == $_SESSION['id']) { echo '<td><a href="#" data-toggle="modal" data-target="#eliminarModalSeguimiento" onClick="eliminarModalSeguimiento('.$registroseguimientos['idSeguimiento'].');">Eliminar</a></td>'; } ?>
						</tr>
						
						<?php endwhile; ?>
						
						
						</tbody>
					</table><!-- /tabla -->
