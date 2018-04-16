<?php
	// *****************************************************************
	// CONECTARSE A LA BASE DE DATOS
	// *****************************************************************	
	// connect to database
	require_once 'dbconfig.php';

	$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

	 	$db = pg_connect($conn_string);
	    if(!$db){
	        $errormessage=pg_last_error();
	        echo "Error 0: " . $errormessage;
	        exit();
	    }	
	/*$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());*/
	
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
	if( !isset($_POST['sitio']) ||
		!isset($_POST['latitud']) ||
		!isset($_POST['longitud']) ||
		!isset($_POST['ccle']) ||
		!isset($_POST['ccln']) ||
		!isset($_POST['utme']) ||
		!isset($_POST['utmn']) ||
		!isset($_POST['zonautm']) ||
		!isset($_POST['precision_coord']) ||
		!isset($_POST['fuente_coord']) ||
		!isset($_POST['altitud']) ||
		!isset($_POST['tipo_accion']) ||
		!isset($_POST['fuente_altitud'])) {
		die('We are sorry, but there appears to be a problem with 
		the form you submitted.');		
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
	$sitio = $_POST['sitio'];
	$latitud = $_POST['latitud'];
	$longitud = $_POST['longitud'];
	$ccle = $_POST['ccle'];
	$ccln = $_POST['ccln'];
	$utme = $_POST['utme'];
	$utmn = $_POST['utmn'];
	$zonautm = $_POST['zonautm'];
	$precision_coord = $_POST['precision_coord'];
	$fuente_coord = $_POST['fuente_coord'];
	$altitud = $_POST['altitud'];
	$fuente_altitud = $_POST['fuente_altitud'];
	$tipo_accion = $_POST['tipo_accion'];
	
	// revisa si todos los campos han sido definidos por el usuario
	// si estan completos, realizar los inserts
	// si no estan completos (algun campo esta faltando), regresar error
	if ($sitio!="" & $latitud!="" & $longitud!="" & 
		$ccle!="" & $ccln!="" & $utme!="" &
		$utmn!="" & $zonautm!="" & $precision_coord!="" &
		$fuente_coord!="" & $altitud!="" & $fuente_altitud!=""
		)
	{

		// ***********
		// sitio
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = 'SELECT MAX("id_Sitio") as id_sitio_FK
				FROM sitio;';

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_sitio_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_sitio_FK);
			}				
			$stmt->close();
		}*/

		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}

		while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
					$id_sitio_FK = $row['id_sitio_fk'];
		}


		// sumar uno
		$id_sitio_FK = check_key($id_sitio_FK);
				
		// ***********
		// precision_coord
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		/*echo $query = "SELECT id_Precision_Coord as id_precision_coord_FK
				FROM paleo_fcb.t_precisioncoord
				WHERE Precision_Coord = '$precision_coord';";*/

				$query = 'SELECT "id_Precision_Coord" as id_precision_coord_FK FROM t_precisioncoord WHERE "Precision_Coord" =';
				$query .= "'$precision_coord';";

		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}

		while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
			$id_precision_coord_FK =  $row['id_precision_coord_fk'];
		}



		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_precision_coord_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_precision_coord_FK);
			}				
			$stmt->close();
		}*/
		// ***********
		// fuente_coord
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		/*echo $query = "SELECT id_Fuente_Coord as id_fuente_coord_FK
				FROM paleo_fcb.t_fuentecoord
				WHERE Fuente_Coord = '$fuente_coord';";*/

		$query = 'SELECT "id_Fuente_Coord" as id_fuente_coord_FK FROM t_fuentecoord WHERE "Fuente_Coord" =';
		$query .= "'$fuente_coord';";


		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}

		while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
			$id_fuente_coord_FK =  $row['id_fuente_coord_fk'];
		}

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_fuente_coord_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_fuente_coord_FK);
			}				
			$stmt->close();
		}	*/	
					
		// ***********
		// fuente_altitud
		// ***********	
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		/*echo $query = "SELECT id_Altitud as id_fuente_altitud_FK
				FROM paleo_fcb.t_altitud
				WHERE Fuente_Altitud = '$fuente_altitud';";*/		


		$query = 'SELECT "id_Altitud" as id_fuente_altitud_FK FROM t_altitud WHERE "Fuente_Altitud" =';
		$query .= "'$fuente_altitud';";


		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}

		while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
			$id_fuente_altitud_FK =  $row['id_fuente_altitud_fk'];
		}

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_fuente_altitud_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_fuente_altitud_FK);
			}				
			$stmt->close();
		}	*/	

		// ***********
		// ubicacion
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		if ($tipo_accion == 'continuar_sitio')
		{
			$id_ubicacion_FK = $id_Ubicacion;
			//echo $id_ubicacion_FK;
			
		}else{
			$query = 'SELECT MAX("id_Ubicacion") as id_ubicacion_fk 
						FROM "ubicacion";';

		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}

		while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
			$id_ubicacion_FK =  $row['id_ubicacion_fk'];
		}

			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_ubicacion_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_ubicacion_FK);
				}				
				$stmt->close();
			}*/	
		}
	
				
		// ********************		
		// insertar los valores
		// ********************
				
		 $query = "INSERT INTO sitio 
				VALUES ($id_sitio_FK,'$sitio',$latitud,
				$longitud,$ccle,$ccln,$utme,
				$utmn,$zonautm,$id_fuente_altitud_FK,
				$id_ubicacion_FK,$altitud,$id_fuente_coord_FK,
				$id_precision_coord_FK);";

		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
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

