<?php
	// validation expected data exists
	if(!isset($_POST['tipo_medidas'])) {
		die('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_medidas = $_POST['tipo_medidas'];


	if(!isset($_POST['tipo_operacion'])) {
		die('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_operacion = $_POST['tipo_operacion'];

	
	if ($tipo_medidas=='tipo_materiales_catalogo')
	{
		// option 1
		require_once 'forma_captura_materiales_catalogo.php';		
	}else
	{
		// option 2
		require_once 'forma_captura_materiales_lote.php';		
	}	
?>

<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>
