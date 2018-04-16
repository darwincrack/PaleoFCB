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

	<?php
		require_once 'insertar_valores_unidad_analisis.php';
		// require_once 'insertar_valores_edad_continental.php';

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


	/*	if ($stmt = $con->prepare($query)) {
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
		 
		/*if ($stmt = $con->prepare($query)) {
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
		echo '</td>';
		echo '</tr>';
	?>

	<!-- **************
	edad
	****************-->
	<?php

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
		$query = "SELECT * FROM t_edadesmarinas;";


		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{

				echo "<option value = '".$data->id_edades_marinas."'>".$data->edad."</option>"; 

		}	
		echo "</select>"; 


		 
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_edad,$edad);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_edad."'>".$edad."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>


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
	  <input  type="text" name="edad_unidad_analisis" maxlength="11" size="5" value=NULL>
	 </td>
	</tr>


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

			echo "<option value = '".$data->id_metodoFechamiento."'>".$data->metodofechamiento_clave.' ( '.$data->metodofechamiento.' ) '."</option>"; 

		}	
		echo "</select>";
		echo '</td>';
		echo '</tr>';
	?>

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
			  <b>8.</b> No. de muestra: 
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
			  <b>9.</b> Laboratorio: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="laboratorio" maxlength="40" size="40" value=NULL>
	 </td>
	</tr>
	<br>



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
