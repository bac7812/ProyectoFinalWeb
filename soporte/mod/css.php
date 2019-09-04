	
	<!-- CSS Bootstrap -->
    <link href="/proyecto/css/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen" />
	
	<!-- CSS Propios -->
    <link href="/proyecto/css/general.css" rel="stylesheet">
	<?php
		if (isset($seccion)){
			echo '<link href="/proyecto/css/'.$seccion.'.css" rel="stylesheet">';
		}
	?>
	
