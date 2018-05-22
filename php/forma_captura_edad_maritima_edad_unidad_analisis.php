<?php include("post_data_informacion.php"); ?>
<form name="Captura de datos" method="post" action="forma_captura_especies_existente.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->
<table width="600px">

<!--********************************************************************
CONECTARSE A LA BASE DE DATOS
*********************************************************************-->
	<?php
		// connect to database
		require_once 'dbconfig.php';
		// check connection

				$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

	 	$db = pg_connect($conn_string);
	    if(!$db){
	        $errormessage=pg_last_error();
	        echo "Error : " . $errormessage;
	        exit();
	    }	
		/*$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
			or die ('Could not connect to the database server' . mysqli_connect_error());*/
	    	include("guardar_ubicacion_actual.php");
	?>
		<input type="hidden" name="referencia" value="<?= $referencia ?>" >
<!--********************************************************************
DESPLIEGUE DE INSTRUCCIONES
*********************************************************************-->
	<?php
		require_once 'desplegar_id.php';
		require_once 'desplegar_contador.php';				
		require_once 'instrucciones.php';
		require_once 'instrucciones_nota_2.php';
		// *****************************************************************
		// CARGAR FUNCIONES
		// *****************************************************************
		include("functions_lib.php");			
	?>
<!--********************************************************************
EXTRAE VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php
	// extrae valores del formulario
		// edad
		$tipo_edad = $_POST['tipo_edad'];
		// region
		// $id_region_FK = $_POST['id_region_FK'];
		// era
		$id_era_FK = $_POST['id_era_FK'];
		// periodo
		$id_periodo_FK = $_POST['id_periodo_FK'];
		// epoca
		$id_epoca_FK = $_POST['id_epoca_FK'];
		// edad
		$id_edad_FK = $_POST['id_edad_FK'];
		$edad_texto = $_POST['edad_texto'];		
		
		// VALIDA LLAVE
		if($id_edad_FK=='NULL' & $edad_texto=='NULL')
		{
			// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
			$query = "SELECT id_edades_marinas as llave
					  FROM t_edadesmarinas
					  WHERE edad = 'No Disponible';";
					$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_edad_FK= $data->llave;
		}


			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($llave);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_ubicacion_FK);
				}				
				$stmt->close();
			}
			$id_edad_FK=$llave;	*/
		}	

		if(!isset($_POST['tipo_operacion'])) {
			die('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		$tipo_operacion = $_POST['tipo_operacion'];
		
	?>

<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>
	
<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>CAPTURE LA EDAD MAR&Iacute;TIMA</h2>
	<!--**************************************-->

	<!-- **************
	tipo_edad
	****************-->
	<br>
	<br>
	<tr>
	 <td valign="top">
		<label for="tipo_edad">
			  <b>i.</b> Edad seleccionada: 
		</label>
	 </td>
	 <td valign="top"> 
	 <select name="tipo_edad">
	  <option value="edad_maritima">Edad Mar&iacute;tima</option>		 
	 </select> </td>
	</tr>	

	<br><br>


	<!-- **************
	era
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>1.</b> Era: ';
		// define la variable
		$variable_name = 'id_era_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT 
						t_era.id_era as id_era_fk,
						t_era.era as era
					FROM 
						t_era
					WHERE 
						id_era = $id_era_FK;";

		 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->era!="" & $data->era!="NULL")
			{
				echo "<option value = '".$data->id_era_fk."'>".$data->era."</option>"; 
			}	
		}	
		echo "</select>"; 


	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_era_FK,$era);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($era!="" & $era!="NULL")
				 {
				echo "<option value = '".$id_era_FK."'>".$era.''."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} */
	?>	
	
	<br><br>


	<!-- **************
	Periodo
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>2.</b> Periodo: ';
		// define la variable
		$variable_name = 'id_periodo_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT 
						t_periodo.id_periodo as id_periodo_fk,
						t_periodo.periodo as periodo
					FROM 
						t_periodo
					WHERE 
						id_periodo = $id_periodo_FK;";
				 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->periodo!="" & $data->periodo!="NULL")
			{
				echo "<option value = '".$data->id_periodo_fk."'>".$data->periodo."</option>"; 
			}	
		}	
		echo "</select>"; 


		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_periodo_FK,$periodo);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($periodo!="" & $periodo!="NULL")
				 {
				echo "<option value = '".$id_periodo_FK."'>".$periodo.''."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} */
	?>		

	<br><br>


	<!-- **************
	Epoca
	****************-->

	<?php
		// revisa si se tiene que hacer un insert en 
		// la tabla con un nuevo registro
//		if ($id_epoca_FK=="NULL" & $epoca_texto!="NULL")
//		{
//			// extrae el ultimo valor del ID en tabla
//			$query = "SELECT MAX(id_epoca) as id_epoca_FK 
//						FROM paleo_fcb.t_epoca;";
//			if ($stmt = $con->prepare($query)) {
//				$stmt->execute();
//				$stmt->bind_result($id_epoca_FK);
//				while ($stmt->fetch()) {
//					// printf("%s\n", $id_epoca_FK);
//				}				
//				$stmt->close();
//			}
//			// suma uno al max key
//			$id_epoca_FK = check_key($id_epoca_FK);
//			// INSERTA LOS VALORES
//			$query = "INSERT INTO paleo_fcb.t_epoca 
//						VALUES ('$id_epoca_FK','$epoca_texto');";	
//			if ($stmt = $con->prepare($query)) {
//				$stmt->execute();
//			}
//		}
		// nombre que se imprime en html
		$nombre_combo_box = '<b>3.</b> &Eacute;poca: ';
		// define la variable
		$variable_name = 'id_epoca_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT 
						t_epoca.id_epoca as id_epoca_fk,
						t_epoca.epoca as epoca
					FROM 
						t_epoca
					WHERE 
						id_epoca = $id_epoca_FK;";

				 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->epoca!="" & $data->epoca!="NULL")
			{
				echo "<option value = '".$data->id_epoca_fk."'>".$data->epoca."</option>"; 
			}	
		}	
		echo "</select>"; 



	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_epoca_FK,$epoca);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($epoca!="" & $epoca!="NULL")
				 {
				echo "<option value = '".$id_epoca_FK."'>".$epoca.''."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} */
	?>	


	<br><br>




	<!-- **************
	edad
	****************-->

	<?php
		// revisa si se tiene que hacer un insert en 
		// la tabla con un nuevo registro
		if ($id_edad_FK=="NULL" & $edad_texto!="NULL")
		{
			// extrae el ultimo valor del ID en tabla
			$query = "SELECT MAX(id_edad) as id_edad_fk 
						FROM t_edad;";

			$qu = @pg_query($db, $query);

			while ($data = @pg_fetch_object($qu)) 
			{
			  $id_edad_FK= $data->id_edad_fk;
			}



			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_edad_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_edad_FK);
				}				
				$stmt->close();
			}*/
			// suma uno al max key
			$id_edad_FK = @check_key($id_edad_FK);
			// INSERTA LOS VALORES
			$query = "INSERT INTO t_edad 
						VALUES ('$id_edad_FK','$edad_texto');";	

					$result = @pg_query($db,$query);
		if (!$result) {
			/*echo "<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>";*/
		}

		/*	if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}*/
		}
		// nombre que se imprime en html
		$nombre_combo_box = '<b>4.</b> Edad: ';
		// define la variable
		$variable_name = 'id_edad_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT 
						t_edadesmarinas.id_edades_marinas as id_edad_fk,
						t_edadesmarinas.edad as edad
					FROM 
						t_edadesmarinas
					WHERE 
						id_edades_marinas = $id_edad_FK;";
		

		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->edad!="" & $data->edad!="NULL")
			{
				echo "<option value = '".$data->id_edad_fk."'>".$data->edad."</option>"; 
			}	
		}	
		echo "</select>"; 



		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_edad_FK,$edad);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($edad!="" & $edad!="NULL")
				 {
				echo "<option value = '".$id_edad_FK."'>".$edad.''."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} */
	?>	

	<br><br>


	<!-- **************
	edad_unidad_analisis
	****************-->

	<tr>
	 <td valign="top">
	  <label for="edad_unidad_analisis">
		  <span title="Descripci&oacute;n: miles o millones de a&ntilde;os; 500000000">
			  <b>5.</b> Edad unidad de an&aacute;lisis: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="edad_unidad_analisis" maxlength="11" size="5" value=0>
	 </td>
	</tr>

	<br><br>



	<!-- **************
	metodo_fechamiento
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>6.</b> M&eacute;todo de fechamiento: ';
		// define la variable
		$variable_name = 'id_metodo_fechamiento_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM t_metodofechamiento;";
		 

		 $qu = pg_query($db, $query);
		while ($data = pg_fetch_object($qu)) 
		{

			echo "<option value = '".$data->id_MetodoFechamiento."'>".$data->metodofechamiento_clave.' ( '.$data->metodofechamiento.' ) '."</option>"; 

		}	
		echo "</select>"; 


	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_metodo_fechamiento,$metodo_fechamiento,$metodo_fechamiento_extra);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_metodo_fechamiento."'>".$metodo_fechamiento.' ( '.$metodo_fechamiento_extra.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>

	<br><br>


	<!-- **************
	material_fechado
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>7.</b> Material fechado: ';
		// define la variable
		$variable_name = 'id_material_fechado_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM t_materialfechado;";


		 $qu = pg_query($db, $query);
		while ($data = pg_fetch_object($qu)) 
		{

			echo "<option value = '".$data->id_materialfechado."'>".$data->idmf.' ( '.$data->materialFechado.' ) '."</option>"; 

		}	
		echo "</select>"; 


	/*	 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_material_fechado,$material_fechado,$material_fechado_extra);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_material_fechado."'>".$material_fechado.' ( '.$material_fechado_extra.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>

	<br><br>


	<!-- **************
	no_muestra
	****************-->

	<tr>
	 <td valign="top">
	  <label for="no_muestra">
		  <span title="Descripci&oacute;n: clave de entrada al laboratorio">
			  <b>8.</b> No. de muestra: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="no_muestra" maxlength="45" size="40" value=NULL>
	 </td>
	</tr>

	<br><br>


	<!-- **************
	laboratorio
	****************-->

	<tr>
	 <td valign="top">
	  <label for="laboratorio">
		  <span title="Descripci&oacute;n: Nombre del laboratorio que realiz&oacute; fechado">
			  <b>9.</b> Laboratorio: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="laboratorio" maxlength="40" size="40" value=NULL>
	 </td>
	</tr>
	<br>

<tr><td> <input type="hidden" name="tipo_accion" value="<?= 'edadmaritima' ?>" ></td></tr>

<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

<center>
	<tr>
	 <td colspan="2" style="text-align:center">
	  <br>
	  <br>
	  <input type="submit" value="Capturar datos de la especie">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>
