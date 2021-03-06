<?php
	// *****************************************************************
	// CONECTARSE A LA BASE DE DATOS
	// *****************************************************************	
	// connect to database
	require_once 'dbconfig.php';
	/*$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
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
	if( !isset($_POST['id_especies']) ||
		!isset($_POST['no_catalogo']) ||
		!isset($_POST['descripcion_elemento']) ||
		!isset($_POST['id_lado_FK']) ||
		!isset($_POST['imagen']) ||
		!isset($_POST['id_elemento_FK']) ||
		!isset($_POST['id_parte_FK']) ||
		!isset($_POST['id_agente_FK']) ||
		!isset($_POST['agente_texto']) ||
		!isset($_POST['agente_clave_texto']) ||		
		!isset($_POST['id_contexto_FK']) ||
		!isset($_POST['id_interperismo_FK'])||
		!isset($_POST['alojamiento']) ||
		!isset($_POST['alojamiento_texto']) ||
		!isset($_POST['clave_alojamiento_texto'])
		) {
		die('We are sorry, but there appears to be a problem with the form you submitted.');		
	}

	// define el mensaje de error
	require_once 'error_message.php';

	// *****************************************************************
	// BIBLIOGRAFIA COMPLETA
	// *****************************************************************
	
	// extrae valores del formulario
	$id_especies_FK = $_POST['id_especies'];
	$no_catalogo = $_POST['no_catalogo'];
	$descripcion_elemento = $_POST['descripcion_elemento'];
	$id_lado_FK = $_POST['id_lado_FK'];
	$imagen = $_POST['imagen'];
	$id_elemento_FK = $_POST['id_elemento_FK'];
	$id_parte_FK = $_POST['id_parte_FK'];
	$id_agente_FK = $_POST['id_agente_FK'];
	$agente_texto = $_POST['agente_texto'];
	$agente_clave_texto = $_POST['agente_clave_texto'];	
	$id_contexto_FK = $_POST['id_contexto_FK'];
	$id_interperismo_FK = $_POST['id_interperismo_FK'];
	$alojamiento = $_POST['alojamiento'];
	$alojamiento_texto = $_POST['alojamiento_texto'];
	$clave_alojamiento_texto = $_POST['clave_alojamiento_texto'];

	// revisa si todos los campos han sido definidos por el usuario
	// si estan completos, realizar los inserts
	// si no estan completos (algun campo esta faltando), regresar error
	if ($id_especies_FK!="" & $no_catalogo!="" & $descripcion_elemento!="" & $id_lado_FK!="" &
		$imagen!="" & $id_elemento_FK!="" & $id_parte_FK!="" &
		$id_agente_FK!="" & & $agente_texto!="" &  $agente_clave_texto!="" &  
		$id_contexto_FK!="" & $id_interperismo_FK!="" & $alojamiento!="" & $alojamiento_texto!="" &
		$clave_alojamiento_texto!=""
		)
	{
		
		// ***********
		// edad_continental
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT MAX(id_MaterialesCatalogo) as id_materiales_catalogo_fk
				FROM materialescatalogo;";

				$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_materiales_catalogo_FK= $data->id_materiales_catalogo_fk;
		}


	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_materiales_catalogo_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_materiales_catalogo_FK);
			}				
			$stmt->close();
		}*/
		// revisa la llave
		$id_materiales_catalogo_FK = check_key($id_materiales_catalogo_FK);


		// ***********
		// id_especies_FK
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		//$query = "SELECT MAX(id_Especies) as id_especies_FK 
		//		 FROM paleo_fcb.especies;";
		//if ($stmt = $con->prepare($query)) {
		//	$stmt->execute();
		//	$stmt->bind_result($id_especies_FK);
		//	while ($stmt->fetch()) {
		//		// printf("%s\n", $id_especies_FK);
		//	}				
		//	$stmt->close();
		//}

		// ***********
		// alojamiento
		// ***********
		
		// caso especial de clave de alojamiento
		// si el usuario quiere dar de alta un nuevo campo
		if ($alojamiento=="NULL" & $alojamiento_texto!="NULL"){$alojamiento=$alojamiento_texto;}
		// solo y solo si se define manualmente la clave de almacenamiento 
		if ($clave_alojamiento_texto!="NULL")
		{
			// insertar nuevos valores en la tabla alojamiento
			$clave_alojamiento = "";
			$clave_alojamiento=$clave_alojamiento_texto;
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_Alojamiento) as id_alojamiento 
					FROM t_alojamiento";

					$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_alojamiento= $data->id_alojamiento;
		}



			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_alojamiento);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_alojamiento);
				}				
				$stmt->close();
			}*/
			// insertar nueva entrada en campo alojamiento
			$id_alojamiento_FK = check_key($id_alojamiento);
			$query = "INSERT INTO t_alojamiento 
					VALUES ('$id_alojamiento_FK','$clave_alojamiento','$alojamiento')";

		$result = pg_query($db,$query);
		if (!$result) {
			echo "<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>";
		}




			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}	*/	
		}
		// extraer la FK
		$query = "SELECT id_Alojamiento as id_alojamiento_fk 
				FROM t_alojamiento 
				WHERE Alojamiento = '$alojamiento'";



		
		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_alojamiento_FK= $data->id_alojamiento_fk;
		}



	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_alojamiento_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_alojamiento_FK);
			}				
			$stmt->close();
		}*/
		
		// ***********
		// agente
		// ***********		
		
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($id_agente_FK=="NULL" & 
			$agente_clave!="NULL")
		{
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_Agente) as id_agente_fk
						FROM t_agente;";


			
		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_agente_FK= $data->id_agente_fk;
		}



			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_agente_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_agente_FK);
				}				
				$stmt->close();
			}*/
			// suma uno
			$id_agente_FK = check_key($id_agente_FK);
			// realiza la insercion
			$query = "INSERT INTO t_agente 
					VALUES ('$id_agente_FK',
							'$agente_clave_texto',
							'$agente_texto');";

					$result = pg_query($db,$query);
		if (!$result) {
			echo "<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>";
		}


			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}*/
		}else
		{
			$id_agente_FK = $id_agente_FK;
		}

		
		// ********************		
		// insertar los valores
		// ********************
		
		$query = "INSERT INTO materialescatalogo 
				VALUES ('$id_materiales_catalogo_FK','$no_catalogo','$descripcion_elemento',
				'$id_lado_FK',NULL,'$id_especies_FK','$id_elemento_FK','$id_parte_FK',
				'$id_agente_FK','$id_contexto_FK','$id_interperismo_FK','$id_alojamiento_FK');";

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
		 echo 'Transacci&oacute;n completa con &eacute;xito.';
	}else
	{
		echo "<br>";
		echo $error_message;
	}