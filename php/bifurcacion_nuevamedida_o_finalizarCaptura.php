<?php
	
	// extrae valores del formulario
	// Id_Especie
	$id_Especies = $_POST['id_especies'];
			
	//echo $id_Especies;
	
	// validation expected data exists
	if(!isset($_POST['tipo_accion'])) {
		died('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_accion = $_POST['tipo_accion'];
	//echo $tipo_accion;

	if(!isset($_POST['tipo_operacion'])) {
		died('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_operacion = $_POST['tipo_operacion'];


	if ($tipo_accion =='nueva_med')
	{
		// option 1
		require_once 'forma_captura_meristica.php';		
	}else
	{
		// option 3
		require_once 'insertar_valores_meristica.php';		
	}

?>

<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>
