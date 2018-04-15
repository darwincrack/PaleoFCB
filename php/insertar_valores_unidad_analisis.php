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
	if( !isset($_POST['unidad_analisis']) ||
		!isset($_POST['litologia']) ||
		!isset($_POST['sistema_depositacion']) ||
		!isset($_POST['sistema_depositacion_texto']) ||
		!isset($_POST['sistema_depositacion_clave_texto']) ||
		!isset($_POST['ambiente_depositacion']) ||
		!isset($_POST['ambiente_depositacion_texto']) ||
		!isset($_POST['ambiente_depositacion_clave_texto']) ||
		!isset($_POST['facie']) ||
		!isset($_POST['facie_texto']) ||
		!isset($_POST['facie_clave_texto']) ||
		!isset($_POST['formacion']) ||
		!isset($_POST['formacion_texto']) ||
		!isset($_POST['contaminacion']) ||
		!isset($_POST['nota_formacion']) ||
		!isset($_POST['tipo_edad'])) {
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
	$unidad_analisis = $_POST['unidad_analisis'];
	$litologia = $_POST['litologia'];
	$sistema_depositacion = $_POST['sistema_depositacion'];
	$sistema_depositacion_texto = $_POST['sistema_depositacion_texto'];
	$sistema_depositacion_clave_texto = $_POST['sistema_depositacion_clave_texto'];
	$ambiente_depositacion = $_POST['ambiente_depositacion'];
	$ambiente_depositacion_texto = $_POST['ambiente_depositacion_texto'];
	$ambiente_depositacion_clave_texto = $_POST['ambiente_depositacion_clave_texto'];
	$facie = $_POST['facie'];
	$facie_texto = $_POST['facie_texto'];
	$facie_clave_texto = $_POST['facie_clave_texto'];
	$formacion = $_POST['formacion'];
	$formacion_texto = $_POST['formacion_texto'];
	$contaminacion = $_POST['contaminacion'];
	$nota_formacion = $_POST['nota_formacion'];
	$tipo_edad = $_POST['tipo_edad'];
	
	// revisa si todos los campos han sido definidos por el usuario
	// si estan completos, realizar los inserts
	// si no estan completos (algun campo esta faltando), regresar error
	if ($unidad_analisis!="" & $litologia!="" & $sistema_depositacion!="" & 
		$sistema_depositacion_texto!="" & $sistema_depositacion_clave_texto!="" &
		$ambiente_depositacion!="" & $ambiente_depositacion_texto!="" & $ambiente_depositacion_clave_texto!="" &
		$facie!="" & $facie_texto!="" & $facie_clave_texto!="" & 
		$formacion!="" & $formacion_texto!="" &
		$contaminacion!="" & $nota_formacion!=""  & $tipo_edad!="")
	{
		
		// ***********
		// unidad_analisis
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT MAX(id_UnidadAnalisis) as id_unidad_analisis_FK
				FROM paleo_fcb.unidadanalisis;";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_unidad_analisis_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_unidad_analisis_FK);
			}				
			$stmt->close();
		}
		// sumar uno
		$id_unidad_analisis_FK = check_key($id_unidad_analisis_FK);
				
		// ***********
		// sistema_depositacion
		// ***********	
		
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($sistema_depositacion=="NULL" & 
			$sistema_depositacion_texto!="NULL")
		{
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_sistema_depositacion) as id_sistema_depositacion_FK 
					FROM paleo_fcb.t_sistemadepositacion;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_sistema_depositacion_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_sistema_depositacion_FK);
				}				
				$stmt->close();
			}
			// suma uno
			$id_sistema_depositacion_FK = check_key($id_sistema_depositacion_FK);
			// realiza la insercion
			$query = "INSERT INTO paleo_fcb.t_sistemadepositacion 
					VALUES ('$id_sistema_depositacion_FK',
							'$sistema_depositacion_clave_texto',
							'$sistema_depositacion_texto');";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}
		}else
		{
			$id_sistema_depositacion_FK = $sistema_depositacion;
		}
		
		// ***********
		// ambiente_depositacion
		// ***********	
		
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($ambiente_depositacion=="NULL" & 
			$ambiente_depositacion_texto!="NULL")
		{
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_ambiente_depositacion) as id_ambiente_depositacion_FK 
					FROM paleo_fcb.t_ambientedepositacion;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_ambiente_depositacion_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_ambiente_depositacion_FK);
				}				
				$stmt->close();
			}
			// suma uno
			$id_ambiente_depositacion_FK = check_key($id_ambiente_depositacion_FK);
			// realiza la insercion
			$query = "INSERT INTO paleo_fcb.t_ambientedepositacion 
					VALUES ('$id_ambiente_depositacion_FK',
							'$ambiente_depositacion_clave_texto',
							'$ambiente_depositacion_texto');";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}
		}else
		{
			$id_ambiente_depositacion_FK = $ambiente_depositacion;
		}
			
					
		// ***********
		// facie
		// ***********	
		
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($facie=="NULL" & 
			$facie_texto!="NULL")
		{
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_facies) as id_facie_FK
					from paleo_fcb.t_facies;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_facie_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_facie_FK);
				}				
				$stmt->close();
			}
			// suma uno
			$id_facie_FK = check_key($id_facie_FK);
			// realiza la insercion
			$query = "INSERT INTO paleo_fcb.t_facies 
					VALUES ('$id_facie_FK',
							'$facie_clave_texto',
							'$facie_texto');";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}
		}else
		{
			$id_facie_FK = $facie;
		}
		
		// ***********
		// formacion
		// ***********	
		
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($formacion=="NULL" & 
			$formacion_texto!="NULL")
		{
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_formacion) as id_formacion_FK
					from paleo_fcb.t_formacion;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_formacion_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_formacion_FK);
				}				
				$stmt->close();
			}
			// suma uno
			$id_formacion_FK = check_key($id_formacion_FK);
			// realiza la insercion
			$query = "INSERT INTO paleo_fcb.t_formacion 
					VALUES ('$id_formacion_FK',
							'$formacion_texto');";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}
		}else
		{
			$id_formacion_FK = $formacion;
		}
	
		// ***********
		// contaminacion
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT id_contaminacion as id_contaminacion_FK
				FROM paleo_fcb.t_contaminacion
				WHERE contaminacion = '$contaminacion';";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_contaminacion_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_contaminacion_FK);
			}				
			$stmt->close();
		}							
	
		// ***********
		// sitio
		// no se le suma 1 al FK debido a que se
		// acaba de insertar una entrada
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT MAX(id_Sitio) 
					as id_sitio_FK 
				FROM paleo_fcb.sitio;";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_sitio_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_sitio_FK);
			}				
			$stmt->close();
		}

		// ******************************************
		// VERIFICA SI ES EDAD CONTINENTAL O MARITIMA
		// ******************************************
		
		if ($tipo_edad == 'edad_continental')
		{
			// ******************************************
			// edad_continental
			// ******************************************
			// NO ME DEJA GENERAR LA 
			// FK a la tabla unidadanalisis 
			// porque no existe la llave en la tabla
			// edad_x . Por eso se creara una fila dummy 
			// con valores random y se hara un update
			// ******************************************
		
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_EdadContinental) 
						as id_edad_continental_FK 
					FROM paleo_fcb.edadcontinental;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_edad_continental_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_edad_continental_FK);
				}				
				$stmt->close();
			}
			// sumar uno debido a que es la siguiente tabla a llenar
			$id_edad_continental_FK = check_key($id_edad_continental_FK);
		
			// insertar valores dummy
			$query = "INSERT INTO paleo_fcb.edadcontinental 
					VALUES ('$id_edad_continental_FK', 
						'1', '1', '1', '1', '1', '1', '1',
						'NULL', '1', '1', '1', '1', 
						'1', '1', 'NULL', '1');";
						
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}

			// ********************		
			// insertar los valores
			// ********************
											
			$query = "INSERT INTO paleo_fcb.unidadanalisis 
					VALUES ('$id_unidad_analisis_FK','$unidad_analisis','$litologia',
					'$id_sistema_depositacion_FK','$id_ambiente_depositacion_FK',
					'$id_facie_FK','$id_formacion_FK','$id_contaminacion_FK',
					'$nota_formacion','$id_edad_continental_FK',NULL,
					'$id_sitio_FK');";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}
			// imprimir mensaje de salida 
			echo "<br>";
			// echo 'Transacci&oacute;n completa con &eacute;xito.';				
			
		}else
		{
			// ******************************************
			// edad_maritima
			// ******************************************
			// NO ME DEJA GENERAR LA 
			// FK a la tabla unidadanalisis 
			// porque no existe la llave en la tabla
			// edad_x . Por eso se creara una fila dummy 
			// con valores random y se hara un update
			// ******************************************
		
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_EdadMaritima) 
						as id_edad_maritima_FK
					FROM paleo_fcb.edadmaritima;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_edad_maritima_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_edad_maritima_FK);
				}				
				$stmt->close();
			}
			// sumar uno debido a que es la siguiente tabla a llenar
			$id_edad_maritima_FK = check_key($id_edad_maritima_FK);
			
			// insertar valores dummy
			$query = "INSERT INTO paleo_fcb.edadmaritima 
					VALUES ('$id_edad_maritima_FK', 
							'1', '1', '1', '1', 
							'1', '1', '1', 'NULL', 'NULL');";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}

			// ********************		
			// insertar los valores
			// ********************
											
			$query = "INSERT INTO paleo_fcb.unidadanalisis 
					VALUES ('$id_unidad_analisis_FK','$unidad_analisis','$litologia',
					'$id_sistema_depositacion_FK','$id_ambiente_depositacion_FK',
					'$id_facie_FK','$id_formacion_FK','$id_contaminacion_FK',
					'$nota_formacion',NULL,'$id_edad_maritima_FK',
					'$id_sitio_FK');";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}
			// imprimir mensaje de salida 
			echo "<br>";
			// echo 'Transacci&oacute;n completa con &eacute;xito.';			
		}
				
	}else
	{
		echo "<br>";
		echo $error_message;
	}
?>
