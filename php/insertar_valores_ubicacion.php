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
	if( !isset($_POST['region']) ||
		!isset($_POST['pais']) ||
		!isset($_POST['estado']) ||
		!isset($_POST['municipio']) ||
		!isset($_POST['tipo_accion']) ||		
		!isset($_POST['localidad'])) {
		died('We are sorry, but there appears to be a problem 
		with the form you submitted.');		
	}
	// define el mensaje de error
	require_once 'error_message.php';
	
	// *****************************************************************
	// ubicacion
	// *****************************************************************
	
	// extrae valores del formulario
	$region = $_POST['region'];
	$pais = $_POST['pais'];
	$estado = $_POST['estado'];
	$municipio = $_POST['municipio'];
	$municipio_texto = $_POST['municipio_texto'];
	$localidad = $_POST['localidad'];
	$tipo_accion = $_POST['tipo_accion'];
		
	// revisa si todos los campos han sido definidos por el usuario
	// si estan completos, realizar los inserts
	// si no estan completos (algun campo esta faltando), regresar error
	if ($region!="" & $pais!="" & $estado!="" & 
		$municipio!="" & $localidad!="")
	{
		//// insertar la referencia
		//$query = "INSERT INTO paleo_fcb.t_referencia (Referencia) 
				  //VALUES ('$referencia')";
		//if ($stmt = $con->prepare($query)) {
			//$stmt->execute();
		//}
		
		// **********
		// region
		// **********
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT id_region as id_region_FK
				  FROM paleo_fcb.t_region
				  WHERE region = '$region';";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_region_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_region_FK);
			}				
			$stmt->close();
		}
		
		// **********
		// pais
		// **********
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT id_pais as id_pais_FK
				  FROM paleo_fcb.t_pais
				  WHERE pais = '$pais';";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_pais_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_pais_FK);
			}				
			$stmt->close();
		}

		// **********
		// estado
		// **********
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT id_estado as id_estado_FK
				  FROM paleo_fcb.t_estado
				  WHERE estado = '$estado';";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_estado_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_estado_FK);
			}				
			$stmt->close();
		}
		

		// **********
		// municipio
		// **********


		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($municipio=="NULL" & $municipio_texto!="NULL"){
			$municipio=$municipio_texto;
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_municipio_prov) as id_municipio 
					FROM paleo_fcb.t_municipioprov";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_municipio);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_municipio);
				}				
				$stmt->close();
			}
			// insertar nueva entrada
			$id_municipio_FK = $id_municipio + 1;
			$query = "INSERT INTO paleo_fcb.t_municipioprov 
					VALUES ('$id_municipio_FK','$municipio')";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}					
		}	


		//SELECT id_municipio_prov as id_municipio_FK
		//FROM paleo_fcb.t_municipioprov
		//WHERE municipio_prov = 'cuauhtemoc'
		//GROUP BY municipio_prov
		//ORDER BY municipio_prov

		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT id_municipio_prov as id_municipio_FK
				FROM paleo_fcb.t_municipioprov
				WHERE municipio_prov = '$municipio'
				GROUP BY municipio_prov
				ORDER BY municipio_prov;";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_municipio_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_municipio_FK);
			}				
			$stmt->close();
		}
		
		// **********
		// tabla ubicacion
		// **********		

		// sacar la PK
		$query = "SELECT MAX(id_ubicacion) as id_ubicacion_PK
					FROM paleo_fcb.ubicacion;";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_ubicacion_PK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_ubicacion_PK);
			}				
			$stmt->close();
		}
		$id_ubicacion_PK = check_key($id_ubicacion_PK);
		// insertar los valores en tabla
		$query = "INSERT INTO paleo_fcb.ubicacion 
				VALUES ('$id_ubicacion_PK','$id_region_FK',
						'$id_pais_FK','$id_estado_FK',
						'$id_municipio_FK','$localidad');";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
		}
		
		// **********
		// tabla ubicacion completa
		// **********		

		// insertar los valores en tabla
		$query = "INSERT INTO paleo_fcb.ubicacion_completa 
				VALUES ('$id_region_FK',
						'$id_pais_FK',
						'$id_estado_FK',
						'$id_municipio_FK');";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
		}
		
		// **********
		// tabla hallazgo
		// **********		

		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		
		if ($tipo_accion == 'continuar_ubicacion'){
			$id_ReferenciaBibliografica_FK = $ID_REF;
		}else{
			$query = "SELECT MAX(id_ReferenciaBibliografica) 
							as id_ReferenciaBibliografica_FK
						FROM paleo_fcb.referenciabibliografica;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_ReferenciaBibliografica_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_ReferenciaBibliografica_FK);
				}				
				$stmt->close();
			}
		}
		
		// insertar los valores en tabla
		$query = "INSERT INTO paleo_fcb.hallazgo 
				VALUES ('$id_ubicacion_PK',
						'$id_ReferenciaBibliografica_FK');";
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

<!--
SELECT * FROM paleo_fcb.t_referencia
SELECT * FROM paleo_fcb.referenciabibliografica
-->


<!--
-- regresa el pais cuando se sabe la region

SELECT paleo_fcb.t_pais.pais as pais
FROM paleo_fcb.ubicacion_completa, 
	paleo_fcb.t_pais
WHERE  id_pais = paleo_fcb.ubicacion_completa.pais 
	AND paleo_fcb.ubicacion_completa.Region = '1'
GROUP BY pais
ORDER BY pais
-->


<!--
-- regresa el estado cuando se sabe el pais

SELECT paleo_fcb.t_estado.estado as estado
FROM paleo_fcb.ubicacion_completa, 
	paleo_fcb.t_estado
WHERE id_estado = paleo_fcb.ubicacion_completa.estado 
	AND paleo_fcb.ubicacion_completa.pais = '1'
GROUP BY estado
ORDER BY estado
-->


<!--
-- regresa el municipio cuando se sabe el estado

SELECT paleo_fcb.t_municipioprov.municipio_prov as municipio
FROM paleo_fcb.ubicacion_completa, 
	paleo_fcb.t_municipioprov
WHERE id_municipio_prov = Municipio_Provincia 
	AND paleo_fcb.ubicacion_completa.estado = '8'
-->

<!--
-- regresa estado y municipio

SELECT paleo_fcb.t_estado.estado as estado,
	   paleo_fcb.t_municipioprov.municipio_prov as municipio
FROM paleo_fcb.ubicacion_completa, 
	paleo_fcb.t_municipioprov,
	paleo_fcb.t_estado
WHERE id_municipio_prov = Municipio_Provincia 
	AND paleo_fcb.t_estado.id_estado = paleo_fcb.ubicacion_completa.estado
-->
