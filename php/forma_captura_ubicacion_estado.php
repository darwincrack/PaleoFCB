<form name="Captura de datos" method="post" action="forma_captura_ubicacion_municipio.php">
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
        echo "Error 0: " . $errormessage;
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
		$pais_texto = $_POST['pais_texto'];
		
				if(!isset($_POST['tipo_accion'])) {
			died('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		$tipo_accion = $_POST['tipo_accion'];
	
		if ($tipo_accion =='continuar_ubicacion')
		{
			if(!isset($_POST['ID_REF'])) {
				died('We are sorry, but there appears to be a 
				problem with the form you submitted.');		
			}
			// define el mensaje de error
			require_once 'error_message.php';
			$ID_REF = $_POST['ID_REF'];
			//echo $ID_REF;
		}
		
		if(!isset($_POST['tipo_operacion'])) {
			died('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		$tipo_operacion = $_POST['tipo_operacion'];
		
	?>

	<tr><td> <input type="hidden" name="tipo_accion" value="<?= $tipo_accion ?>" ></td></tr>
	<tr><td> <input type="hidden" name="id_Ubicacion" value="<?= $id_Ubicacion ?>" ></td></tr>
	<tr><td> <input type="hidden" name="ID_REF" value="<?= $ID_REF ?>" ></td></tr>
	<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>
	
<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>SELECCIONA EL ESTADO</h2>
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
	
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($pais=="NULL" & $pais_texto!="NULL"){
			$pais=$pais_texto;
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_Pais) as id_pais 
					FROM t_pais";



			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) {
  				$id_pais= $data->id_Pais;
			}

		/*	pg_free_result($qu);
			pg_close($db);*/





		/*	if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_pais);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_pais);
				}				
				$stmt->close();
			}*/









			// insertar nueva entrada
			$id_pais_FK = $id_pais + 1;
			$query = "INSERT INTO t_pais 
					VALUES ('$id_pais_FK','$pais')";

			$result = @pg_query($db,$query);
			if (!$result) {
				/*echo (
				"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
				<br>
				<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
				);*/
			}


			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}*/					
		}	
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
		// sacar la FK del pais
		$query = "SELECT id_pais as id_pais_fk FROM t_pais WHERE pais = '$pais';";		

			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) {
  				$id_pais_FK= $data->id_pais_fk;
			}

			/*pg_free_result($qu);
			pg_close($db);*/


		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_pais_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_pais_FK);
			}				
			$stmt->close();
		}*/

		// nombre que se imprime en html
		$nombre_combo_box = '<b>3.a </b> Estado:';
		// define la variable
		$variable_name = 'estado';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT t_estado.estado as estado
					FROM ubicacion_completa, 
						t_estado
					WHERE id_estado = ubicacion_completa.\"Estado\" 
						AND ubicacion_completa.\"Pais\" = '$id_pais_FK'
					GROUP BY estado
					ORDER BY estado;";

			$qu = pg_query($db, $query);
			// add default
			echo "<option value =NULL>NULL</option>";
			echo "<option value ='No Disponible'>No Disponible</option>";
			while ($data = pg_fetch_object($qu)) {
  				if($result!='No Disponible'){echo "<option value = '".$data->estado."'>".$data->estado."</option>";}
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
		<label for="estado_texto"><b>3.b </b> Estado  
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		</label>
	 </td>
	 <td valign="top"> 
	  <textarea  name="estado_texto" maxlength="30" cols="35" rows="3">NULL</textarea>
	 </td>
	</tr>	
	

<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

<?php 			pg_free_result($qu);
			pg_close($db); ?>
<center>
	<tr>
	 <td colspan="2" style="text-align:center">
	  <br>
	  <br>
	  <input type="submit" value="Seleccionar municipio y localidad">  <input type="reset" value="Borrar campos">
	  <br><br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>


