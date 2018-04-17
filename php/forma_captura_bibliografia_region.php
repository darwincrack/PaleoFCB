<form name="Captura de datos" method="post" action="forma_captura_ubicacion_pais.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->
<table width="600px">

<!--********************************************************************
CONECTARSE A LA BASE DE DATOS
*********************************************************************-->
	<?php
		// connect to database
	require_once 'dbconfig.php';

	$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

 	$db = pg_connect($conn_string);
    if(!$db){
        $errormessage=pg_last_error();
        echo "Error 0: " . $errormessage;
        exit();
    }	

		// check connection
		/*$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
			or die ('Could not connect to the database server' . mysqli_connect_error());*/


		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = 'SELECT count(*) as conteo  FROM t_agente;';

		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  echo "conteo: ".$conteo= $data->conteo;
		}


	?>
<!--********************************************************************
DESPLIEGUE DE INSTRUCCIONES
*********************************************************************-->
	<?php
		require_once 'desplegar_contador.php';
		require_once 'instrucciones.php';
		require_once 'instrucciones_nota_2.php';
	?>

	<tr><td> <input type="hidden" name="tipo_accion" value="<?= 'captura_normal' ?>" ></td></tr>
	<tr><td> <input type="hidden" name="tipo_operacion" value="<?= 'captura_normal' ?>" ></td></tr>
	
<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>INSERTA LA BIBLIOGRAFIA COMPLETA</h2>
	<!--**************************************-->

	<br>

	<tr>
	 <td valign="top">
	  <label for="referencia">
		  <span title="Ejemplo: &Aacute;lvarez T. and Ferrusqu&iacute;a-Villafranca.1967:107">
			  <b>1.</b> Bibliograf&iacute;a completa: 
		  </span> 
	  </label>	 </td>
	 <td valign="top">
	  <textarea  name="referencia" maxlength="1000" cols="50" rows="6">NULL</textarea>
	 </td>
	</tr>
	
	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="anio">
		  <span title="Ejemplo: 1999">
			  <b>2.</b> A&ntilde;o de la publicaci&oacute;n: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="anio" maxlength="4" size="1" value=0000>
	 </td>
	</tr>

	<br><br>

	<!-- **************
	TIPO DE PUBLICACION
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>3.</b> Tipo de publicaci&oacute;n:';
		// define la variable
		$variable_name = 'tipo_referencia';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 









		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = 'SELECT *  FROM t_tiporeferencia;';
		 



		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}
		echo '<select name='.$variable_name.'>'; 
		echo "<option value =NULL>NULL</option>";
		while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
			$val_ref_id = $row['Tipo_Referencia'];
			$val_ref = $row['Tipo_Referencia'];
			echo "<option value = '".$val_ref_id."'>".$val_ref."</option>";
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
		echo "<br>"; 
	?>
	
	
</table>
<table>


	<!--**************************************-->
	<h2>SELECCIONA LA REGI&Oacute;N</h2>
	<!--**************************************-->
		 
	<!-- **************
	Region (combo box)
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>1.a </b> Regi&oacute;n:';
		// define la variable
		$variable_name = 'region';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT region  
				FROM t_region
				GROUP BY region
				ORDER BY region;";
		 
		
		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}

		echo "<option value =NULL>NULL</option>";
		while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
			print_r($row);
			$val_ref_id = $row['region'];
			$val_ref = $row['region'];
			echo "<option value = '".$val_ref_id."'>".$val_ref."</option>";
		}

		echo "</select>"; 



		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($result);
			// add default
			echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/

		echo '</tr>'; 
	?>		

	<tr>
	 <td valign="top">
		<label for="region_texto"><b>1.b </b> Regi&oacute;n 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		</label>
	 </td>
	 <td valign="top"> 
	  <textarea  name="region_texto" maxlength="30" cols="35" rows="3">NULL</textarea>
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
	  <input type="submit" value="Seleccionar pa&iacute;s">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>

