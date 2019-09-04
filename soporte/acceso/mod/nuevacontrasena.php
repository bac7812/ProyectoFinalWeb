
	<div class="container acceso"><!-- contenido -->
		<div class="panel panel-default configuracion"><!-- grupo -->
			<div class="panel-body"><!-- subgrupo -->
				
				<?php
					if(isset($_SESSION['aviso'])){ 
						echo '<div class="mensaje">' .$_SESSION['aviso']. '</div>'; 
					};
				?>
				
				<div class="titulo"><!-- titulo -->
					<h1><?php echo $titulo_principal ?></h1>
				</div><!-- /titulo -->
				
				<form name="formulario" class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?opcion={$contenido}&id={$id}"); ?>"><!-- formulario -->
					
					<h2><?php echo $titulo_principal ?></h2>
					
					<label for="nuevaContrasena" class="sr-only">Nueva contraseña</label>
					<input type="password" id="nuevaContrasena" name="nuevaContrasena" class="form-control" placeholder="Nueva contraseña" required>
					<label for="repitaContrasena" class="sr-only">Repita su nueva contraseña:</label>
					<input type="password" id="repitaContrasena" name="repitaContrasena" class="form-control" placeholder="Repita su nueva contraseña" required>
					
					<button type="submit" id="actualizar" class="btn btn-lg btn-primary btn-block">Actualizar</button>
					
				</form><!-- /formulario -->
				
			</div><!-- /subgrupo -->
		</div><!-- /grupo -->
	</div> <!-- /contenido -->