<form name="Captura de datos" method="post" action="forma_captura_sitio.php">
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

	$db = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
    if(!$db){
        $errormessage=pg_last_error();
        echo "Error: " . $errormessage;
        exit();
    }
	?>
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
EXTRAE VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php
		$region = $_POST['region'];
		$pais = $_POST['pais'];
		$estado = $_POST['estado'];
		$estado_texto = $_POST['estado_texto'];
		
		if(!isset($_POST['tipo_accion'])) {
			die('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		$tipo_accion = $_POST['tipo_accion'];
	
		if ($tipo_accion =='continuar_ubicacion')
		{
			if(!isset($_POST['ID_REF'])) {
				die('We are sorry, but there appears to be a 
				problem with the form you submitted.');		
			}
			// define el mensaje de error
			require_once 'error_message.php';
			$ID_REF = $_POST['ID_REF'];
			//echo $ID_REF;
		}else{
			$tipo_accion = 'captura_normal';
		}
	
		//echo $tipo_accion;

		if(!isset($_POST['tipo_operacion'])) {
			die('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		$tipo_operacion = $_POST['tipo_operacion'];
	?>
	
	<tr><td> <input type="hidden" name="tipo_accion" value="<?= $tipo_accion ?>" ></td></tr>
	<tr><td> <input type="hidden" name="ID_REF" value="<?= $ID_REF ?>" ></td></tr>
	<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>

	
<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>SELECCIONA EL MUNICIPIO Y DEFINE LA LOCALIDAD</h2>
	<!--**************************************-->
	
	<!-- **************
	Region 
	****************-->

	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<b>1.</b> Regi&oacute;n:';
		// define la variable
		$variable_name = 'region';
	
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$region."'>".$region."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>
	
	<br><br>

	<!-- **************
	Pais 
	****************-->

	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<b>2.</b> Pa&iacute;s:';
		// define la variable
		$variable_name = 'pais';
	
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$pais."'>".$pais."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>

	<br><br>	
	
	<!-- **************
	Estado 
	****************-->

	<?php
	
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($estado=="NULL" & $estado_texto!="NULL"){

			$estado=$estado_texto;
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_Estado) as id_estado 
					FROM t_estado";


			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) {
  				$id_estado= $data->id_estado;
			}


			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_estado);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_estado);
				}				
				$stmt->close();*/
			

			// insertar nueva entrada
			$id_estado_FK = $id_estado + 1;
			$query = "INSERT INTO t_estado 
					VALUES ('$id_estado_FK','$estado')";

			$result = pg_query($db,$query);
			if (!$result) {
				die(
				"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
				<br>
				<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
				);
			}	

			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}					
		}	*/
	}
		// nombre que se imprime en html
		$nombre_combo_box = '<b>3.</b> Estado:';
		// define la variable
		$variable_name = 'estado';
	
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$estado."'>".$estado."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>	
	<br><br>
	<!-- **************
	Municipio
	****************-->
	
	<?php
		// sacar la FK del estado
		$query = "SELECT id_estado as id_estado_fk
				FROM t_estado
				WHERE estado = '$estado';";	




			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) {
  				$id_estado_FK= $data->id_estado_fk;
			}




		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_estado_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_estado_FK);
			}				
			$stmt->close();
		}*/

		// nombre que se imprime en html
		$nombre_combo_box = '<b>4.a </b> Municipio:';
		// define la variable
		$variable_name = 'municipio';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT t_municipioprov.municipio_prov as municipio
				FROM ubicacion_completa, 
					t_municipioprov
				WHERE id_municipio_prov = ubicacion_completa.\"Municipio_Provincia\" 
					AND ubicacion_completa.\"Estado\" = '$id_estado_FK'
				GROUP BY municipio
				ORDER BY municipio;";



			$qu = pg_query($db, $query);
			echo "<option value =NULL>NULL</option>";
			echo "<option value ='No Disponible'>No Disponible</option>";	
			while ($data = pg_fetch_object($qu)) {
  				$id_estado_FK= $data->municipio;
  					
  				if($result!='No Disponible'){echo "<option value = '".$data->municipio."'>".$data->municipio."</option>";} 

			}
			echo "</select>";
		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($result);
			// add default
			echo "<option value =NULL>NULL</option>";
			echo "<option value ='No Disponible'>No Disponible</option>";		
			while ($stmt->fetch()) 
			 { 
				if($result!='No Disponible'){echo "<option value = '".$result."'>".$result."</option>";} 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</tr>';
	?>	
	<br><br>		
	<tr>
	 <td valign="top">
		<label for="municipio_texto"><b>4.b </b> Municipio  
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		</label>
	 </td>
	 <td valign="top"> 
	  <textarea  name="municipio_texto" maxlength="30" cols="35" rows="3">NULL</textarea>
	 </td>
	</tr>	

</table>
	<br><br>
<table>
	
	<tr>
	 <td valign="top">
	  <label for="localidad">
		  <span title="Ejemplo: En las Inmediaciones de Concepci&oacute;n Buenavista San Antonio Acutla Teotongo Villa Tejupam de la Uni&oacute;n (Localiades Urbanas)">
			  <b>5.</b> Localidad: 
		  </span> 	  
	  </label>
	 </td>
	 <td valign="top">
	  <textarea  name="localidad" maxlength="200" cols="68" rows="3">NULL</textarea>
	 </td>
	</tr>	
	
	
<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

<?php @pg_free_result($qu);
pg_close($db); ?>
<center>
	<tr>
	 <td colspan="2" style="text-align:center">
	  <br>
	  <br>
	  <input type="submit" value="Capturar sitio">  <input type="reset" value="Borrar campos">
	  <br><br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>


