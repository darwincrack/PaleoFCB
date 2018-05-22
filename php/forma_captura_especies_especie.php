<?php include("post_data_informacion.php"); ?> 
<form name="Captura de datos" method="post" action="forma_captura_especies_restante.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->
<table width="800px">

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
	        echo "Error 0: " . $errormessage;
	        exit();
	    }
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
	?>
<!--********************************************************************
EXTRAE VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php
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
		$genero_texto = $_POST['genero_texto'];

		if(!isset($_POST['tipo_operacion'])) {
			die('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		$tipo_operacion = $_POST['tipo_operacion'];

	?>

	<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>
<!--********************************************************************
INSERTA LOS VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->


<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>CAPTURE LOS DATOS DE LA ESPECIE (ESPECIE)</h2>
	<!--**************************************-->

	<!-- **************
	Clase 
	****************-->
	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>1. Clase: </b>
							</font>';
		// define la variable
		$variable_name = 'id_clase_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Clase\", \"id_Clase\", \"Autor\", \"Anio\" 
					FROM t_clase 
					WHERE \"id_Clase\" = $id_clase_FK;";
		 
			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
			   if ($data->Clase!="" & $data->Clase!="NULL")
							 {
							echo "<option value = '".$data->id_Clase."'>".$data->Clase.' '.$data->Autor.' '.$data->Anio.' '."</option>"; 
							 }
			}	
			 echo "</select>"; 
		 
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($clase,$id_clase_FK,$autor,$anio);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($clase!="" & $clase!="NULL")
				 {
				echo "<option value = '".$id_clase_FK."'>".$clase.' '.$autor.' '.$anio.' '."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
	?>
	
	<br><br>

	<!-- **************
	subclase 
	****************-->
	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>2. Subclase: </b>
							</font>';
		// define la variable
		$variable_name = 'subclase';
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$subclase."'>".$subclase."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>

	<br><br>
	
	<!-- **************
	Orden
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>3. Orden: </b>
							</font>';
		// define la variable
		$variable_name = 'id_orden_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 


		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Orden\", t_orden.\"id_Orden\", \"Autor\", \"Anio\" 
					FROM t_orden 
					WHERE t_orden.\"id_Orden\" = $id_orden_FK;";


					$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
			   if ($data->Orden!="" & $data->Orden!="NULL")
							 {
							echo "<option value = '".$data->id_Orden."'>".$data->Orden.' '.$data->Autor.' '.$data->Anio.' '."</option>"; 
							 }
			}	
		 echo "</select>";
		 
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($orden,$id_orden_FK,$autor,$anio);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($orden!="" & $orden!="NULL")
				 {
				echo "<option value = '".$id_orden_FK."'>".$orden.' '.$autor.' '.$anio.' '."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} */
	?>	

	<br><br>
	
	<!-- **************
	Suborden
	****************-->
	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>4. Suborden: </b>
							</font>';
		// define la variable
		$variable_name = 'suborden';
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$suborden."'>".$suborden."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>

	<br><br>
	
	<!-- **************
	Infraorden
	****************-->
	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>5. Infraorden: </b>
							</font>';		
		// define la variable
		$variable_name = 'infraorden';
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$infraorden."'>".$infraorden."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>	

	<br><br>
	
	<!-- **************
	Familia
	****************-->
	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>6. Familia: </b>
							</font>';			
		// define la variable
		$variable_name = 'id_familia_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Familia\", \"id_Familia\", \"Autor\", \"Anio\" 
					FROM t_familia
					WHERE \"id_Familia\" = $id_familia_FK;";


							$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
			   if ($data->Familia!="" & $data->Familia!="NULL")
							 {
							echo "<option value = '".$data->id_Familia."'>".$data->Familia.' '.$data->Autor.' '.$data->Anio.' '."</option>"; 
							 }
			}	
		 echo "</select>";

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($familia,$id_familia_FK,$autor,$anio);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($familia!="" & $familia!="NULL")
				 {
				echo "<option value = '".$id_familia_FK."'>".$familia.' '.$autor.' '.$anio.' '."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} */
	?>	
	
	<br><br>

	<!-- **************
	Subfamilia
	****************-->
	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>7. Subfamilia: </b>
							</font>';		
		// define la variable
		$variable_name = 'subfamilia';
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$subfamilia."'>".$subfamilia."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>	
	
	<br><br>

	<!-- **************
	Genero
	****************-->
	<?php
		//  revisa si el usuario desea agregar un nuevo campo
		if ($genero=="NULL" & $genero_texto!="NULL"){$genero=$genero_texto;}
		if ($genero=="NULL" & $genero_texto=="NULL"){$genero='No Disponible';}
			
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>8. Genero: </b>
							</font>';		
		// define la variable
		$variable_name = 'genero';
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$genero."'>".$genero."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>	
	
	<br><br>

	<!-- **************
	Especie
	****************-->
	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>9. Especie: </b>
							</font>';		
		// define la variable
		$variable_name = 'especie';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT DISTINCT 
					especies.\"Especie\"  as result
				FROM  especies
				WHERE especies.\"id_Clase\" = $id_clase_FK
				AND especies.\"id_Orden\" = $id_orden_FK
				AND especies.\"id_Familia\" = $id_familia_FK
				AND especies.\"Genero\" = '$genero';";


			 $qu = pg_query($db, $query);
			// add default
			echo "<option value =NULL>NULL</option>";
			echo "<option value =NULL>No Disponible</option>";
		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->result!="" & $data->result!="NULL")
			{
				if($data->result!='No Disponible'){  
					echo "<option value = '".$data->result."'>".$data->result."</option>"; 
				}
			}	
		}	
		echo "</select>"; 


		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($result);
			// add default
			echo "<option value =NULL>NULL</option>";
			echo "<option value =NULL>No Disponible</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($result!="" & $result!="NULL")
				 {
					if($result!='No Disponible'){   
						echo "<option value = '".$result."'>".$result."</option>";  
					}
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
		echo "<br>"; 
	?>	
	
	<br><br>

	<tr>
	 <td valign="top">
	  <label for="especie_texto">
		  <span title="Escribir texto">
			 <b>9.b</b> Especie
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="especie_texto" maxlength="60" size="50" value=NULL>
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
	  <input type="submit" value="Capturar campos restantes (especie)">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>

