<?php include("post_data_informacion.php"); ?> 
<form name="Captura de datos" method="post" action="insertar_valores_materiales_lote.php">
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
INSERTA LOS VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php
		
		// validation expected data exists
		if(!isset($_POST['tipo_accion'])) {
			die('We are sorry, but there appears to be a problem with the form you submitted.');		
		}
		$tipo_accion = $_POST['tipo_accion'];
		
//		echo $tipo_accion;
		
		if ($tipo_accion =='nueva_especie')
		{
			require_once 'insertar_valores_especies_jerarquia.php';
		}else
		{
			// extrae valores del formulario
			// Id_Especie
			$id_Especies = $_POST['id_Especies'];	
//			echo $id_Especies;

			//insertar relacion especieExistente - unidadAnalisis 
			$query = "SELECT MAX(\"id_UnidadAnalisis\") 
					as id_unidad_analisis_FK 
					FROM unidadanalisis;";

			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
			  $id_unidad_analisis_FK= $data->id_UnidadAnalisis;
			}	
			


			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_unidad_analisis_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_unidad_analisis_FK);
				}				
				$stmt->close();
			}	*/	
					
			// INSERTA LOS VALORES
			$query = "INSERT INTO unidadespecie 
						VALUES ('$id_Especies','$id_unidad_analisis_FK');";	
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

		if(!isset($_POST['tipo_operacion'])) {
			die('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		$tipo_operacion = $_POST['tipo_operacion'];

	?>
	
	<tr><td> <input type="hidden" name="id_especies" value="<?= $id_Especies ?>" ></td></tr>
	<tr><td> <input type="hidden" name="tipo_accion" value="<?= $tipo_accion ?>" ></td></tr>
	<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>

<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>CAPTURE LOS DATOS MATERIALES LOTE</h2>	
	<!--**************************************-->


	<!-- **************
	lote
	****************-->

	<tr>
	 <td valign="top">
	  <label for="lote">
		  <span title="Descripci&oacute;n: Clave publicada en art&iacute;culo">
			  <b>1.</b> Lote: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="lote" maxlength="45" size="35" value=NULL>
	 </td>
	</tr>

	<br><br>
	
	<!-- **************
	materiales_lote_descripcion
	****************-->

	<tr>
	 <td valign="top">
	  <label for="materiales_lote_descripcion">
		  <span title="Descripci&oacute;n: descripci&oacute;n del contenido">
			  <b>2.</b> Descripci&oacute;n del lote: 
		  </span> 
	  </label>	 
	</td>
	 <td valign="top">
	  <textarea  name="materiales_lote_descripcion" maxlength="1000" cols="50" rows="6">NULL</textarea>
	 </td>
	</tr>	



	</table>
	<table>
		
	<!-- **************
	Alojamiento
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>3.a</b> Alojamiento:';
		// define la variable
		$variable_name = 'alojamiento';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Alojamiento\"
				FROM t_alojamiento
				ORDER BY \"Alojamiento\";";

 		$qu = pg_query($db, $query);
		echo "<option value =NULL>NULL</option>";
		while ($data = pg_fetch_object($qu)) 
		{
			 if ($data->Alojamiento!="" & $data->Alojamiento!="NULL")
				 {
			echo "<option value = '".$data->Alojamiento."'>".$data->Alojamiento."</option>"; 
		}
		}	
		echo "</select>"; 



		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($result);
			// add default
			echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($result!="" & $result!="NULL")
				 {
					echo "<option value = '".$result."'>".$result."</option>";  
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
		<label for="alojamiento_texto"><b>3.b</b> Alojamiento 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i>:
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="alojamiento_texto" maxlength="200" cols="88" rows="2">NULL</textarea>
	 </td>
	</tr>
		
	<br>
	
	<tr>
	 <td valign="top">
		<label for="clave_alojamiento_texto">
		  <span title="Ejemplo: UCLA">
			  <b>3.c</b> Clave Alojamiento (<i>llenar solo en caso de que valor buscado no este en combo-box)</i>: 
		  </span> 
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="clave_alojamiento_texto" maxlength="50" cols="33" rows="1">NULL</textarea>
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
	  <input type="submit" value="Concluir captura de datos">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>
