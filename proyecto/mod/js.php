	
	<!-- JS jQuery -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

	<!-- JS Bootstrap -->
	<script src="/proyecto/js/bootstrap/bootstrap.min.js"></script>
	
	<?php 
		if (isset($seccion)){
			echo '<!-- JS Propio -->';
		}
	?>
	
	<?php
		if (isset($seccion)){
			echo '<script src="/proyecto/js/'.$seccion.'.js"></script>';
		}
	?>


