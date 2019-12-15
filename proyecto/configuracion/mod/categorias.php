<?php if($configurar == 1): ?>			
	<div class="container"><!-- contenido -->
		<div class="panel panel-default configuracion"><!-- grupo -->
			<div class="panel-body"><!-- subgrupo -->
				
				<?php
					if(isset($_SESSION['aviso'])){ 
						echo '<div class="mensaje">' .$_SESSION['aviso']. '</div>'; 
						unset($_SESSION['aviso']);
					};
					if(isset($_SESSION['avisoerror'])){ 
						unset($_SESSION['avisoerror']);
					};
				?>
				
				<div class="titulo"><!-- titulo -->
					<h1><?php echo $titulo_principal ?></h1>
					<a href="index.php?opcion=insertarCategoria" class="btn btn-lg btn-success insertar" role="button">Insertar</a>
				</div><!-- /titulo -->
				
				<div class="table-responsive">
					<table class="table table-bordered"><!-- tabla -->
						<thead>
						<tr>
							<th>ID</th>
							<th>Categoria</th>
							<th>Estado</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						
						<?php while ($registro = $resultado->fetch()): ?>
						
						<tr>
						<td><?php echo $registro['id']; ?></td>
						<td><?php echo $registro['categoria']; ?></td>
						<td><?php echo $registro['estado']; ?></td>
						<td><?php if($editar == 1 or $configurar == 1) { echo '<a href="index.php?opcion=editarCategoria&id=' .$registro['id']. '">Editar</a> ';} ?> <?php if($eliminar == 1 or $configurar == 1) { echo '<a href="#" data-toggle="modal" data-target="#eliminarModalCategoria" onClick="eliminarModalCategoria('.$registro['id'].')">Eliminar</a>'; } ?></td>
						</tr>
						
						<?php endwhile; ?>
						
						</tbody>
					</table><!-- /tabla -->
				</div>
				
				<div class="modal fade" tabindex="-1" role="dialog" id="eliminarModalCategoria"><!-- modal -->
					<div class="modal-dialog" role="document"> 
						<div class="modal-content">
							
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Eliminar categoria</h4>
							</div>
							
							<div class="modal-body">
								¿Desea eliminar esta categoria?
							</div>
							
							<div class="modal-footer">
								<a type="button" class="btn btn-success" id="eliminar">Eliminar</a>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							</div>
						</div>
					</div>
				</div><!-- /modal -->
				
			</div><!-- /subgrupo -->
		</div><!-- /grupo -->
	</div> <!-- /contenido -->
<?php else: header('location: error.php');  endif; ?>