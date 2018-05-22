<?php include("post_data_informacion.php"); ?>
<form name="Captura de datos" method="post" action="bifurcacion_unidad_analisis_a_edades.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->
<table width="1000px">

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
		
		//echo $tipo_accion;
		
		if ($tipo_accion =='continuar_sitio')
		{
			if(!isset($_POST['id_Ubicacion'])) {
				die('We are sorry, but there appears to be a 
				problem with the form you submitted.');		
			}
			$id_Ubicacion = $_POST['id_Ubicacion'];
		}

		require_once 'insertar_valores_sitio.php';

		if(!isset($_POST['tipo_operacion'])) {
			die('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		$tipo_operacion = $_POST['tipo_operacion'];

	?>
	
	<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>
	
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
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>CAPTURA LOS DATOS DE LA UNIDAD DE AN&Aacute;LISIS</h2>
	<!--**************************************-->

	<tr>
	 <td valign="top">
	  <label for="unidad_analisis">
		  <span title="Descripci&oacute;n: Clave o nombre de la capa fos&iacute;lifera">
			  <b>1.</b> Unidad de an&aacute;lisis: 
		  </span> 
	  </label>	 </td>
	 <td valign="top">
	  <input  type="text" name="unidad_analisis" maxlength="45" size="20" value=NULL>
	 </td>
	</tr>

	<br><br>

	<tr>
	 <td valign="top">
	  <label for="litologia">
		  <span title="Descripci&oacute;n: Descripci&oacute;n de roca o sedimentos">
			  <b>2.</b> Litolog&iacute;a: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="litologia" maxlength="300" size="20" value=NULL>
	 </td>
	</tr>


	<br><br>


	<!-- **************
	sistema_depositacion
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>3.a</b> Sistema de depositaci&oacute;n:';
		// define la variable
		$variable_name = 'sistema_depositacion';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT id_sistema_depositacion,Sistema_Depositacion,idsd 
					FROM t_sistemadepositacion
					ORDER BY Sistema_Depositacion;";

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
					echo "<option value = '".$row['id_sistema_depositacion']."'>".$row['sistema_depositacion']." ( ".$row['idsd']." ) </option>"; 
		}

		echo "</select>"; 

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($llave,$valor,$clave);
			// add default
			echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$llave."'>".$valor.' ( '.$clave.' ) '."</option>"; 
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
	  <label for="sistema_depositacion_texto">
		  <span title="Ejemplo: Cueva">
			  <b>3.b</b> Sistema de depositaci&oacute;n
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="sistema_depositacion_texto" maxlength="30" size="25" value=NULL>
	 </td>
	</tr>	

	<br><br>


	<tr>
	 <td valign="top">
	  <label for="sistema_depositacion_clave_texto">
		  <span title="Ejemplo: CV">
			  <b>3.c</b> Sistema de depositaci&oacute;n (Clave)
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="sistema_depositacion_clave_texto" maxlength="2" size="1" value=NULL>
	 </td>
	</tr>	

	</table>
	<table>
		

	<!-- **************
	ambiente_depositacion
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>4.a</b> Ambiente de depositaci&oacute;n:';
		// define la variable
		$variable_name = 'ambiente_depositacion';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT id_ambiente_depositacion,Ambiente_Depositacion,ida
					FROM t_ambientedepositacion
					ORDER BY Ambiente_Depositacion;";

			$qu = pg_query($db, $query);
			
			echo "<option value =NULL>NULL</option>";
			while ($data = pg_fetch_object($qu)) {



				echo "<option value = '".$data->id_ambiente_depositacion."'>".$data->ambiente_depositacion.' ( '.$data->ida.' ) '."</option>"; 


			}	
			 echo "</select>";


		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($llave,$valor,$clave);
			// add default
			echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$llave."'>".$valor.' ( '.$clave.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>	
	
	
	</table>
	<table>
		
	
	<tr>
	 <td valign="top">
	  <label for="ambiente_depositacion_texto">
		  <span title="Ejemplo: Arroyo">
			  <b>4.b</b> Ambiente de depositaci&oacute;n
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="ambiente_depositacion_texto" maxlength="30" size="25" value=NULL>
	 </td>
	</tr>	

	<tr>
	 <td valign="top">
	  <label for="ambiente_depositacion_clave_texto">
		  <span title="Ejemplo: AR">
			  <b>4.c</b> Ambiente de depositaci&oacute;n (Clave)
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="ambiente_depositacion_clave_texto" maxlength="2" size="1" value=NULL>
	 </td>
	</tr>	
	
	
	</table>
	<table>
		
	
	<!-- **************
	facie
	****************-->
		
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>5.a</b> Facie:';
		// define la variable
		$variable_name = 'facie';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT id_facies,facies,idf
					FROM t_facies
					GROUP BY facies,id_facies order by facies;";
		 

			$qu = pg_query($db, $query);
			
			echo "<option value =NULL>NULL</option>";
			while ($data = pg_fetch_object($qu)) {
  				echo "<option value = '".$data->id_facies."'>".$data->facies.' ( '.$data->idf.' ) '."</option>"; 

			}	
			 echo "</select>";



		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($llave,$valor,$clave);
			// add default
			echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$llave."'>".$valor.' ( '.$clave.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>	
	
	<tr>
	 <td valign="top">
	  <label for="facie_texto">
		  <span title="Ejemplo: Canal">
			  <b>5.b</b> Facie
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="facie_texto" maxlength="30" size="25" value=NULL>
	 </td>
	</tr>	

	<tr>
	 <td valign="top">
	  <label for="facie_clave_texto">
		  <span title="Ejemplo: CA">
			  <b>5.c</b> Facie (Clave)
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="facie_clave_texto" maxlength="2" size="1" value=NULL>
	 </td>
	</tr>	
	
			
	
	<!-- **************
	formacion
	****************-->
		
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>6.a</b> Formaci&oacute;n:';
		// define la variable
		$variable_name = 'formacion';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT id_formacion,formacion
				FROM t_formacion
				GROUP BY formacion,id_formacion ORDER BY formacion;";
		 


			$qu = pg_query($db, $query);
			
			echo "<option value =NULL>NULL</option>";
			while ($data = pg_fetch_object($qu)) {

				echo "<option value = '".$data->id_formacion."'>".$data->formacion.''."</option>"; 

			}	
			 echo "</select>";



	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($llave,$valor);
			// add default
			//echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$data->id_formacion."'>".$data->formacion.''."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>	
	
	<tr>
	 <td valign="top">
	  <label for="formacion_texto">
		  <span title="Ejemplo: Abrigo">
			  <b>6.b</b> Formaci&oacute;n
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="formacion_texto" maxlength="30" size="25" value=NULL>
	 </td>
	</tr>	
	

	<tr>
	 <td valign="top">
	  <label for="nota_formacion">
		  <span title="Descripci&oacute;n: Nombre geol&oacute;gico que recibe el dep&oacute;sito">
			  <b>7.</b> Nota Formaci&oacute;n: 
		  </span> 
	  </label>	 
	  </td>
	 <td valign="top">
	  <textarea  name="nota_formacion" maxlength="300" cols="66" rows="3">NULL</textarea>
	 </td>
	</tr>


	<!-- **************
	contaminacion
	****************-->
		
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>8.</b> Contaminaci&oacute;n:';
		// define la variable
		$variable_name = 'contaminacion';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT contaminacion as result
					FROM t_contaminacion
					ORDER BY result;";
		 


			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) {
				echo "<option value = '".$data->result."'>".$data->result."</option>"; 

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
		echo '<br>';
	?>	
				

	<!-- **************
	tipo_edad
	****************-->
	<br>
	<br>
	<tr>
	 <td valign="top">
		<label for="tipo_edad">
			  <b>9.</b> Seleccionar edad a capturar: 
		</label>
	 </td>
	 <td valign="top"> 
	 <select name="tipo_edad">
	  <option value="edad_continental">Edad Continental</option>		 
	  <option value="edad_maritima">Edad Mar&iacute;tima</option>
	 </select> </td>
	</tr>	
	
	
</table>

<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

<center>
	<tr>
	 <td colspan="2" style="text-align:center">
	  <br>
	  <br>
	  <input type="submit" value="Capturar edad">  
	  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>
