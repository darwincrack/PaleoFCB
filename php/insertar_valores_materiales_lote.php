<form name="Captura de datos" method="post" action="bifurcacion_opciones_al_finalizar.php">

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
	if( !isset($_POST['lote']) ||
		!isset($_POST['alojamiento']) ||
		!isset($_POST['alojamiento_texto']) ||
		!isset($_POST['clave_alojamiento_texto']) ||
		!isset($_POST['materiales_lote_descripcion'])) {
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
	$lote = $_POST['lote'];
	$materiales_lote_descripcion = $_POST['materiales_lote_descripcion'];
	$alojamiento = $_POST['alojamiento'];
	$alojamiento_texto = $_POST['alojamiento_texto'];
	$clave_alojamiento_texto = $_POST['clave_alojamiento_texto'];
	
	if(!isset($_POST['tipo_operacion'])) {
		die('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_operacion = $_POST['tipo_operacion'];

	//echo $tipo_operacion;
			
	// revisa si todos los campos han sido definidos por el usuario
	// si estan completos, realizar los inserts
	// si no estan completos (algun campo esta faltando), regresar error
	if ($lote!="" & $materiales_lote_descripcion!="" &
		$alojamiento!="" & $alojamiento_texto!="" &
		$clave_alojamiento_texto!="")
	{
		
		// ***********
		// materiales_lote
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT MAX(\"id_MaterialesLote\") as id_materiales_lote_fk
				FROM materialeslote;";

				$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_materiales_lote_FK= $data->id_materiales_lote_fk;
		}



	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_materiales_lote_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_materiales_lote_FK);
			}				
			$stmt->close();
		}*/
		// revisa la llave
		$id_materiales_lote_FK = check_key($id_materiales_lote_FK);


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
		if (!$result) {
			echo "<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>";
		}


			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}		*/
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
		// id_especies_FK
		// ***********	

		if(!isset($_POST['tipo_accion'])) {
			die('We are sorry, but there appears to be a problem with the form you submitted.');		
		}
		$tipo_accion = $_POST['tipo_accion'];
		
		
		if ($tipo_accion =='nueva_especie')
		{		
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_Especies) 
						as id_especies_fk 
					FROM especies;";

		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_especies_FK= $data->id_especies_fk;
		}	

			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_especies_FK);
				while ($stmt->fetch()) {
					 //printf("%s\n", $id_especies_FK);
				}				
				$stmt->close();
			}*/
		}else
		{
			// option 2
			// extrae valores del formulario
			$id_especies_FK = $_POST['id_especies'];
			
		}

		// ********************		
		// insertar los valores
		// ********************
								
		$query = "INSERT INTO materialeslote 
				VALUES ('$id_materiales_lote_FK',
						'$lote',
						'$materiales_lote_descripcion',
						'$id_especies_FK',
						'$id_alojamiento_FK');";

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

<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>

<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

<center>
	<IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> 
	<h2>Transacci&oacute;n de datos terminada con &eacute;xito</h2>

	
	<!-- **************
	tipo_edad
	****************-->
	<br>
	<br>
<?php if ($tipo_operacion=='continuar_sitio' ) {?>
	
	<tr>
		 <td valign="top">
			<label for="tipo_edad">
				  <b>1.</b> Seleccionar Acci&oacute;n: 
			</label>
		 </td>
	 
		<td valign="top"> 
			<select name="tipo_accion"> 	 
				  <option value="otra_ua">Dar de alta otra unidad de an&aacute;lisis</option>
				  <option value="otra_esp">Dar de alta otra especie</option>
			</select>
		</td>
	</tr>
	

<?php } elseif ($tipo_operacion =='continuar_ubicacion') { ?>
	<tr>
		 <td valign="top">
			<label for="tipo_edad">
				  <b>1.</b> Seleccionar Acci&oacute;n: 
			</label>
		 </td>
	 
		<td valign="top"> 
			<select name="tipo_accion"> 
				  <option value="otro_sitio">Dar de alta otro sitio</option>		 
				  <option value="otra_ua">Dar de alta otra unidad de an&aacute;lisis</option>
				  <option value="otra_esp">Dar de alta otra especie</option>
			</select>
		</td>
	</tr>


<?php } else { ?>
	
	<tr>
		 <td valign="top">
			<label for="tipo_edad">
				  <b>1.</b> Seleccionar Acci&oacute;n: 
			</label>
		 </td>
	 
		<td valign="top"> 
			<select name="tipo_accion">
				  <option value="otro_local">Dar de alta otra localidad</option>		 
				  <option value="otro_sitio">Dar de alta otro sitio</option>		 
				  <option value="otra_ua">Dar de alta otra unidad de an&aacute;lisis</option>
				  <option value="otra_esp">Dar de alta otra especie</option>
<!--
				  <option value="otra_matcat">Dar de alta otra material Cat&aacute;logo</option>
-->
			</select>
		</td>
	</tr>




<?php }; ?>
	
	
<!--	 MENU PRINCIPAL -->
	<tr>
	 <td colspan="2" style="text-align:center">
		<br>
		<br>
		<input type="submit" value="Continuar">  <input type="reset" value="Borrar campos">
		<br>
		<br>
		<a href="http://127.0.0.1/paleoFCB/inicio.php"> Volver a la p&aacute;gina principal</a>
	 </td>
	</tr>
</center>
	
	
	<!-- MENU PRINCIPAL 
	<tr>
	 <td colspan="2" style="text-align:center">
		<br>
		<a href="http://127.0.0.1/paleoFCB/inicio.html">
			Volver a la p&aacute;gina principal</a>
	 </td>
	</tr>
	-->
	<!-- INSERTAR OTRO SITIO 
	 <td colspan="2" style="text-align:center">
		<br>
		<a href="http://127.0.0.1/paleoFCB/php/forma_captura_nuevo_sitio.php">
			Capturar otro sitio</a>
	 </td>
	</tr>	
	-->
	<!-- INSERTAR OTRA UNIDAD DE ANALISIS 
	 <td colspan="2" style="text-align:center">
		<br>
		<a href="http://127.0.0.1/paleoFCB/php/forma_captura_nueva_unidad_analisis.php">
			Capturar otra unidad de an&aacute;lisis</a>
	 </td>
	</tr>	
	</tr>	
	-->
	<!-- INSERTAR OTRA ESPECIE 
	 <td colspan="2" style="text-align:center">
		<br>
		<a href="http://127.0.0.1/paleoFCB/php/forma_captura_nueva_especie.php">
			Capturar otra especie</a>
	 </td>
	</tr>
	
</center>
-->



