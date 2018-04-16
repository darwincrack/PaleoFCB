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
	        echo "Error 0: " . $errormessage;
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
	if( !isset($_POST['id_familia_FK']) ||
		!isset($_POST['familia_texto']) ||
		!isset($_POST['familia_autor']) ||										
		!isset($_POST['familia_anio'])) {
		died('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	// define el mensaje de error
	require_once 'error_message.php';


	// *****************************************************************
	// EXTRAE LOS VALORES DEL FORMULARIO
	// *****************************************************************
	
	// extrae valores del formulario
	// familia
	$id_familia_FK = $_POST['id_familia_FK'];
	$familia_texto = $_POST['familia_texto'];
	$familia_autor = $_POST['familia_autor'];
	$familia_anio = $_POST['familia_anio'];

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
		$id_familia_FK!="" & $familia_texto!="" & 
		$familia_autor!="" & $familia_anio!=""
		)
	{

		// ***********
		// familia
		// ***********		
		
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($id_familia_FK=="NULL" & $familia_texto!="NULL"){
			$familia=$familia_texto;
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(\"id_Familia\") as id_familia_fk 
					FROM t_familia";

		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_familia_FK= $data->id_familia_fk;
		}



			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_familia_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_familia_FK);
				}				
				$stmt->close();
			}*/
			// insertar nueva entrada
			$id_familia_FK = check_key($id_familia_FK);
			$query = "INSERT INTO t_familia 
					VALUES ('$id_familia_FK',
							'$familia',
							'$familia_autor',
							'$familia_anio');";
		$result = pg_query($db,$query);
		if (!$result) {
			echo "<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>";
		}


			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}*/
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

