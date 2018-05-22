<?php include("post_data_informacion.php"); ?> 
<form name="Captura de datos" method="post" action="forma_captura_especies_subfamilia.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->
<table width="800px">

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
		$infraorden_texto = $_POST['infraorden_texto'];			

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
	<h2>CAPTURE LOS DATOS DE LA ESPECIE (FAMILIA)</h2>
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
		 
		/*if ($stmt = $con->prepare($query)) {
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
								<b>3.a Orden: </b>
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
		//  revisa si el usuario desea agregar un nuevo campo
		if ($infraorden=="NULL" & $infraorden_texto!="NULL"){$infraorden=$infraorden_texto;}
		if ($infraorden=="NULL" & $infraorden_texto=="NULL"){$infraorden='No Disponible';}
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
								<b>6.a Familia: </b>
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
		$query = "SELECT DISTINCT 
						t_familia.\"Familia\", 
						t_familia.\"id_Familia\", 
						t_familia.\"Autor\", 
						t_familia.\"Anio\" 
				FROM t_familia,especies
				WHERE especies.\"id_Clase\" = $id_clase_FK
				AND especies.\"id_Orden\" = $id_orden_FK
				AND especies.\"id_Familia\" = t_familia.\"id_Familia\";";


				 $qu = pg_query($db, $query);
				// add default
				echo "<option value =NULL>NULL</option>";
				echo "<option value =NULL>No Disponible</option>";
		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->Familia!="" & $data->Familia!="NULL")
			{

				if($data->Familia!='No Disponible'){  
					echo "<option value = '".$data->id_Familia."'>".$data->Familia.' '.$data->Autor.' '.$data->Anio.' '."</option>"; 
					
				}
			}	
		}	
		echo "</select>"; 


		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($familia,$id_familia_FK,$autor,$anio);
			// add default
			echo "<option value =NULL>NULL</option>";
			echo "<option value =NULL>No Disponible</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($familia!="" & $familia!="NULL")
				 {
					if($familia!='No Disponible'){  
						echo "<option value = '".$id_familia_FK."'>".$familia.' '.$autor.' '.$anio.' '."</option>"; 
					}
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} */
	?>	

	<br><br>

	<tr>
	 <td valign="top">
	  <label for="familia_texto">
		  <span title="Ejemplo: Heterodontidae">
			 <b>6.b</b> Familia 
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="familia_texto" maxlength="60" size="50" value=NULL>
	 </td>
	</tr>	
	
	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="familia_autor">
		  <span title="Ejemplo: Gray">
			  <b>6.c</b> Autor
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="familia_autor" maxlength="20" size="24" value=NULL>
	 </td>
	</tr>

	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="familia_anio">
		  <span title="Ejemplo: 1851">
			  <b>6.d</b> A&ntilde;o
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="familia_anio" maxlength="4" size="1" value=NULL>
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
	  <input type="submit" value="Capturar subfamilia">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>

