	<div class="container"><!-- submenu -->
		<ul class="nav nav-tabs">
		  <li role="presentation" class="<?php if($contenido == 'perfil') { echo "active"; } else { echo ""; } ?>">
			<a href="index.php?opcion=perfil">Editar perfil</a>
		  </li>
		  <li role="presentation" class="<?php if($contenido == 'contrasena') { echo "active"; } ?>">
			<a href="index.php?opcion=contrasena">Editar contraseña</a>
		  </li>
		  <?php if($configurar == 1) {
					if($contenido == 'usuarios' or ($contenido == 'insertarUsuario' or $contenido == 'editarUsuario')){
						echo '<li role="presentation" class="active"><a href="index.php?opcion=usuarios">Editar usuarios</a></li>';
					} else {
						echo '<li role="presentation"><a href="index.php?opcion=usuarios">Editar usuarios</a></li>';
					}
					if($contenido == 'tipos' or ($contenido == 'insertarTipo' or $contenido == 'editarTipo')) {
						echo '<li role="presentation" class="active"><a href="index.php?opcion=tipos">Editar tipos</a></li>';
					} else {
						echo '<li role="presentation"><a href="index.php?opcion=tipos">Editar tipos</a></li>';
					}
					if($contenido == 'categorias' or ($contenido == 'insertarCategoria' or $contenido == 'editarCategoria')) {
						echo '<li role="presentation" class="active"><a href="index.php?opcion=categorias">Editar categorias</a></li>';
					} else {
						echo '<li role="presentation"><a href="index.php?opcion=categorias">Editar categorias</a></li>';
					}
				}
		  ?>
		</ul>
	</div><!-- /submenu -->
