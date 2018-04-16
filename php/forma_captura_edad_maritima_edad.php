<form name="Captura de datos" method="post" action="forma_captura_edad_maritima_edad_unidad_analisis.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->
<table width="600px">

<!--********************************************************************
CONECTARSE A LA BASE DE DATOS
*********************************************************************-->
	<?php
		// connect to database
		require_once 'dbconfig.php';
		// check connection
		/*$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
			or die ('Could not connect to the database server' . mysqli_connect_error());*/

		$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

	 	$db = pg_connect($conn_string);
	    if(!$db){
	        $errormessage=pg_last_error();
	        echo "Error : " . $errormessage;
	        exit();
	    }	
	?>
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
		$epoca_texto = $_POST['epoca_texto'];
		// VALIDA LLAVE
		if($id_epoca_FK=='NULL' & $epoca_texto=='NULL')
		{
			// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
			$query = "SELECT id_epoca as llave
					  FROM t_epoca
					  WHERE epoca = 'No Disponible';";
					$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_epoca_FK= $data->llave;
		}	




		/*	if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($llave);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_ubicacion_FK);
				}				
				$stmt->close();
			}
			$id_epoca_FK=$llave;	*/
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
	<h2>CAPTURE LA EDAD MAR&Iacute;TIMA (EDAD)</h2>
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




		/*if ($stmt = $con->prepare($query)) {
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


	/*	if ($stmt = $con->prepare($query)) {
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
		if ($id_epoca_FK=="NULL" & $epoca_texto!="NULL")
		{
			// extrae el ultimo valor del ID en tabla
			$query = "SELECT MAX(id_epoca) as id_epoca_fk 
						FROM t_epoca;";
					$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_epoca_FK= $data->id_epoca_fk;
		}


			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_epoca_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_epoca_FK);
				}				
				$stmt->close();
			}*/
			// suma uno al max key
			$id_epoca_FK = check_key($id_epoca_FK);
			// INSERTA LOS VALORES
			$query = "INSERT INTO t_epoca 
						VALUES ('$id_epoca_FK','$epoca_texto');";

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

		/*if ($stmt = $con->prepare($query)) {
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

		// nombre que se imprime en html
		$nombre_combo_box = '<b>4.a </b> Edad: ';
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
					id_edades_marinas IN 
					(SELECT DISTINCT 
						edadesmarinascompleta.edad
					FROM 
						edadesmarinascompleta
					WHERE 
						edadesmarinascompleta.epoca = $id_epoca_FK);";


						 $qu = pg_query($db, $query);
			// add default
			echo "<option value =NULL>NULL</option>";
			echo "<option value =NULL>No Disponible</option>";	
		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->edad!='No Disponible')
			{
				echo "<option value = '".$data->id_edad_fk."'>".$data->edad."</option>"; 
			}	
		}	
		echo "</select>"; 		
		 



		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_edad_FK,$edad);
			// add default
			echo "<option value =NULL>NULL</option>";
			echo "<option value =NULL>No Disponible</option>";		
			while ($stmt->fetch()) 
			 { 
				if($edad!='No Disponible'){
					echo "<option value = '".$id_edad_FK."'>".$edad."</option>"; 
				}
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>

	<br><br>


	<tr>
	 <td valign="top">
	  <label for="edad_texto">
		  <span title="">
			 <b>4.b </b> Edad
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="edad_texto" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>	


<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

<center>
	<tr>
	 <td colspan="2" style="text-align:center">
	  <br>
	  <br>
	  <input type="submit" value="Capturar campos restantes de edad mar&iacute;tima">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>
