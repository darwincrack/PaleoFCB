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
	if( !isset($_POST['referencia']) ||
		!isset($_POST['anio']) ||
		!isset($_POST['tipo_referencia'])) {
		die('We are sorry, but there appears to be a problem 
			with the form you submitted.');		
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

	// *****************************************************************
	// BIBLIOGRAFIA COMPLETA
	// *****************************************************************
	
	// extrae valores del formulario
	$referencia = $_POST['referencia'];
	$anio = $_POST['anio'];
	$tipo_referencia = $_POST['tipo_referencia'];
	
	// revisa si todos los campos han sido definidos por el usuario
	// si estan completos, realizar los inserts
	// si no estan completos (algun campo esta faltando), regresar error
	if ($referencia!="" & $anio!="" & $tipo_referencia!="")
	{
			
		// ***********
		// id_referencia_FK
		// ***********	
				
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = 'SELECT MAX("id_Referencia") as id_referencia_FK 
				 FROM t_referencia';

		$result = pg_query($db,$query);
		if (!$result) {
				die(
				"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
				<br>
				<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
				);
		}


		if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
			$id_referencia_FK  = $row['id_referencia_fk'];
		}	
		/*
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_referencia_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_referencia_FK);
			}				
			$stmt->close();
		}*/
		// sumar uno
		$id_referencia_FK = check_key($id_referencia_FK);
		// ***********
		// tipo_referencia
		// ***********	
		// extrae la FK del tipo de referencia




		$query =   'SELECT  "id_Tipo_Referencia" FROM t_tiporeferencia where t_tiporeferencia."Tipo_Referencia"= \''.$tipo_referencia.'\' ;';
		
		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}
		if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
			$id_tipo_referencia  = $row['id_Tipo_Referencia'];
		}

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_tipo_referencia);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_tipo_referencia);
			}		
			$stmt->close();
		}*/

		// ***********
		// insertar valores t_referencia
		// ***********	
		// insertar la referencia
		$query = "INSERT INTO t_referencia VALUES ('$id_referencia_FK','$referencia')";

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

		// ***********
		// id_referencia_bibliografica_FK
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		  $query = 'SELECT MAX("id_ReferenciaBibliografica") as id_referencia_bibliografica_FK FROM referenciabibliografica;';
	
				$result = pg_query($db,$query);
			if (!$result) {
				die(
				"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
				<br>
				<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
				);
			}	


		if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
			$id_referencia_bibliografica_FK  = $row['id_referencia_bibliografica_fk'];
		}	


		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_referencia_bibliografica_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_referencia_bibliografica_FK);
			}				
			$stmt->close();
		}*/
		// sumar uno
		//echo $id_referencia_bibliografica_FK = check_key($id_referencia_bibliografica_FK);
		$id_referencia_bibliografica_FK = check_key($id_referencia_bibliografica_FK);
		// insertar los valores
		$query = "INSERT INTO referenciabibliografica 
				VALUES ($id_referencia_bibliografica_FK,
						$anio,
						$id_referencia_FK,
						$id_tipo_referencia);";
						

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
