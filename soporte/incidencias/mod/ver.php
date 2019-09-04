
	<div class="container"><!-- contenido -->
		<div class="panel panel-default"><!-- grupo -->
			<div class="panel-body"><!-- subgrupo -->
			
				<div class="titulo"><!-- titulo -->
					<h1><?php echo $titulo_principal ?></h1>
				</div><!-- /titulo -->
				
				<fieldset><!-- informacion -->
				
				<legend>Información básica</legend>
				
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-5">
								<p><b>Fecha abierta:</b></p>
							</div>
							<div class="col-sm-6">
								<p><?php echo date_format(date_create($fecha_apertura), 'd\/m\/Y H\:i'); ?></p>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-4">
								<p><b>Fecha cerrada:</b></p>
							</div>
							<div class="col-sm-8">
								<?php if($fecha_cerrada != 0000-00-00){ echo '<p>'.date_format(date_create($fecha_cerrada), 'd\/m\/Y H\:i').'</p>'; } else {echo '<div class="mensaje"><p class="detalle">No está cerrada</p></div>'; } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-5">
								<p><b>Fecha modificación:</b></p>
							</div>
							<div class="col-sm-6">
								<p><?php if($fecha_modificacion != 0000-00-00){ echo date_format(date_create($fecha_modificacion), 'd\/m\/Y H\:i');} else {echo date('d\/m\/Y H\:i');} ?></p>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-4">
								<p><b>Solicitante:</b></p>
							</div>
							<div class="col-sm-8">
								<p><?php echo $solicitante; ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-5">
								<p><b>Tipo:</b></p>
							</div>
							<div class="col-sm-6">
								<p><?php echo $tipo; ?></p>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-4">
								<p><b>Categoria:</b></p>
							</div>
							<div class="col-sm-8">
								<p><?php echo $categoria; ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-5">
								<p><b>Prioridad:</b></p>
							</div>
							<div class="col-sm-6">
								<p><?php echo $prioridad; ?></p>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-4">
								<p><b>Estado:</b></p>
							</div>
							<div class="col-sm-8">
								<p><?php echo $estado; ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-5">
								<p><b>Asignada:</b></p>
							</div>
							<div class="col-sm-6">
								<?php if($asignada != "") { echo '<p>'.$asignada.'</p>'; } else { echo '<div class="mensaje"><p class="detalle">Está pendiente de asignar</p></div>'; } ?>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-4">
								<p><b>Validación:</b></p>
							</div>
							<div class="col-sm-8">
								<p><?php echo $validacion; ?></p>
							</div>
						</div>
					</div>
				</div>
				
				</fieldset><!-- /informacion -->
				
				<fieldset><!-- pregunta -->
				
				<legend>Pregunta</legend>
				
				<div class="form-group row">
					<div class="col-sm-2">
						<p><b>Tïtulo:</b></p>
					</div>
					<div class="col-sm-10">
						<p><?php echo $titulo; ?></p>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-2">
						<p><b>Descripción:</b></p>
					</div>
					<div class="col-sm-10">
						<p><?php echo $descripcion; ?></p>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-2">
						<p><b>Adjunto:</b></p>
					</div>
					<div class="col-sm-10">
						<?php if($adjunto != "") { echo '<p><a href="/proyecto/' .$adjunto. '" alt="Descargar adjunto" title="Descargar adjunto" target="_blank">Descargar adjunto</a></p>'; } else { echo '<div class="mensaje"><p class="detalle">No hay adjunto</p></div>'; } ?>
					</div>
				</div>
				
				</fieldset><!-- /pregunta -->
				
				<fieldset><!-- seguimientos -->
				
				<legend>Seguimientos</legend>
				
				<?php
					if(isset($_SESSION['aviso'])){ 
						echo '<div class="mensaje">' .$_SESSION['aviso']. '</div>'; 
						unset($_SESSION['aviso']);
					};
				?>
				
				<div class="form-group row">
					<label for="descripcion_seguimiento" class="col-sm-2 col-form-label"><b>Descripción:</b></label>
					<div class="col-sm-8">
						<textarea type="text" class="form-control" rows="3" id="seguimiento" name="seguimiento" placeholder="Descripción"></textarea>
					</div>
					<div class="col-sm-1">
					<button type="button" id="anadir" class="btn btn-lg btn-success pull-right">Añadir</button>
					</div>
				</div>
				<?php 
					if($resultadoseguimientos->rowCount()){ 
						include('mod/seguimientos.php');
					} else {
						echo '<div class="mensaje"><p class="informacion">No hay seguimientos</p></div>';
					} 
				?>
				
				<div class="modal fade" tabindex="-1" role="dialog" id="eliminarModalSeguimiento"><!-- modal -->
						<div class="modal-dialog" role="document"> 
							<div class="modal-content">
								
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Eliminar seguimiento</h4>
								</div>
								
								<div class="modal-body">
									¿Desea eliminar esta seguimiento?
								</div>
								
								<div class="modal-footer">
									<a href="#" type="button" class="btn btn-success" id="eliminar">Eliminar</a>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
								</div>
							</div>
						</div>
					</div><!-- /modal -->
					
				</fieldset><!-- /seguimientos -->
				
			</div><!-- /subgrupo -->
		</div><!-- /grupo -->
	</div> <!-- /contenido -->
	