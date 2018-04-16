<?php
	// *****************************************************************
	// CONECTARSE A LA BASE DE DATOS
	// *****************************************************************	
	// connect to database
	require_once 'dbconfig.php';
/*	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());*/

					$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

	 	$db = pg_connect($conn_string);
	    if(!$db){
	        $errormessage=pg_last_error();
	        echo "Error : " . $errormessage;
	        exit();
	    }		
	
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
		!isset($_POST['id_edad_FK']) ||
		!isset($_POST['edad_unidad_analisis']) ||
		!isset($_POST['id_metodo_fechamiento_FK']) ||
		!isset($_POST['id_material_fechado_FK']) ||
		!isset($_POST['no_muestra']) ||
		!isset($_POST['laboratorio'])) {
		die('We are sorry, but there appears to be a 
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
	$id_edad_FK = $_POST['id_edad_FK'];
	$edad_unidad_analisis = $_POST['edad_unidad_analisis'];
	$id_metodo_fechamiento_FK = $_POST['id_metodo_fechamiento_FK'];
	$id_material_fechado_FK = $_POST['id_material_fechado_FK'];
	$no_muestra = $_POST['no_muestra'];
	$laboratorio = $_POST['laboratorio'];

	// revisa si todos los campos han sido definidos por el usuario
	// si estan completos, realizar los inserts
	// si no estan completos (algun campo esta faltando), regresar error
	if ($id_era_FK!="" & $id_periodo_FK!="" & $id_epoca_FK!="" &
		$id_edad_FK!=""  & $edad_unidad_analisis!="" & $id_metodo_fechamiento_FK!="" &
		$id_material_fechado_FK!="" & $no_muestra!="" & $laboratorio!=""
		)
	{
		
		// ***********
		// edad_maritima
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT MAX(id_EdadMaritima) as id_edad_maritima_fk
				FROM edadmaritima;";

				$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_edad_maritima_FK= $data->id_edad_maritima_fk;
		}



		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_edad_maritima_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_edad_maritima_FK);
			}				
			$stmt->close();
		}*/

		// // ********************		
		// // insertar los valores
		// // ********************
				
		// // sumar uno
		// $id_edad_maritima_FK = check_key($id_edad_maritima_FK);
		
		// $query = "INSERT INTO paleo_fcb.edadmaritima 
		// 		VALUES ('$id_edad_maritima_FK','$id_era_FK','$id_periodo_FK',
		// 		'$id_epoca_FK','$id_edad_FK', '$edad_unidad_analisis',
		// 		'$id_metodo_fechamiento_FK',
		// 		'$id_material_fechado_FK','$no_muestra','$laboratorio');";
		// if ($stmt = $con->prepare($query)) {
		// 	$stmt->execute();
		// }

		// *****************************************
		// insertar los valores
		// SIGUIENDO EL FLUJO DESDE 
		// insertar_valores_unidad_analisis.php
		// donde tengo que reemplazar valores dummy
		// *****************************************

		$query = "UPDATE edadmaritima   
				SET Era='$id_era_FK',
					Periodo='$id_periodo_FK',
					Epoca='$id_epoca_FK',
					Edad='$id_edad_FK',
					Edad_Unidad_Analisis='$edad_unidad_analisis',
					Metodo_Fechado='$id_metodo_fechamiento_FK',
					Material_Fechado='$id_material_fechado_FK',
					No_Muestra='$no_muestra',
					Laboratorio='$laboratorio'
				WHERE id_EdadMaritima='$id_edad_maritima_FK';";

				$result = pg_query($db,$query);
		if (!$result) {
			echo "<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>";
		}

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
		}*/

		// imprimir mensaje de salida 
		echo "<br>";
		// echo 'Transacci&oacute;n completa con &eacute;xito.';
	}else
	{
		echo "<br>";
		echo $error_message;
	}
?>
