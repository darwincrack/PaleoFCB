<?php
	// validation expected data exists
	if(!isset($_POST['tipo_accion'])) {
		died('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_accion = $_POST['tipo_accion'];

	
	if ($tipo_accion=='importar')
	{
		// option 1
		require_once 'forma_importar.php';		
	}else
	{
		// option 2
		require_once 'export.php';		
	}	
?>
