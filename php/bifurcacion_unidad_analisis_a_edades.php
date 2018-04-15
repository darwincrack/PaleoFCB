<?php
	// validation expected data exists
	if(!isset($_POST['tipo_edad'])) {
		died('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_edad = $_POST['tipo_edad'];

	if(!isset($_POST['tipo_operacion'])) {
		died('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_operacion = $_POST['tipo_operacion'];

	// insertar valores del formulario anterior
	require_once 'insertar_valores_unidad_analisis.php';
	
	if ($tipo_edad=='edad_continental')
	{
		// option 1
		require_once 'forma_captura_edad_continental_era.php';		
	}else
	{
		// option 2
		require_once 'forma_captura_edad_maritima_era.php';		
	}
?>

<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>
