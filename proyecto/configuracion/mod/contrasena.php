
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
						<label for="usuario" class="col-sm-4 col-form-label" required>Antigua contraseña:</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="antiguaContrasena" name="antiguaContrasena" placeholder="Antigua contraseña">
						</div>
					</div>
					<div class="form-group row">
						<label for="nombre" class="col-sm-4 col-form-label" required>Nueva contraseña:</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="nuevaContrasena" name="nuevaContrasena" placeholder="Nueva contraseña">
						</div>
					</div>
					<div class="form-group row">
						<label for="nombre" class="col-sm-4 col-form-label" required>Repita su nueva contraseña:</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="repitaContrasena" name="repitaContrasena" placeholder="Repita su nueva contraseña">
						</div>
					</div>
					
					<button type="submit" id="actualizar" class="btn btn-lg btn-success">Actualizar</button>
					
				</form><!-- /formulario -->
				
			</div><!-- /subgrupo -->
		</div><!-- /grupo -->
	</div> <!-- /contenido -->