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
	if( !isset($_POST['clase']) ||
		!isset($_POST['clase_texto']) ||
		!isset($_POST['subclase']) ||
		!isset($_POST['subclase_texto']) ||
		!isset($_POST['orden_texto']) ||
		!isset($_POST['suborden']) ||
		!isset($_POST['suborden_texto']) ||
		!isset($_POST['infraorden']) ||
		!isset($_POST['infraorden_texto']) ||
		!isset($_POST['familia']) ||
		!isset($_POST['familia_texto']) ||
		!isset($_POST['subfamilia']) ||
		!isset($_POST['subfamilia_texto']) ||
		!isset($_POST['genero']) ||
		!isset($_POST['genero_texto']) ||
		!isset($_POST['especie']) ||
		!isset($_POST['especie_texto']) ||
		!isset($_POST['alojamiento']) ||
		!isset($_POST['alojamiento_texto']) ||
		!isset($_POST['clave_alojamiento_texto']) ||
		!isset($_POST['autor']) ||
		!isset($_POST['sinonimias']) ||
		!isset($_POST['taxon_valido']) ||
		!isset($_POST['nombre_espaniol']) ||
		!isset($_POST['nombre_ingles']) ||	
		!isset($_POST['actividad']) ||
		!isset($_POST['dieta_a']) ||
		!isset($_POST['dieta_b']) ||
		!isset($_POST['hab_alim_a']) ||
		!isset($_POST['hab_alim_b']) ||
		!isset($_POST['hab_refugio']) ||
		!isset($_POST['locomocion']) ||
		!isset($_POST['status'])) {
		die('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	// define el mensaje de error
	require_once 'error_message.php';


	// *****************************************************************
	// EXTRAE LOS VALORES DEL FORMULARIO
	// *****************************************************************
	
	// extrae valores del formulario
	$clase = $_POST['clase'];
	$clase_texto = $_POST['clase_texto'];
	$subclase = $_POST['subclase'];
	$subclase_texto = $_POST['subclase_texto'];
	$orden = $_POST['orden'];
	$orden_texto = $_POST['orden_texto'];
	$suborden = $_POST['suborden'];
	$suborden_texto = $_POST['suborden_texto'];
	$infraorden = $_POST['infraorden'];
	$infraorden_texto = $_POST['infraorden_texto'];
	$familia = $_POST['familia'];
	$familia_texto = $_POST['familia_texto'];
	$subfamilia = $_POST['subfamilia'];
	$subfamilia_texto = $_POST['subfamilia_texto'];
	$genero = $_POST['genero'];
	$genero_texto = $_POST['genero_texto'];
	$especie = $_POST['especie'];
	$especie_texto = $_POST['especie_texto'];
	$alojamiento = $_POST['alojamiento'];
	$alojamiento_texto = $_POST['alojamiento_texto'];
	$clave_alojamiento_texto = $_POST['clave_alojamiento_texto'];
	// pasan directo
	$autor = $_POST['autor'];
	$sinonimias = $_POST['sinonimias'];
	$taxon_valido = $_POST['taxon_valido'];
	$nombre_espaniol = $_POST['nombre_espaniol'];
	$nombre_ingles = $_POST['nombre_ingles'];
	$actividad = $_POST['actividad'];
	$dieta_a = $_POST['dieta_a'];
	$dieta_b = $_POST['dieta_b'];
	$hab_alim_a = $_POST['hab_alim_a'];
	$hab_alim_b = $_POST['hab_alim_b'];
	$hab_refugio = $_POST['hab_refugio'];
	$locomocion = $_POST['locomocion'];
	$status = $_POST['status'];

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
		

	if ($subclase=="NULL" & $subclase_texto!="NULL"){$subclase=$subclase_texto;}
	if ($suborden=="NULL" & $suborden_texto!="NULL"){$suborden=$suborden_texto;}
	if ($infraorden=="NULL" & $infraorden_texto!="NULL"){$infraorden=$infraorden_texto;}
	if ($subfamilia=="NULL" & $subfamilia_texto!="NULL"){$subfamilia=$subfamilia_texto;}
	if ($genero=="NULL" & $genero_texto!="NULL"){$genero=$genero_texto;}
	if ($especie=="NULL" & $especie_texto!="NULL"){$especie=$especie_texto;}
	
	// revisa si todos los campos han sido definidos por el usuario
	// si estan completos, realizar los inserts
	// si no estan completos (algun campo esta faltando), regresar error
	if (
		$clase!="" & $clase_texto!="" & $subclase!="" & $subclase_texto!="" &
		$orden!="" & $orden_texto!="" & $suborden!="" & $suborden_texto!="" &
		$infraorden!="" & $infraorden_texto!="" & $familia!="" & $familia_texto!="" &
		$subfamilia!="" & $subfamilia_texto!="" & $genero!="" & $genero_texto!="" &
		$especie!="" & $especie_texto!="" & $alojamiento!="" & $alojamiento_texto!="" &
		$clave_alojamiento_texto!="" & $autor!="" & $sinonimias!="" & $taxon_valido!=""	&
		$nombre_espaniol!="" & $nombre_ingles!="" & $actividad!="" & $dieta_a!=""	&	
		$dieta_b!="" & $hab_alim_a!="" & $hab_alim_b!="" & $hab_refugio!=""	&	
		$locomocion!="" & $status!=""	

		)
	{
		
		// ***********
		// clase
		// ***********		
		
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($clase=="NULL" & $clase_texto!="NULL"){
			$clase=$clase_texto;
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(\"id_Clase\") as id_clase 
					FROM t_clase";


		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_clase= $data->id_clase;
		}



		/*	if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_clase);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_clase);
				}				
				$stmt->close();
			}*/
			// insertar nueva entrada
			$id_clase_FK = check_key($id_clase);
			$query = "INSERT INTO t_clase 
					VALUES ('$id_clase_FK','$clase')";

		$result = pg_query($db,$query);
		if (!$result) {}

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
		}*/


				
		}else
		{
			// en caso de que el valor SI este en el combo box
			// sacar el FK
			$query = "SELECT id_Clase as id_clase_fk 
					FROM t_clase 
					WHERE Clase = '$clase'";


		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_clase_FK= $data->id_clase_fk;
		}	



		/*	if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_clase_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_clase_FK);
				}				
				$stmt->close();
			}*/
		}
		
		// ***********
		// orden
		// ***********		
		
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($orden=="NULL" & $orden_texto!="NULL"){
			$orden=$orden_texto;
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_Orden) as id_orden 
					FROM t_orden";

		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_orden= $data->id_orden;
		}	


		/*	if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_orden);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_orden);
				}				
				$stmt->close();
			}*/
			// insertar nueva entrada en campo alojamiento
			$id_orden_FK = check_key($id_orden);
			$query = "INSERT INTO t_orden 
								VALUES ('$id_orden_FK','$orden')";


		$result = pg_query($db,$query);
		if (!$result) {}

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
		}*/

		}else
		{
			// en caso de que el valor SI este en el combo box
			// sacar el FK
			$query = "SELECT id_Orden as id_orden_fk 
					FROM t_orden 
					WHERE Orden = '$orden'";

		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_orden_FK= $data->id_orden_fk;
		}




			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_orden_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_orden_FK);
				}				
				$stmt->close();
			}*/
		}
		
		// ***********
		// familia
		// ***********		
		
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($familia=="NULL" & $familia_texto!="NULL"){
			$familia=$familia_texto;
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_Familia) as id_familia 
					FROM t_familia";
		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_familia= $data->id_familia;
		}




			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_familia);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_familia);
				}				
				$stmt->close();
			}*/
			// insertar nueva entrada en campo alojamiento
			$id_familia_FK = check_key($id_familia);
			$query = "INSERT INTO t_familia 
					VALUES ('$id_familia_FK','$familia')";

					$result = pg_query($db,$query);
		if (!$result) {}

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
		}*/

					
		}else
		{
			// en caso de que el valor SI este en el combo box
			// sacar el FK
			$query = "SELECT id_Familia as id_familia_fk 
					FROM t_familia 
					WHERE Familia = '$familia'";


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
		}
				
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
			$query = "SELECT MAX(\"id_Alojamiento\") as id_alojamiento 
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
		if (!$result) {}

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
		}*/	
		}
		// extraer la FK
		$query = "SELECT \"id_Alojamiento\" as id_alojamiento_fk 
				FROM t_alojamiento 
				WHERE \"Alojamiento\" = '$alojamiento'";

				$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_alojamiento_FK= $data->id_alojamiento_fk;
		}



		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_alojamiento_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_alojamiento_FK);
			}				
			$stmt->close();
		}*/
			
		// ***********
		// actividad
		// ***********
		// extraer la FK
		$query = "SELECT \"id_Actividad\" as id_actividad_fk 
				FROM t_actividad 
				WHERE \"Actividad\" = '$actividad'";

		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_actividad_FK= $data->id_actividad_fk;
		}

				
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_actividad_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_actividad_FK);
			}				
			$stmt->close();
		}*/
		
		// ***********
		// dieta A
		// ***********
		// extraer la FK
		$query = "SELECT \"id_Dieta_A\" as id_dieta_a_fk 
				FROM t_dietaa 
				WHERE \"Dieta_A\" = '$dieta_a'";

		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_dieta_a_FK= $data->id_dieta_a_fk;
		}


	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_dieta_a_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_dieta_a_FK);
			}				
			$stmt->close();
		}*/
		
		// ***********
		// dieta B
		// ***********
		// extraer la FK
		$query = "SELECT \"id_Dieta_B\" as id_dieta_b_fk
				FROM t_dietab 
				WHERE Dieta_B = '$dieta_b'";

		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_dieta_b_FK= $data->id_dieta_b_fk;
		}



		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_dieta_b_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_dieta_b_FK);
			}				
			$stmt->close();
		}*/
		
		// ***********
		// Habito alimenticio A:
		// ***********
		// extraer la FK
		$query = "SELECT \"id_Hab_Alim_A\" as id_hab_alim_a_fk 
				FROM t_habalima
				WHERE \"Hab_Alim_A\"  = '$hab_alim_a'";

		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_hab_alim_a_FK= $data->id_hab_alim_a_fk;
		}


		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_hab_alim_a_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_hab_alim_a_FK);
			}				
			$stmt->close();
		}*/
		
		// ***********
		// Habito alimenticio B:
		// ***********
		// extraer la FK
		$query = "SELECT \"id_Hab_Alim_B\" as id_hab_alim_b_fk 
				FROM t_habalimb
				WHERE \"Hab_Alim_B\"  = '$hab_alim_b'";


		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_hab_alim_b_FK= $data->id_hab_alim_b_fk;
		}



	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_hab_alim_b_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_hab_alim_b_FK);
			}				
			$stmt->close();
		}*/
				
		// ***********
		// Habitat refugio
		// ***********
		// extraer la FK
		$query = "SELECT \"id_Hab_Refugio\" as id_hab_refugio_fk
				FROM t_habrefugio
				WHERE \"Hab_Refugio\" = '$hab_refugio'";


				$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_hab_refugio_FK= $data->id_hab_refugio_fk;
		}



	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_hab_refugio_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_hab_refugio_FK);
			}				
			$stmt->close();
		}*/
		
		// ***********
		// Locomocion
		// ***********
		// extraer la FK
		$query = "SELECT \"id_Locomocion\" as id_locomocion_fk
				FROM t_locomocion
				WHERE \"Locomocion\" = '$locomocion'";


				$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_locomocion_FK= $data->id_locomocion_fk;
		}



		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_locomocion_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_locomocion_FK);
			}				
			$stmt->close();
		}*/

		// ***********
		// Status
		// ***********
		// extraer la FK
		$query = "SELECT \"id_Status\" as id_status_fk
				FROM t_status
				WHERE Status = '$status'";


				$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_status_FK= $data->id_status_fk;
		}


	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_status_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_status_FK);
			}				
			$stmt->close();
		}*/
		
		// ***********
		// Especies
		// ***********		
		// extrae el ultimo valor del ID en tabla especies
		$query = "SELECT MAX(\"id_Especies\") as id_especies_pk 
				 FROM especies;";


				$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_especies_PK= $data->id_especies_pk;
		}



	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_especies_PK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_especies_PK);
			}				
			$stmt->close();
		}*/
		// sumar uno
		$id_especies_PK = check_key($id_especies_PK);
		
		// INSERTA LOS VALORES
		$query = "INSERT INTO especies 
					VALUES ('$id_especies_PK','$subclase','$suborden','$infraorden',
						'$subfamilia','$genero','$especie','$autor','$sinonimias',
						'$taxon_valido','$nombre_espaniol','$nombre_ingles',
						'$id_actividad_FK','$id_alojamiento_FK','$id_clase_FK',$id_dieta_a_FK,
						'$id_dieta_b_FK','$id_hab_alim_a_FK','$id_hab_alim_b_FK',
						'$id_familia_FK','$id_hab_refugio_FK','$id_locomocion_FK',
						'$id_orden_FK','$id_status_FK');";	
		$result = pg_query($db,$query);
		if (!$result) {}

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
		}*/
		
		
		// ***********
		// TABLA unidadespecie
		// ***********		
		// extrae el ultimo valor del ID en tabla especies
		$query = "SELECT MAX(\"id_UnidadAnalisis\") 
				as id_unidad_analisis_FK 
				FROM unidadanalisis;";

		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_unidad_analisis_FK= $data->id_UnidadAnalisis;
		}	

				
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_unidad_analisis_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_unidad_analisis_FK);
			}				
			$stmt->close();
		}	*/	
				
		// INSERTA LOS VALORES
		$query = "INSERT INTO unidadespecie 
					VALUES ('$id_especies_PK','$id_unidad_analisis_FK');";

			$result = pg_query($db,$query);
		if (!$result) {}


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

