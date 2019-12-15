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
						<label for="categoria" class="col-sm-4 col-form-label" required><b>Categoria:</b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria" value="<?php echo $categoria; ?>" required>
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
					
					<button type="submit" id="actualizar" class="btn btn-lg btn-success">Actualizar</button>
					
					</fieldset><!-- informacion -->
					
				</form><!-- /formulario -->
				
			</div><!-- /subgrupo -->
		</div><!-- /grupo -->
	</div> <!-- /contenido -->
<?php else: header('location: error.php');  endif; ?>