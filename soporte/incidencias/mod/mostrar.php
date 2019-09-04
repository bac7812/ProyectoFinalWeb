
	<div class="container"><!-- contenido -->
		<div class="panel panel-default"><!-- grupo -->
			<div class="panel-body"><!-- subgrupo -->
				
				<?php
					if(isset($_SESSION['aviso'])){ 
						echo '<div class="mensaje">' .$_SESSION['aviso']. '</div>'; 
						unset($_SESSION['aviso']);
					};
				?>
				
				<div class="titulo"><!-- titulo-->
					<h1><?php echo $titulo_principal ?></h1>
					<a href="index.php?opcion=solicitar" class="btn btn-lg btn-success solicitar" role="button">Solicitar</a>
				</div><!-- /titulo -->
				
				<?php 
					if($resultado->rowCount()){ 
						include('mod/incidencias.php');
					} else { 
						echo '<div class="mensaje"><p class="informacion">No hay incidencias</p></div>';
					} 
				?>
				
				<div class="modal fade" tabindex="-1" role="dialog" id="eliminarModalIncidencia"><!-- modal -->
					<div class="modal-dialog" role="document"> 
						<div class="modal-content">
							
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Eliminar incidencia</h4>
							</div>
							
							<div class="modal-body">
								¿Desea eliminar esta incidencia?
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
	