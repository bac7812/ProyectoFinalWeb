
	<div class="container"><!-- contenido -->
		<div class="panel panel-default"><!-- grupo -->
			<div class="panel-body"><!-- subgrupo -->
				
				<div class="titulo"><!-- titulo -->
					<h1><?php echo $titulo_principal ?></h1>
				</div><!-- /titulo -->
				
				<form name="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?opcion={$contenido}"); ?>" enctype= "multipart/form-data"><!-- formulario -->
				<input type="hidden"/>
				
					<fieldset><!-- informacion -->
					
					<legend>Información básica</legend>
					
					<div class="form-group row">
						<label for="tipo" class="col-sm-4 col-form-label">Tipo:</label>
						<div class="col-sm-8">
							<select class="form-control" id="tipo" name="tipo" required>
								<option value="">Selecciona un tipo</option>
				<?php while ($registrotipos = $resultadotipos->fetch()): ?>
				<option value="<?php echo $registrotipos['id']; ?>"><?php echo $registrotipos['tipo']; ?></option>
				<?php endwhile; ?>
			</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="categoria" class="col-sm-4 col-form-label">Categoria:</label>
						<div class="col-sm-8">
							<select class="form-control" id="categoria" name="categoria" required>
								<option value="">Selecciona una categoria</option>
				<?php while ($registrocategorias = $resultadocategorias->fetch()): ?>
				<option value="<?php echo $registrocategorias['id']; ?>"><?php echo $registrocategorias['categoria']; ?></option>
				<?php endwhile; ?>
			</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="prioridad" class="col-sm-4 col-form-label">Prioridad:</label>
						<div class="col-sm-8">
							<select class="form-control" id="prioridad" name="prioridad" required>
								<option value="">Selecciona una prioridad</option>
				<?php while ($registroprioridades = $resultadoprioridades->fetch()): ?>
				<option value="<?php echo $registroprioridades['id']; ?>"><?php echo $registroprioridades['prioridad']; ?></option>
				<?php endwhile; ?>
			</select>
						</div>
					</div>
					
					</fieldset><!-- /informacion -->
					
					<fieldset><!-- pregunta -->
					
					<legend>Pregunta</legend>
					
					<div class="form-group row">
						<label for="titulo" class="col-sm-4 col-form-label">Titulo:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="descripcion" class="col-sm-4 col-form-label">Descripción:</label>
						<div class="col-sm-8">
							<textarea type="text" class="form-control" rows="14" id="descripcion" name="descripcion" placeholder="Descripción" required></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="adjunto" class="col-sm-4 col-form-label">Adjunto:</label>
						<div class="col-sm-8">
							<input type="file" class="form-control-file" id="adjunto" name="adjunto">
						</div>
					</div>
					
					<fieldset><!-- /pregunta -->
					
					<button type="submit" id="solicitar" class="btn btn-lg btn-success">Solicitar</button>
					
				</form><!-- formulario -->
				
			</div><!-- /subgrupo -->
		</div><!-- /grupo -->
	</div> <!-- /contenido -->
