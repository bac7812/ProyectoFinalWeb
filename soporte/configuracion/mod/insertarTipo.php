<?php if($configurar == 1): ?>	
	<div class="container"><!-- contenido -->
		<div class="panel panel-default configuracion"><!-- grupo -->
			<div class="panel-body"><!-- subgrupo -->
				
				<div class="titulo"><!-- titulo -->
					<h1><?php echo $titulo_principal ?></h1>
				</div><!-- /titulo -->
				
				<?php
					if(isset($_SESSION['avisoerror'])){ 
						echo '<div class="mensaje">' .$_SESSION['avisoerror']. '</div>'; 
					};
				?>
				
				<form name="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?opcion={$contenido}"); ?>" enctype= "multipart/form-data"><!-- formulario -->
					
					<fieldset><!-- informacion -->
					
					<div class="form-group row">
						<label for="tipo" class="col-sm-4 col-form-label" required><b>Tipo:</b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="estado" class="col-sm-4 col-form-label"><b>Estado:</b></label>
						<div class="col-sm-8">
							<select class="form-control" id="estado" name="estado" required>
								<option>Selecciona un estado</option>
								<option value="0">Inactivo</option>
								<option value="1">Activo</option>
							</select>
						</div>
					</div>
					
					<button type="submit" id="insertar" class="btn btn-lg btn-success">Insertar</button>
					
					</fieldset><!-- /informacion -->
					
				</form><!-- formulario -->
				
			</div><!-- /subgrupo -->
		</div><!-- /grupo -->
	</div> <!-- /contenido -->
<?php else: header('location: error.php');  endif; ?>