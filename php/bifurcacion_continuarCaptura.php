<?php
	// validation expected data exists
	if(!isset($_POST['tipo_accion'])) {
		die('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_accion = $_POST['tipo_accion'];


	$tipo_operacion = $_POST['tipo_accion'];
		
	$ID_REF = $_POST['ID_REF'];
	//echo $ID_REF;
	
	if ($tipo_accion =='continuar_sitio')
	{
		// option 1
		require_once 'forma_continuar_captura_sitio.php';		
	}else
	{
		// option 3
		require_once 'forma_captura_continuar_region.php';		
	}

	// extrae valores del formulario
	// Id_Especie
	//$id_Especies = $_POST['id_Especies'];	
	// echo $id_Especies;
?>

<tr><td> <input type="hidden" name="ID_REF" value="<?= $ID_REF ?>" ></td></tr>
<tr><td> <input type="hidden" name="tipo_accion" value="<?= $tipo_accion ?>" ></td></tr>
<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>
