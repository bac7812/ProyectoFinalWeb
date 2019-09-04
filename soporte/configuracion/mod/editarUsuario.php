<?php if($configurar == 1): ?>	
	<div class="container"><!-- contenido -->
		<div class="panel panel-default configuracion"><!-- grupo -->
			<div class="panel-body"><!-- subgrupo -->
				
				<div class="titulo"><!-- titulo -->
					<h1><?php echo $titulo_principal ?></h1>
				</div><!-- /titulo -->
				
				<form name="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?opcion={$contenido}&id={$id}"); ?>"><!-- formulario -->
					
					<fieldset><!-- informacion -->
					
					<div class="form-group row">
						<label for="usuario" class="col-sm-4 col-form-label" required><b>Usuario:</b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $usuario;; ?>" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="contrasena" class="col-sm-4 col-form-label" required><b>Contraseña:</b></label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" value="<?php echo $contrasena; ?>" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="nombre" class="col-sm-4 col-form-label" required><b>Nombre:</b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="apellidos" class="col-sm-4 col-form-label" required><b>Apellidos:</b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo $apellidos; ?>" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="correoelectronico" class="col-sm-4 col-form-label" required><b>Correo electrónico:</b></label>
						<div class="col-sm-8">
							<input type="email" class="form-control" id="correoelectronico" name="correoelectronico" placeholder="Correo electrónico" value="<?php echo $correoelectronico; ?>" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="estado" class="col-sm-4 col-form-label"><b>Estado:</b></label>
						<div class="col-sm-8">
							<select class="form-control" id="estado" name="estado" required>
								<option>Selecciona un estado</option>
								<option value="0" <?php if($estado == 0) echo "selected"; ?>>Inactivo</option>
								<option value="1" <?php if($estado == 1) echo "selected"; ?>>Activo</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="permiso" class="col-sm-4 col-form-label"><b>Permiso:</b></label>
						<div class="col-sm-8">
							<div class="checkbox">
							  <label>
								<input type="checkbox" id="permisos[]" name="permisos[]" value="ver" <?php if($registropermisos['ver'] == 1) { echo 'checked="checked"'; } ?>>
								Ver
							  </label>
							</div>
							<div class="checkbox">
							  <label>
								<input type="checkbox" id="permisos[]" name="permisos[]" value="editar" <?php if($registropermisos['editar'] == 1) { echo 'checked="checked"'; } ?>>
								Editar
							  </label>
							</div>
							<div class="checkbox">
							  <label>
								<input type="checkbox" id="permisos[]" name="permisos[]" value="eliminar" <?php if($registropermisos['eliminar'] == 1) { echo 'checked="checked"'; } ?>>
								Eliminar
							  </label>
							</div>
							<div class="checkbox">
							  <label>
								<input type="checkbox" id="permisos[]" name="permisos[]" value="configurar" <?php if($registropermisos['configurar'] == 1) { echo 'checked="checked"'; } ?>>
								Configurar
							  </label>
							</div>
						</div>
					</div>
					
					<button type="submit" id="actualizar" class="btn btn-lg btn-success">Actualizar</button>
					
					</fieldset><!-- /informacion -->
					
				</form><!-- /formulario -->
				
			</div><!-- /subgrupo -->
		</div><!-- /grupo -->
	</div> <!-- /contenido -->
<?php else: header('location: error.php');  endif; ?>