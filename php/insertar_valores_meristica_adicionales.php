<?php
	// *****************************************************************
	// CONECTARSE A LA BASE DE DATOS
	// *****************************************************************	
	// connect to database
	require_once 'dbconfig.php';
	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
	
	// *****************************************************************
	// CARGAR FUNCIONES
	// *****************************************************************
	include("functions_lib.php");

	// *****************************************************************
	// *****************************************************************
	// *****************************************************************
	// REVISA QUE TODOS LOS CAMPOS CAPTURADOS NO ESTEN VACIOS
	// *****************************************************************
	// *****************************************************************
	// *****************************************************************

	// validation expected data exists
	if( !isset($_POST['clave_medida']) ||
		!isset($_POST['descripcion_medida']) ||
		!isset($_POST['medida']) ||
		!isset($_POST['unidades']) ||	
		!isset($_POST['notas_meristica'])) {
		died('We are sorry, but there appears to be a 
				problem with the form you submitted.');		
	}
	// define el mensaje de error
	require_once 'error_message.php';

	// *****************************************************************
	// *****************************************************************
	// *****************************************************************
	// INSERCION DE VALORES EN LA BASE DE DATOS
	// *****************************************************************
	// *****************************************************************
	// *****************************************************************
	
	// extrae valores del formulario
	$clave_medida = $_POST['clave_medida'];
	$descripcion_medida = $_POST['descripcion_medida'];
	$medida = $_POST['medida'];
	$unidades = $_POST['unidades'];
	$notas_meristica = $_POST['notas_meristica'];

	if(!isset($_POST['tipo_operacion'])) {
		died('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_operacion = $_POST['tipo_operacion'];


	
	// revisa si todos los campos han sido definidos por el usuario
	// si estan completos, realizar los inserts
	// si no estan completos (algun campo esta faltando), regresar error
	if ($clave_medida!="" & $descripcion_medida!="" & 
		$medida!="" & $unidades!="" & 
		$notas_meristica!="")
	{
		
		// ***********
		// id_meristica_FK
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT MAX(id_Meristica) 
					as id_meristica_FK 
				FROM paleo_fcb.meristica;";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_meristica_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_meristica_FK);
			}				
			$stmt->close();
		}
		// suma 1
		$id_meristica_FK = check_key($id_meristica_FK);
		
		// ***********
		// id_materiales_catalogo_FK
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT MAX(id_MaterialesCatalogo) 
					as id_materiales_catalogo_FK 
				FROM paleo_fcb.materialescatalogo;";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_materiales_catalogo_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_materiales_catalogo_FK);
			}				
			$stmt->close();
		}

		// ********************		
		// insertar los valores
		// ********************
								
		$query = "INSERT INTO paleo_fcb.meristica 
				VALUES ('$id_meristica_FK',
						'$id_materiales_catalogo_FK',
						'$clave_medida',
						'$descripcion_medida',
						'$medida',
						'$unidades',						
						'$notas_meristica');";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
		}
		
		// imprimir mensaje de salida 
		echo "<br>";
		// echo 'Transacci&oacute;n completa con &eacute;xito.';
	}else
	{
		echo "<br>";
		echo $error_message;
	}
?>

<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>