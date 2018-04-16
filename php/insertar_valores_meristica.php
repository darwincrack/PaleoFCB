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
	if( !isset($_POST['clave_medida']) ||
		!isset($_POST['descripcion_medida']) ||
		!isset($_POST['medida']) ||
		!isset($_POST['unidades']) ||	
		!isset($_POST['id_especies']) ||	
		!isset($_POST['notas_meristica'])) {
		die('We are sorry, but there appears to be a 
				problem with the form you submitted.');		
	}
	// define el mensaje de error
	require_once 'error_message.php';
	
	
	if(!isset($_POST['tipo_operacion'])) {
		die('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_operacion = $_POST['tipo_operacion'];
			
	

	// *****************************************************************
	// *****************************************************************
	// *****************************************************************
	// INSERCION DE VALORES EN LA BASE DE DATOS
	// *****************************************************************
	// *****************************************************************
	// *****************************************************************
	
	// extrae valores del formulario
	$clave_medida = $_POST['clave_medida'];
	$descripcion_medida = $_POST['descripcion_medida'];
	$medida = $_POST['medida'];
	$unidades = $_POST['unidades'];
	$notas_meristica = $_POST['notas_meristica'];
	$id_Especies = $_POST['id_especies'];
	
	//echo $id_Especies;
	
	// revisa si todos los campos han sido definidos por el usuario
	// si estan completos, realizar los inserts
	// si no estan completos (algun campo esta faltando), regresar error
	if ($clave_medida!="" & $descripcion_medida!="" & 
		$medida!="" & $unidades!="" & 
		$notas_meristica!="")
	{
		
		// ***********
		// id_meristica_FK
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT MAX(\"id_Meristica\") 
					as id_meristica_fk 
				FROM meristica;";


		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_meristica_FK= $data->id_meristica_fk;
		}



		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_meristica_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_meristica_FK);
			}				
			$stmt->close();
		}*/
		// suma 1
		$id_meristica_FK = check_key($id_meristica_FK);
		
		// ***********
		// id_materiales_catalogo_FK
		// ***********	
		
		// extrae la llave de la ultima insercion que sera la FK
		// de la tabla de referencias
		$query = "SELECT MAX(\"id_MaterialesCatalogo\") 
					as id_materiales_catalogo_fk 
				FROM materialescatalogo;";


		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_materiales_catalogo_FK= $data->id_materiales_catalogo_fk;
		}
		

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_materiales_catalogo_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_materiales_catalogo_FK);
			}				
			$stmt->close();
		}*/

		// ********************		
		// insertar los valores
		// ********************
								
		$query = "INSERT INTO meristica 
				VALUES ('$id_meristica_FK',
						'$id_materiales_catalogo_FK',
						'$clave_medida',
						'$descripcion_medida',
						'$medida',
						'$unidades',						
						'$notas_meristica');";

				$result = pg_query($db,$query);
		if (!$result) {
			echo "<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>";
		}
		

	/*	if ($stmt = $con->prepare($query)) {
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
	
	
	if(!isset($_POST['tipo_accion'])) {
		died('We are sorry, but there appears to be a 
		problem with the form you submitted.');		
	}
	$tipo_accion = $_POST['tipo_accion'];
	//echo $tipo_accion;
?>
	
	
<tr><td> <input type="hidden" name="id_especies" value="<?= $id_Especies ?>" ></td></tr>
<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>

<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

<center>
	<IMG SRC="images/banner_2.jpg" ALT="banner" WIDTH=1267 HEIGHT=712> 
	<h2>Transacci&oacute;n de datos terminada con &eacute;xito</h2>
	
	
	<!-- **************
	tipo_edad
	****************-->
	<br>
	<br>

<?php if ($tipo_operacion == 'continuar_sitio') { ?>

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
			<option value="otra_matcat">Dar de alta otra material Cat&aacute;logo</option>
		 </select> </td>
	</tr>	

<?php } elseif ($tipo_operacion == 'continuar_ubicacion') { ?>

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
			<option value="otra_matcat">Dar de alta otra material Cat&aacute;logo</option>
		 </select> </td>
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
			<option value="otra_local">Dar de alta otra localidad</option>		 
		    <option value="otro_sitio">Dar de alta otro sitio</option>		 
			<option value="otra_ua">Dar de alta otra unidad de an&aacute;lisis</option>
			<option value="otra_esp">Dar de alta otra especie</option>
			<option value="otra_matcat">Dar de alta otra material Cat&aacute;logo</option>
		 </select> </td>
	</tr>	



<?php }  ?>


	
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
		<a href="http://127.0.0.1/paleoFCB/php/forma_captura_especies_existente.php">
			Capturar otra especie</a>
	 </td>
	</tr>
-->
	<!-- INSERTAR OTRO MATERIAL CATALOGO 
	 <td colspan="2" style="text-align:center">
		<br>
		<a href="http://127.0.0.1/paleoFCB/php/forma_captura_nuevo_material_catalogo.php">
			Capturar otro material cat&aacute;logo</a>
	 </td>
	</tr>	
-->	
</center>
