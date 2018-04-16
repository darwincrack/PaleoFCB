<form name="Captura de datos" method="post" action="forma_captura_especies_existente.php">
<!--
<form name="Captura de datos" method="post" action="forma_captura_especies_clase.php">
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
		require_once 'instrucciones.php';
	?>

<!--********************************************************************
INSERTA LOS VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->

	<!-- **************
	tipo_edad
	****************-->

	<?php
		require_once 'insertar_valores_unidad_analisis.php';
	?>

<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>CAPTURE LA EDAD CONTINENTAL</h2>
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
	  <option value="edad_continental">Edad Continental</option>		 
	 </select> </td>
	</tr>	
	
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
		$query = "SELECT \"id_era\",\"era\"
				FROM t_era;";
		 


		 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{

				echo "<option value = '".$data->id_era."'>".$data->era."</option>"; 

		}	
		echo "</select>"; 
		

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_era,$era);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_era."'>".$era."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>
	

	<!-- **************
	periodo
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
		$query = "SELECT \"id_periodo\",\"periodo\"
				FROM t_periodo;";
				 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{

				echo "<option value = '".$data->id_periodo."'>".$data->periodo."</option>"; 

		}	
		echo "</select>"; 


		 
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_periodo,$periodo);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_periodo."'>".$periodo."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>

	<!-- **************
	epoca
	****************-->
	<?php

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
		$query = "SELECT \"id_epoca\",\"epoca\"
				FROM t_epoca;";


		 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{

				echo "<option value = '".$data->id_epoca."'>".$data->epoca."</option>"; 

		}	
		echo "</select>"; 

		 
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_epoca,$epoca);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_epoca."'>".$epoca."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>

	<!-- **************
	piso_faunistico
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>4.</b> Piso faun&iacute;stico: ';
		// define la variable
		$variable_name = 'id_piso_faunistico_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM t_pisofaunistico;";



		 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{

				echo "<option value = '".$data->id_pisofaunistico."'>".$data->pisoFaunistico."</option>"; 

		}	
		echo "</select>"; 
		 
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_piso_faunistico,$piso_faunistico);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_piso_faunistico."'>".$piso_faunistico."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>


	<!-- **************
	glacial_interglacial
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>5.</b> Periodo Glacial: ';
		// define la variable
		$variable_name = 'id_glacial_interglacial_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM t_glacialinterglacial;";

		 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{

				echo "<option value = '".$data->id_glacialinterglacial."'>".$data->idgi."</option>"; 

		}	
		echo "</select>"; 


		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_glacial_interglacial,$glacial_interglacial);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_glacial_interglacial."'>".$glacial_interglacial."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>


	<!-- **************
	estadio
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>6.</b> Estadio: ';
		// define la variable
		$variable_name = 'id_estadio_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"id_estadios\",\"estadios\"
				FROM t_estadios;";


		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{

				echo "<option value = '".$data->id_estadios."'>".$data->estadios."</option>"; 

		}	
		echo "</select>"; 


		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_estadios,$estadios);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_estadios."'>".$estadios."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>
	
	<!-- **************
	gli_duracion
	****************-->

	<tr>
	 <td valign="top">
	  <label for="gli_duracion">
		  <span title="Ejemplo: 100000000">
			  <b>7.</b> GL-I_duraci&oacute;n: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="gli_duracion" maxlength="40" size="6" value=NULL>
	 </td>
	</tr>
	<br>

	<!-- **************
	fauna_local
	****************-->

	<tr>
	 <td valign="top">
	  <label for="fauna_local">
		  <span title="Descripci&oacute;n: Nombre faun&iacute;stico com&uacute;n que recibe el dep&oacute;sito">
			  <b>8.</b> Fauna local: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="fauna_local" maxlength="40" size="40" value=NULL>
	 </td>
	</tr>
	<br>


	<!-- **************
	edad_cultural
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>9.</b> Edad cultural: ';
		// define la variable
		$variable_name = 'id_edad_cultural_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM t_edadcultural;";



		 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{

			echo "<option value = '".$data->id_edadcultural."'>".$data->edadcultural.' ( '.$data->temporalidad.' ) '."</option>"; 

		}	
		echo "</select>"; 
		 
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_edad_cultural,$edad_cultural,$edad_cultural_extra);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_edad_cultural."'>".$edad_cultural.' ( '.$edad_cultural_extra.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>
	

	<!-- **************
	isotopo
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>10.</b> Isotopo: ';
		// define la variable
		$variable_name = 'id_isotopo_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"id_isotopo\",\"isotopo\"
				FROM t_isotopo;";



		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{

				echo "<option value = '".$data->id_isotopo."'>".$data->isotopo."</option>"; 

		}	
		echo "</select>"; 



		 
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_isotopo,$isotopo);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_isotopo."'>".$isotopo."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>
	
	<!-- **************
	magnetocron
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>11.</b> Magnetocron: ';
		// define la variable
		$variable_name = 'id_magnetocron_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM t_magnetocron;";



		 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{

			echo "<option value = '".$data->id_magnetocron."'>".$data->idmag.' ( '.$data->magnetocron.' ) '."</option>"; 

		}	
		echo "</select>"; 



		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_magnetocron,$magnetocron,$magnetocron_extra);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_magnetocron."'>".$magnetocron.' ( '.$magnetocron_extra.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>

	<!-- **************
	metodo_fechamiento
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>12.</b> M&eacute;todo de fechamiento: ';
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

			echo "<option value = '".$data->id_metodoFechamiento."'>".$data->metodofechamiento_clave.' ( '.$data->metodofechamiento.' ) '."</option>"; 

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

	<!-- **************
	material_fechado
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>13.</b> Material fechado: ';
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



		 
	/*	if ($stmt = $con->prepare($query)) {
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

	<!-- **************
	no_muestra
	****************-->

	<tr>
	 <td valign="top">
	  <label for="no_muestra">
		  <span title="Descripci&oacute;n: clave de entrada al laboratorio">
			  <b>14.</b> No. de muestra: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="no_muestra" maxlength="45" size="40" value=NULL>
	 </td>
	</tr>

	<!-- **************
	laboratorio
	****************-->

	<tr>
	 <td valign="top">
	  <label for="laboratorio">
		  <span title="Descripci&oacute;n: Nombre del laboratorio que realiz&oacute; fechado">
			  <b>15.</b> Laboratorio: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="laboratorio" maxlength="40" size="40" value=NULL>
	 </td>
	</tr>

	<!-- **************
	edad_unidad_analisis
	****************-->

	<tr>
	 <td valign="top">
	  <label for="edad_unidad_analisis">
		  <span title="Descripci&oacute;n: miles o millones de a&ntilde;os; 500000000">
			  <b>16.</b> Edad unidad de an&aacute;lisis: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="edad_unidad_analisis" maxlength="11" size="5" value=NULL>
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
	  <input type="submit" value="Capturar datos de la especie">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.html">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>
