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
	if( !isset($_POST['autor']) ||
		!isset($_POST['sinonimias']) ||
		!isset($_POST['taxon_valido']) ||
		!isset($_POST['nombre_espaniol']) ||
		!isset($_POST['nombre_ingles']) ||	
		!isset($_POST['actividad']) ||
		!isset($_POST['dieta_a']) ||
		!isset($_POST['dieta_a_texto']) ||
		!isset($_POST['dieta_a_clave']) ||					
		!isset($_POST['dieta_b']) ||
		!isset($_POST['dieta_b_texto']) ||	
		!isset($_POST['dieta_b_clave']) ||									
		!isset($_POST['hab_alim_a']) ||
		!isset($_POST['hab_alim_a_texto']) ||
		!isset($_POST['hab_alim_a_clave']) ||						
		!isset($_POST['hab_alim_b']) ||
		!isset($_POST['hab_alim_b_texto']) ||
		!isset($_POST['hab_alim_b_clave']) ||			
		!isset($_POST['hab_refugio']) ||
		!isset($_POST['hab_refugio_texto']) ||	
		!isset($_POST['hab_refugio_clave']) ||					
		!isset($_POST['locomocion']) ||
		!isset($_POST['locomocion_texto']) ||
		!isset($_POST['locomocion_clave']) ||					
		!isset($_POST['status'])) {
		died('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	// define el mensaje de error
	require_once 'error_message.php';


	// *****************************************************************
	// EXTRAE LOS VALORES DEL FORMULARIO
	// *****************************************************************

	// extrae valores del formulario
		// clase
		$id_clase_FK = $_POST['id_clase_FK'];
		$subclase = $_POST['subclase'];
		// orden
		$id_orden_FK = $_POST['id_orden_FK'];
		$suborden = $_POST['suborden'];
		$infraorden = $_POST['infraorden'];	
		// familia
		$id_familia_FK = $_POST['id_familia_FK'];
		$subfamilia = $_POST['subfamilia'];
		// Genero
		$genero = $_POST['genero'];
		// especie
		$especie = $_POST['especie'];
		// pasan directo
		$autor = $_POST['autor'];
		$sinonimias = $_POST['sinonimias'];
		$taxon_valido = $_POST['taxon_valido'];
		$nombre_espaniol = $_POST['nombre_espaniol'];
		$nombre_ingles = $_POST['nombre_ingles'];
		$actividad = $_POST['actividad'];
		$status = $_POST['status'];		
		// tienen opcion texto
		// id
		$dieta_a = $_POST['dieta_a'];
		$dieta_b = $_POST['dieta_b'];
		$hab_alim_a = $_POST['hab_alim_a'];
		$hab_alim_b = $_POST['hab_alim_b'];
		$hab_refugio = $_POST['hab_refugio'];
		$locomocion = $_POST['locomocion'];	
		// texto
		$dieta_a_texto = $_POST['dieta_a_texto'];
		$dieta_b_texto = $_POST['dieta_b_texto'];
		$hab_alim_a_texto = $_POST['hab_alim_a_texto'];
		$hab_alim_b_texto = $_POST['hab_alim_b_texto'];
		$hab_refugio_texto = $_POST['hab_refugio_texto'];
		$locomocion_texto = $_POST['locomocion_texto'];	
		// clave
		$dieta_a_clave = $_POST['dieta_a_clave'];
		$dieta_b_clave = $_POST['dieta_b_clave'];
		$hab_alim_a_clave = $_POST['hab_alim_a_clave'];
		$hab_alim_b_clave = $_POST['hab_alim_b_clave'];
		$hab_refugio_clave = $_POST['hab_refugio_clave'];
		$locomocion_clave = $_POST['locomocion_clave'];	
					
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
		$autor!="" & $sinonimias!="" & $taxon_valido!=""	&
		$nombre_espaniol!="" & $nombre_ingles!="" & $actividad!="" & $dieta_a!=""	&	
		$dieta_b!="" & $hab_alim_a!="" & $hab_alim_b!="" & $hab_refugio!=""	&	
		$locomocion!="" & $status!=""
		)
	{
		// ***********
		// actividad
		// ***********
		// extraer la FK
		$query = "SELECT id_Actividad as id_actividad_FK 
				FROM paleo_fcb.t_actividad 
				WHERE Actividad = '$actividad'";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_actividad_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_actividad_FK);
			}				
			$stmt->close();
		}
		
		// ***********
		// dieta A
		// ***********
		
		// revisa si se tiene que hacer un insert en 
		// la tabla con un nuevo registro
		if ($dieta_a=="NULL" & $dieta_a_clave!="NULL" & $dieta_a_texto!="NULL")
		{
			// extrae el ultimo valor del ID en tabla
			$query = "SELECT MAX(id_Dieta_A) as id_dieta_a_FK 
						FROM paleo_fcb.t_dietaa;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_dieta_a_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_dieta_a_FK);
				}				
				$stmt->close();
			}
			// suma uno al max key
			$id_dieta_a_FK = check_key($id_dieta_a_FK);
			// INSERTA LOS VALORES
			$query = "INSERT INTO paleo_fcb.t_dietaa 
						VALUES ('$id_dieta_a_FK','$dieta_a_clave','$dieta_a_texto');";	
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}
		// si la opcion ya venia en el combobox
		}else{
			// extraer la FK
			$query = "SELECT id_Dieta_A as id_dieta_a_FK 
					FROM paleo_fcb.t_dietaa 
					WHERE Dieta_A = '$dieta_a'";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_dieta_a_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_dieta_a_FK);
				}				
				$stmt->close();
			}
		}
		
		// ***********
		// dieta B
		// ***********
		// revisa si se tiene que hacer un insert en 
		// la tabla con un nuevo registro
		if ($dieta_b=="NULL" & $dieta_b_clave!="NULL" & $dieta_b_texto!="NULL")
		{
			// extrae el ultimo valor del ID en tabla
			$query = "SELECT MAX(id_dieta_b) as id_dieta_b_FK 
						FROM paleo_fcb.t_dietab;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_dieta_b_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_dieta_b_FK);
				}				
				$stmt->close();
			}
			// suma uno al max key
			$id_dieta_b_FK = check_key($id_dieta_b_FK);
			// INSERTA LOS VALORES
			$query = "INSERT INTO paleo_fcb.t_dietab 
						VALUES ('$id_dieta_b_FK','$dieta_b_clave','$dieta_b_texto');";	
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}
		// si la opcion ya venia en el combobox
		}else{
			// extraer la FK
			$query = "SELECT id_dieta_b as id_dieta_b_FK 
					FROM paleo_fcb.t_dietab 
					WHERE dieta_b = '$dieta_b'";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_dieta_b_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_dieta_b_FK);
				}				
				$stmt->close();
			}
		}

		// ***********
		// Habito alimenticio A:
		// ***********
		
		// revisa si se tiene que hacer un insert en 
		// la tabla con un nuevo registro
		if ($hab_alim_a=="NULL" & $hab_alim_a_clave!="NULL" & $hab_alim_a_texto!="NULL")
		{
			// extrae el ultimo valor del ID en tabla
			$query = "SELECT MAX(id_Hab_Alim_A) as id_hab_alim_a_FK 
						FROM paleo_fcb.t_habalima;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_hab_alim_a_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_hab_alim_a_FK);
				}				
				$stmt->close();
			}
			// suma uno al max key
			$id_hab_alim_a_FK = check_key($id_hab_alim_a_FK);
			// INSERTA LOS VALORES
			$query = "INSERT INTO paleo_fcb.t_habalima 
						VALUES ('$id_hab_alim_a_FK','$hab_alim_a_clave','$hab_alim_a_texto');";	
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}
		// si la opcion ya venia en el combobox		
		}else{		
			// extraer la FK
			$query = "SELECT id_Hab_Alim_A as id_hab_alim_a_FK 
					FROM paleo_fcb.t_habalima
					WHERE Hab_Alim_A  = '$hab_alim_a'";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_hab_alim_a_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_hab_alim_a_FK);
				}				
				$stmt->close();
			}
		}
		
		// ***********
		// Habito alimenticio B:
		// ***********
		
		// revisa si se tiene que hacer un insert en 
		// la tabla con un nuevo registro
		if ($hab_alim_b=="NULL" & $hab_alim_b_clave!="NULL" & $hab_alim_b_texto!="NULL")
		{
			// extrae el ultimo valor del ID en tabla
			$query = "SELECT MAX(id_hab_alim_b) as id_hab_alim_b_FK 
						FROM paleo_fcb.t_habalimb;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_hab_alim_b_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_hab_alim_b_FK);
				}				
				$stmt->close();
			}
			// suma uno al max key
			$id_hab_alim_b_FK = check_key($id_hab_alim_b_FK);
			// INSERTA LOS VALORES
			$query = "INSERT INTO paleo_fcb.t_habalimb 
						VALUES ('$id_hab_alim_b_FK','$hab_alim_b_clave','$hab_alim_b_texto');";	
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}
		// si la opcion ya venia en el combobox		
		}else{
			// extraer la FK
			$query = "SELECT id_Hab_Alim_B as id_hab_alim_b_FK 
					FROM paleo_fcb.t_habalimb
					WHERE Hab_Alim_B  = '$hab_alim_b'";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_hab_alim_b_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_hab_alim_b_FK);
				}				
				$stmt->close();
			}
		}
				
		// ***********
		// Habitat refugio
		// ***********
		
		// revisa si se tiene que hacer un insert en 
		// la tabla con un nuevo registro
		if ($hab_refugio=="NULL" & $hab_refugio_clave!="NULL" & $hab_refugio_texto!="NULL")
		{
			// extrae el ultimo valor del ID en tabla
			$query = "SELECT MAX(id_Hab_Refugio) as id_hab_refugio_FK 
						FROM paleo_fcb.t_habrefugio;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_hab_refugio_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_hab_refugio_FK);
				}				
				$stmt->close();
			}
			// suma uno al max key
			$id_hab_refugio_FK = check_key($id_hab_refugio_FK);
			// INSERTA LOS VALORES
			$query = "INSERT INTO paleo_fcb.t_habrefugio 
						VALUES ('$id_hab_refugio_FK','$hab_refugio_clave','$hab_refugio_texto');";	
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}
		// si la opcion ya venia en el combobox		
		}else{
			// extraer la FK
			$query = "SELECT id_Hab_Refugio as id_hab_refugio_FK
					FROM paleo_fcb.t_habrefugio
					WHERE Hab_Refugio = '$hab_refugio'";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_hab_refugio_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_hab_refugio_FK);
				}				
				$stmt->close();
			}
		}
		
		// ***********
		// Locomocion
		// ***********
		
		// revisa si se tiene que hacer un insert en 
		// la tabla con un nuevo registro
		if ($locomocion=="NULL" & $locomocion_clave!="NULL" & $locomocion_texto!="NULL")
		{
			// extrae el ultimo valor del ID en tabla
			$query = "SELECT MAX(id_locomocion) as id_locomocion_FK 
						FROM paleo_fcb.t_locomocion;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_locomocion_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_locomocion_FK);
				}				
				$stmt->close();
			}
			// suma uno al max key
			$id_locomocion_FK = check_key($id_locomocion_FK);
			// INSERTA LOS VALORES
			$query = "INSERT INTO paleo_fcb.t_locomocion 
						VALUES ('$id_locomocion_FK','$locomocion_clave','$locomocion_texto');";	
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}
		// si la opcion ya venia en el combobox		
		}else{		
			// extraer la FK
			$query = "SELECT id_Locomocion as id_locomocion_FK
					FROM paleo_fcb.t_locomocion
					WHERE Locomocion = '$locomocion'";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_locomocion_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_locomocion_FK);
				}				
				$stmt->close();
			}
		}

		// ***********
		// Status
		// ***********
		// extraer la FK
		$query = "SELECT id_Status as id_status_FK
				FROM paleo_fcb.t_status
				WHERE Status = '$status'";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_status_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_status_FK);
			}				
			$stmt->close();
		}

		// ***********
		// Especies
		// ***********		
		// extrae el ultimo valor del ID en tabla especies
		$query = "SELECT MAX(id_Especies) as id_especies_PK 
				 FROM paleo_fcb.especies;";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_especies_PK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_especies_PK);
			}				
			$stmt->close();
		}
		// sumar uno
		$id_especies_PK = check_key($id_especies_PK);
		
		// INSERTA LOS VALORES
		$query = "INSERT INTO paleo_fcb.especies 
					VALUES ('$id_especies_PK','$subclase','$suborden','$infraorden',
						'$subfamilia','$genero','$especie','$autor','$sinonimias',
						'$taxon_valido','$nombre_espaniol','$nombre_ingles',
						'$id_actividad_FK','$id_clase_FK',$id_dieta_a_FK,
						'$id_dieta_b_FK','$id_hab_alim_a_FK','$id_hab_alim_b_FK',
						'$id_familia_FK','$id_hab_refugio_FK','$id_locomocion_FK',
						'$id_orden_FK','$id_status_FK');";	
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
		}
		
		// ***********
		// TABLA unidadespecie
		// ***********		
		// extrae el ultimo valor del ID en tabla especies
		$query = "SELECT MAX(id_UnidadAnalisis) 
				as id_unidad_analisis_FK 
				FROM paleo_fcb.unidadanalisis;";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_unidad_analisis_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_unidad_analisis_FK);
			}				
			$stmt->close();
		}		
				
		// INSERTA LOS VALORES
		$query = "INSERT INTO paleo_fcb.unidadespecie 
					VALUES ('$id_especies_PK','$id_unidad_analisis_FK');";	
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
		}
		
		// imprimir mensaje de salida 
		echo "<br>";
		// echo 'Transacci&oacute;n completa con &eacute;xito.';
		
		//echo $id_especies_PK;
	
	}else
	{
		echo "<br>";
		echo $error_message;
	}
	
 echo '<tr><td> <input type="hidden" name="id_Especies" value = "$id_especies_PK" </td></tr>';
	
?>


