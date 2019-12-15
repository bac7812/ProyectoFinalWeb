	
	<div class="container acceso"><!-- contenido -->
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
				</div><!-- /titulo -->
				
				<form name="formulario" class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><!-- formulario -->
				
					<h2><?php echo $titulo_principal ?></h2>
					
					<label for="usuario" class="sr-only">Usuario</label>
					<input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
					<label for="contrasena" class="sr-only">Contraseña</label>
					<input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required>
					
					<button type="submit" id="acceso" class="btn btn-lg btn-primary btn-block">Entrar</button>
					
				</form><!-- /formulario -->
				
			</div><!-- /subgrupo -->
		</div><!-- /grupo -->
	</div> <!-- /contenido -->
