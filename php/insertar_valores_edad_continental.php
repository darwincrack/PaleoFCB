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
	if( !isset($_POST['id_era_FK']) ||
		!isset($_POST['id_periodo_FK']) ||
		!isset($_POST['id_epoca_FK']) ||
		!isset($_POST['id_estadio_FK']) ||
		!isset($_POST['id_glacial_interglacial_FK']) ||
		!isset($_POST['gli_duracion']) ||
		!isset($_POST['id_piso_faunistico_FK']) ||
		!isset($_POST['fauna_local']) ||
		!isset($_POST['id_edad_cultural_FK']) ||
		!isset($_POST['id_isotopo_FK']) ||
		!isset($_POST['id_magnetocron_FK']) ||
		!isset($_POST['id_metodo_fechamiento_FK']) ||
		!isset($_POST['id_material_fechado_FK']) ||
		!isset($_POST['no_muestra']) ||
		!isset($_POST['laboratorio']) ||
		!isset($_POST['edad_unidad_analisis'])) {
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
	$id_era_FK = $_POST['id_era_FK'];
	$id_periodo_FK = $_POST['id_periodo_FK'];
	$id_epoca_FK = $_POST['id_epoca_FK'];
	$id_estadio_FK = $_POST['id_estadio_FK'];
	$id_glacial_interglacial_FK = $_POST['id_glacial_interglacial_FK'];
	$gli_duracion = $_POST['gli_duracion'];
	$id_piso_faunistico_FK = $_POST['id_piso_faunistico_FK'];
	$fauna_local = $_POST['fauna_local'];
	$id_edad_cultural_FK = $_POST['id_edad_cultural_FK'];
	$id_isotopo_FK = $_POST['id_isotopo_FK'];
	$id_magnetocron_FK = $_POST['id_magnetocron_FK'];
	$id_metodo_fechamiento_FK = $_POST['id_metodo_fechamiento_FK'];
	$id_material_fechado_FK = $_POST['id_material_fechado_FK'];
	$no_muestra = $_POST['no_muestra'];
	$laboratorio = $_POST['laboratorio'];
	$edad_unidad_analisis = $_POST['edad_unidad_analisis'];

	// revisa si todos los campos han sido definidos por el usuario
	// si estan completos, realizar los inserts
	// si no estan completos (algun campo esta faltando), regresar error
	if ($id_era_FK!="" & $id_periodo_FK!="" & $id_epoca_FK!="" &
		$id_estadio_FK!="" & $id_glacial_interglacial_FK!="" & $gli_duracion!="" &
		$id_piso_faunistico_FK!="" & $fauna_local!="" & $id_edad_cultural_FK!="" &
		$id_isotopo_FK!="" & $id_magnetocron_FK!="" & $id_metodo_fechamiento_FK!="" &
		$id_material_fechado_FK!="" & $no_muestra!="" & $laboratorio!="" &
		$edad_unidad_analisis!=""
		)
	{
		
		// ***********
		// edad_continental
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT MAX(id_EdadContinental) as id_edad_continental_FK
				FROM paleo_fcb.edadcontinental;";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_edad_continental_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_edad_continental_FK);
			}				
			$stmt->close();
		}

		// ********************		
		// insertar los valores
		// ********************
		
		// // sumar uno
		// $id_edad_continental_FK = check_key($id_edad_continental_FK);
				
				
		// $query = "INSERT INTO paleo_fcb.edadcontinental 
		// 		VALUES ('$id_edad_continental_FK','$id_era_FK','$id_periodo_FK',
		// 		'$id_epoca_FK','$id_estadio_FK','$id_glacial_interglacial_FK','$gli_duracion',
		// 		'$id_piso_faunistico_FK','$fauna_local','$id_edad_cultural_FK',
		// 		'$id_isotopo_FK','$id_magnetocron_FK','$id_metodo_fechamiento_FK',
		// 		'$id_material_fechado_FK','$no_muestra','$laboratorio',
		// 		'$edad_unidad_analisis');";
		// if ($stmt = $con->prepare($query)) {
		// 	$stmt->execute();
		// }

		// *****************************************
		// insertar los valores
		// SIGUIENDO EL FLUJO DESDE 
		// insertar_valores_unidad_analisis.php
		// donde tengo que reemplazar valores dummy
		// *****************************************

		$query = "UPDATE paleo_fcb.edadcontinental   
				SET Era='$id_era_FK',
					Periodo='$id_periodo_FK',
					Epoca='$id_epoca_FK',
					Estadio='$id_estadio_FK',
					Glacial_Interglacial='$id_glacial_interglacial_FK',
					GL_I_Duracion='$gli_duracion',
					Piso_Faunistico='$id_piso_faunistico_FK',
					fauna_local='$fauna_local',
					Edad_Cultural='$id_edad_cultural_FK',
					Isotopo='$id_isotopo_FK',
					Magnetocron='$id_magnetocron_FK',
					Metodo_Fechado='$id_metodo_fechamiento_FK',
					Material_Fechado='$id_material_fechado_FK',
					No_Muestra='$no_muestra',
					Laboratorio='$laboratorio',
					EdadUnidadAnalisis='$edad_unidad_analisis'
				WHERE id_EdadContinental='$id_edad_continental_FK';";

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
