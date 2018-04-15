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
	if( !isset($_POST['id_clase_FK']) ||
		!isset($_POST['clase_texto']) ||
		!isset($_POST['clase_autor']) ||			
		!isset($_POST['clase_anio'])) {
		died('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	// define el mensaje de error
	require_once 'error_message.php';


	// *****************************************************************
	// EXTRAE LOS VALORES DEL FORMULARIO
	// *****************************************************************
	
	// extrae valores del formulario
	$id_clase_FK = $_POST['id_clase_FK'];
	$clase_texto = $_POST['clase_texto'];
	$clase_autor = $_POST['clase_autor'];
	$clase_anio = $_POST['clase_anio'];
	
	// revisa que variables no se encuentran en los combo boxes 
	// para asignarles el valor que el usuario puso en los cuadros
	// de texto
	
	// *****************************************************************
	// *****************************************************************
	// *****************************************************************
	// INSERCION DE VALORES EN LA BASE DE DATOS
	// *****************************************************************
	// *****************************************************************
	// *****************************************************************
	
	// revisa si todos los campos han sido definidos por el usuario
	// si estan completos, realizar los inserts
	// si no estan completos (algun campo esta faltando), regresar error
	if (
		$id_clase_FK!="" & $clase_texto!="" & 
		$clase_autor!="" & $clase_anio!=""
		)
	{

		// ***********
		// clase
		// ***********		
		
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($id_clase_FK=="NULL" & $clase_texto!="NULL"){
			$clase=$clase_texto;
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_Clase) as id_clase_FK 
					FROM paleo_fcb.t_clase";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_clase_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_clase_FK);
				}				
				$stmt->close();
			}
			// insertar nueva entrada
			$id_clase_FK = check_key($id_clase_FK);
			$query = "INSERT INTO paleo_fcb.t_clase 
					VALUES ('$id_clase_FK',
							'$clase',
							'$clase_autor',
							'$clase_anio');";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}					
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

