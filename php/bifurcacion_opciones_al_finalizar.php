<?php
	// validation expected data exists
	if(!isset($_POST['tipo_accion'])) {
		died('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_accion = $_POST['tipo_accion'];
	//echo $tipo_accion;

	if($tipo_accion=='otra_matcat')
	{
		if( !isset($_POST['id_especies'])) {
			die('We are sorry, but there appears to be a problem with the form you submitted.');		
		}
		
		$id_Especies = $_POST['id_especies'];
				
//		echo $id_Especies;
	}

	if(!isset($_POST['tipo_operacion'])) {
		die('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_operacion = $_POST['tipo_operacion'];

	
?>

<tr><td> <input type="hidden" name="tipo_accion" value="<?= $tipo_accion ?>" ></td></tr>
<tr><td> <input type="hidden" name="id_especies" value="<?= $id_Especies ?>" ></td></tr>
<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>

<?php
	if ($tipo_accion =='otro_sitio')
	{
		// option 1
		require_once 'forma_captura_nuevo_sitio.php';		
	}elseif ($tipo_accion =='otra_ua')
	{
		// option 2
		require_once 'forma_captura_nueva_unidad_analisis.php';		
	}elseif ($tipo_accion =='otra_esp')
	{
		// option 3
		require_once 'forma_captura_especies_existente.php';		
	}elseif ($tipo_accion =='otra_matcat')
	{
		// option 4
		require_once 'forma_captura_nuevo_material_catalogo.php';		
	}elseif ($tipo_accion =='otra_local')
	{
		// option 5
		require_once 'forma_captura_nueva_ubicacion.php';
	}

?>