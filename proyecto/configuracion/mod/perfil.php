
	<div class="container"><!-- contenido -->
		<div class="panel panel-default configuracion"><!-- grupo -->
			<div class="panel-body"><!-- subgrupo -->
				
				<?php
					if(isset($_SESSION['aviso'])){ 
						echo '<div class="mensaje">' .$_SESSION['aviso']. '</div>'; 
						unset($_SESSION['aviso']);
					};
				?>
				
				<div class="titulo"><!-- titulo -->
					<h1><?php echo $titulo_principal ?></h1>
				</div><!-- /titulo -->
				
				<form name="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?opcion={$contenido}"); ?>"><!-- formulario -->
				
					<div class="form-group row">
						<div class="col-sm-4">
							<p><b>Usuario:</b></p>
						</div>
						<div class="col-sm-8">
							<p><?php echo $usuario; ?></p>
						</div>
					</div>
					<div class="form-group row">
						<label for="nombre" class="col-sm-4 col-form-label" required><b>Nombre:</b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo utf8_encode($nombre); ?>" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="apellidos" class="col-sm-4 col-form-label" required><b>Apellidos:</b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo utf8_encode($apellidos); ?>" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-4 col-form-label" required><b>Correo electrónico:</b></label>
						<div class="col-sm-8">
							<input type="email" class="form-control" id="correoelectronico" name="correoelectronico" placeholder="Correo electrónico" value="<?php echo $correoelectronico; ?>" required>
						</div>
					</div>
					
					<button type="submit" id="actualizar" class="btn btn-lg btn-success">Actualizar</button>
					
				</form><!-- /formulario -->
				
			</div><!-- /subgrupo -->
		</div><!-- /grupo -->
	</div> <!-- /contenido -->
