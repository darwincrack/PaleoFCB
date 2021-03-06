<?php include("post_data_informacion.php"); ?>
<form name="Captura de datos" method="post" action="forma_captura_unidad_analisis.php">
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
	        echo "Error 0: " . $errormessage;
	        exit();
	    }	
		/*$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
			or die ('Could not connect to the database server' . mysqli_connect_error());*/
	
    	include("guardar_ubicacion_actual.php");
	?>
		<input type="hidden" name="referencia" value="<?= $referencia ?>" >
		
<!--********************************************************************
INSERTA LOS VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php
	
		if(!isset($_POST['tipo_accion'])) {
			die('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		$tipo_accion = $_POST['tipo_accion'];
	
		if ($tipo_accion =='continuar_sitio')
		{
			$id_Ubicacion = $_POST['id_Ubicacion'];
		}else{
			
			if ($tipo_accion == 'continuar_ubicacion')
			{
				if(!isset($_POST['ID_REF'])) {
					die('We are sorry, but there appears to be a 
					problem with the form you submitted.');	
					// define el mensaje de error
					require_once 'error_message.php';
				}	
				$ID_REF = $_POST['ID_REF'];
				//echo $ID_REF;
			}
					
			require_once 'insertar_valores_ubicacion.php';
		}

		if(!isset($_POST['tipo_operacion'])) {
			die('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		$tipo_operacion = $_POST['tipo_operacion'];
		
		//echo $tipo_accion;
		//echo $id_Ubicacion;	
	
	?>

	<tr><td> <input type="hidden" name="tipo_accion" value="<?= $tipo_accion ?>" ></td></tr>
	<tr><td> <input type="hidden" name="id_Ubicacion" value="<?= $id_Ubicacion ?>" ></td></tr>
	<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>
	
	
<!--********************************************************************
DESPLIEGUE DE INSTRUCCIONES
*********************************************************************-->
	<?php
		// DESPLIEGA LAS INSTRUCCIONES
		require_once 'desplegar_id.php';
		require_once 'desplegar_contador.php';		
		require_once 'instrucciones.php';
		require_once 'instrucciones_nota_2.php';		
	?>


<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>CAPTURA LOS DATOS DEL SITIO</h2>
	<!--**************************************-->

	<tr>
	 <td valign="top">
	  <label for="sitio">
		  <span title="Ejemplo: Oax-2 El Pedernal">
			  <b>1.</b> Sitio: 
		  </span> 
	  </label>	 </td>
	 <td valign="top">
	  <textarea  name="sitio" maxlength="100" cols="50" rows="2">NULL</textarea>
	 </td>
	</tr>
	<br><br>
	<tr>
	 <td valign="top">
	  <label for="latitud">
		  <span title="Ejemplo: 17.5833">
			  <b>2.</b> Latitud: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="latitud" maxlength="8" size="2" value=0>
	 </td>
	</tr>			
		<br><br>
	<tr>
	 <td valign="top">
	  <label for="longitud">
		  <span title="Ejemplo: -97.333333">
			  <b>3.</b> Longitud: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="longitud" maxlength="11" size="5" value=0>
	 </td>
	</tr>			
		<br><br>
	<tr>
	 <td valign="top">
	  <label for="ccle">
		  <span title="Ejemplo: 1234567">
			  <b>4.</b> CCL-E: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="ccle" maxlength="7" size="2" value=0>
	 </td>
	</tr>	
	<br><br>
	<tr>
	 <td valign="top">
	  <label for="ccln">
		  <span title="Ejemplo: 1234567">
			  <b>5.</b> CCL-N: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="ccln" maxlength="7" size="2" value=0>
	 </td>
	</tr>	
		<br><br>
	<tr>
	 <td valign="top">
	  <label for="utme">
		  <span title="Ejemplo: 123456.78">
			  <b>6.</b> UTM-E: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="utme" maxlength="9" size="3" value=0>
	 </td>
	</tr>	
		<br><br>
	<tr>
	 <td valign="top">
	  <label for="utmn">
		  <span title="Ejemplo: 1234567.89">
			  <b>7.</b> UTM-N: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="utmn" maxlength="10" size="3" value=0>
	 </td>
	</tr>	
			<br><br>
	<tr>
	 <td valign="top">
	  <label for="zonautm">
		  <span title="Descripci&oacute;n: N&uacute;meros del 1 al 60">
			  <b>8.</b> Zona-UTM: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="zonautm" maxlength="2" size="1" value=0>
	 </td>
	</tr>	
				
	<br><br>
	<!-- **************
	precision_coord
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>8.</b> Precisi&oacute;n de coords:';
		// define la variable
		$variable_name = 'precision_coord';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = 'SELECT "Precision_Coord" as result
					FROM t_precisioncoord
					ORDER BY result;';

		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}
		while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
					echo "<option value = '".$row['result']."'>".$row['result']."</option>"; 

		}

		echo "</select>"; 





		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($result);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/




		echo '</td>';
		echo '</tr>';
	?>
		<br><br>
	<!-- **************
	fuente_coord
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>9.</b> Fuente de coords:';
		// define la variable
		$variable_name = 'fuente_coord';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = 'SELECT "Fuente_Coord" as result
					FROM t_fuentecoord
					ORDER BY result;';


		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}
		while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
					echo "<option value = '".$row['result']."'>".$row['result']."</option>"; 

		}				
		echo "</select>";
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($result);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>	
		<br><br>
	<!-- **************
	fuente_altitud
	****************-->
	
		
	<tr>
	 <td valign="top">
	  <label for="altitud">
		  <span title="Descripci&oacute;n: Altura en metros sobre el nivel del mar">
			  <b>10.</b> Altitud: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="altitud" maxlength="5" size="1" value=0>
	 </td>
	</tr>	
	
	
	<br><br>
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>11.</b> Fuente de altitud:';
		// define la variable
		$variable_name = 'fuente_altitud';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = 'SELECT "Fuente_Altitud" as result
					FROM t_altitud
					ORDER BY result;';


		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}
		while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
					echo "<option value = '".$row['result']."'>".$row['result']."</option>"; 

		}				
		echo "</select>";



		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($result);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>	
		
	
</table>

<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

<center>
	<tr>
	 <td colspan="2" style="text-align:center">
	  <br>
	  <br>
	  <input type="submit" value="Capturar unidad de an&aacute;lisis">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>
