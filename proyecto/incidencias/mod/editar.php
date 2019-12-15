<?php if($editar == 1 or $configurar == 1): ?>
	<div class="container"><!-- contenido -->
		<div class="panel panel-default"><!-- grupo -->
			<div class="panel-body"><!-- subgrupo -->
			
				<div class="titulo"><!-- titulo -->
					<h1><?php echo $titulo_principal; ?></h1>
				</div><!-- /titulo -->
				
				<form name="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?opcion=editar&id={$id}"); ?>"><!-- formulario -->
				
					<fieldset><!-- informacion -->

					<legend>Información básica</legend>
					
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group row">
								<div class="col-sm-5">
									<p><b>Fecha abierta:</b></p>
								</div>
								<div class="col-sm-6">
									<p><?php echo $estado. date_format(date_create($fecha_apertura), 'd\/m\/Y H\:i'); ?></p>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group row">
								<label for="fecha_cerrada" class="col-sm-4 col-form-label"><b>Fecha cerrada:</b></label>
								<div class="col-sm-8">
									<select class="form-control" id="fecha_cerrada" name="fecha_cerrada" required>
										<option>Selecciona una fecha cerrada</option>
										<option value="0" <?php if($fecha_cerrada == 0000-00-00) { echo "selected"; } ?>>No</option>
										<option value="1" >Sí</option>
									</select>
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
								<label for="tipo" class="col-sm-5 col-form-label"><b>Tipo:</b></label>
								<div class="col-sm-6">
									<select class="form-control" id="tipo" name="tipo" required>
										<option>Selecciona un tipo</option>
										<?php while ($registrotipos = $resultadotipos->fetch()): ?>
					<option value="<?php echo $registrotipos['id']; ?>" <?php if($registrotipos['id'] == $tipo) echo "selected"; ?>><?php echo $registrotipos['tipo']; ?></option>
					<?php endwhile; ?>
				</select>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group row">
								<label for="categoria" class="col-sm-4 col-form-label"><b>Categoria:</b></label>
								<div class="col-sm-8">
									<select class="form-control" id="categoria" name="categoria" required>
										<option>Selecciona una categoria</option>
										<?php while ($registrocategorias = $resultadocategorias->fetch()): ?>
					<option value="<?php echo $registrocategorias['id']; ?>" <?php if($registrocategorias['id'] == $categoria) echo "selected"; ?>><?php echo $registrocategorias['categoria']; ?></option>
					<?php endwhile; ?>
				</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group row">
								<label for="prioridad" class="col-sm-5 col-form-label"><b>Prioridad:</b></label>
								<div class="col-sm-6">
									<select class="form-control" id="prioridad" name="prioridad" required>
										<option>Selecciona una prioridad</option>
										<?php while ($registroprioridades = $resultadoprioridades->fetch()): ?>
					<option value="<?php echo $registroprioridades['id']; ?>" <?php if($registroprioridades['id'] == $prioridad) echo "selected"; ?>><?php echo $registroprioridades['prioridad']; ?></option>
					<?php endwhile; ?>
				</select>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group row">
								<label for="estado" class="col-sm-4 col-form-label"><b>Estado:</b></label>
								<div class="col-sm-8">
									<select class="form-control" id="estado" name="estado" required>
										<option>Selecciona un estado</option>
									<?php while ($registroestados = $resultadoestados->fetch()): ?>
					<option value="<?php echo $registroestados['id']; ?>" <?php if($registroestados['id'] == $estado) echo "selected"; ?>><?php echo $registroestados['estado']; ?></option>
					<?php endwhile; ?>
				</select>
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
									<select class="form-control" id="tipo" name="asignada" required>
										<option>Selecciona una asignada</option>
										<?php while ($registroasignadas = $resultadoasignadas->fetch()): ?>
					<option value="<?php echo $registroasignadas['id']; ?>" <?php if($registroasignadas['id'] == $asignada) echo "selected"; ?>><?php echo $registroasignadas['asignada']; ?></option>
					<?php endwhile; ?>
				</select>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group row">
								<label for="validacion" class="col-sm-4 col-form-label"><b>Validación:</b></label>
								<div class="col-sm-8">
									<select class="form-control" id="validacion" name="validacion" required>
										<option>Selecciona un validación</option>
									<?php while ($registrovalidaciones = $resultadovalidaciones->fetch()): ?>
					<option value="<?php echo $registrovalidaciones['id']; ?>" <?php if($registrovalidaciones['id'] == $validacion) echo "selected"; ?>><?php echo $registrovalidaciones['validacion']; ?></option>
					<?php endwhile; ?>
				</select>
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
					
					<button type="submit" id="actualizar" class="btn btn-lg btn-success pull-right">Actualizar</button>
					
				</form><!-- /formulario -->
				
			</div><!-- /subgrupo -->
		</div><!-- /grupo -->
	</div> <!-- /contenido -->
<?php else: header('location: error.php');  endif; ?>