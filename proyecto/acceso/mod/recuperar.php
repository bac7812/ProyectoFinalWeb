
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
					
					<label for="correoelectronico" class="sr-only">Correo electrónico</label>
					<input type="email" id="correoelectronico" name="correoelectronico" class="form-control form-control-lg" placeholder="Correo electrónico" required>
					
					<br />
					
					<button type="submit" id="enviar" class="btn btn-lg btn-primary btn-block">Enviar</button>
					
				</form><!-- /formulario -->
				
			</div><!-- /subgrupo -->
		</div><!-- /grupo -->
	</div> <!-- /contenido -->
