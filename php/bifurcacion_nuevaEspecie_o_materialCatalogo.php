<?php include("post_data_informacion.php"); ?> 

<?php
/*quede aqui*/
	// validation expected data exists
	if(!isset($_POST['tipo_accion'])) { 
		die('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_accion = $_POST['tipo_accion'];


	if(!isset($_POST['tipo_operacion'])) {
		die('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_operacion = $_POST['tipo_operacion'];


	if ($tipo_accion =='nueva_especie')
	{
		// option 1
		require_once 'forma_captura_especies_clase.php';		
	}elseif ($tipo_accion =='material_cat')
	{
		// option 2
		require_once 'forma_captura_materiales_catalogo.php';		
	}else
	{
		// option 3
		require_once 'forma_captura_materiales_lote.php';		
	}

	// extrae valores del formulario
	// Id_Especie
	//$id_Especies = $_POST['id_Especies'];	
	// echo $id_Especies;
			    	include("guardar_ubicacion_actual.php");
	?>
		<input type="hidden" name="referencia" value="<?= $referencia ?>" >

<tr><td> <input type="hidden" name="id_especies" value="<?= $id_Especies ?>" ></td></tr>
<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>