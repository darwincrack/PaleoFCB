<form name="Captura de datos" method="post" action="forma_captura_meristica_especieExistente.php">
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
	?>
<!--********************************************************************
DESPLIEGUE DE INSTRUCCIONES
*********************************************************************-->
	<?php
		require_once 'instrucciones.php';
		require_once 'instrucciones_nota_2.php';
		
		// validation expected data exists
		if( !isset($_POST['id_Especies'])) {
			die('We are sorry, but there appears to be a problem with the form you submitted.');		
		}
		// define el mensaje de error
		require_once 'error_message.php';
	
		// extrae valores del formulario
			// Id_Especie
			$id_Especies = $_POST['id_Especies'];	
			
		echo $id_Especies;
		
	?>
	
<tr><td> <input type="hidden" name="id_especies" value="<?= $id_Especies ?>" ></td></tr>
	
<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>CAPTURE LOS DATOS DE MATERIALES CAT&Aacute;LOGO</h2>	
	<!--**************************************-->

	<!-- **************
	no_catalogo
	****************-->

	<tr>
	 <td valign="top">
	  <label for="no_catalogo">
		  <span title="Descripci&oacute;n: N&uacute;mero de cat&aacute;logo presentado para el hueso; UMPE-0026">
			  <b>1.</b> N&uacute;mero de cat&aacute;logo: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="no_catalogo" maxlength="45" size="30" value=NULL>
	 </td>
	</tr>

	<!-- **************
	descripcion_elemento
	****************-->

	<tr>
	 <td valign="top">
	  <label for="descripcion_elemento">
		  <span title="Descripci&oacute;n: descripci&oacute;n dada por el art&iacute;culo del hueso">
			  <b>2.</b> Descripci&oacute;n elemento: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="descripcion_elemento" maxlength="45" size="30" value=NULL>
	 </td>
	</tr>


	<!-- **************
	lado
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>3.</b> Lado: ';
		// define la variable
		$variable_name = 'id_lado_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 


		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"id_lado\",\"Lado\"
				FROM t_lado;";


		 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
			echo "<option value = '".$data->id_lado."'>".$data->Lado."</option>"; 

		}	
		echo "</select>"; 
		 
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_lado,$lado);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_lado."'>".$lado."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>

	<!-- **************
	imagen
	****************-->

	<tr>
	 <td valign="top">
	  <label for="imagen">
		  <span title="Descripci&oacute;n: .jpg o .png">
			  <b>4.</b> Imagen: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="imagen" maxlength="45" size="30" value=NULL>
	 </td>
	</tr>
	

	<!-- **************
	Elemento
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>5</b> Elemento:';
		// define la variable
		$variable_name = 'id_elemento_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 


		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"id_Elemento\",\"Elemento\",\"Clave_elemento\"
				FROM t_elemento;";
		 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		 echo "<option value = '".$data->id_Elemento."'>".$data->Elemento.' ( '.$data->Clave_elemento.' ) '."</option>"; 
		 }
			 echo "</select>"; 	
		 
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_elemento,$elemento,$elemento_extra);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_elemento."'>".$elemento.' ( '.$elemento_extra.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>	


	<!-- **************
	Elemento
	Add new entry
	****************-->
	<!-- 
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>5.a</b> Elemento:';
		// define la variable
		$variable_name = 'id_elemento_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 


		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"id_Elemento\",\"Elemento\",\"Clave_elemento\"
				FROM t_elemento;";
		 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		 echo "<option value = '".$data->id_Elemento."'>".$data->Elemento.' ( '.$data->Clave_elemento.' ) '."</option>"; 
		 }
			 echo "</select>"; 	


		 

		echo '</td>';
		echo '</tr>';
	?>	


	<tr>
	 <td valign="top">
		<label for="elemento_texto"><b>5.b</b> Elemento 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i>:
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="elemento_texto" maxlength="60" cols="46" rows="3">NULL</textarea>
	 </td>
	</tr>
		
	<tr>
	 <td valign="top">
		<label for="clave_elemento">
		  <span title="Ejemplo: aisl (cuando elemento es: aislado(s))">
			  <b>5.c</b> Clave Elemento (<i>llenar solo en caso de que valor buscado no este en combo-box)</i>: 
		  </span> 
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="clave_alojamiento_texto" maxlength="50" cols="46" rows="3">NULL</textarea>
	 </td>
	</tr>	
-->

	<!-- **************
	parte
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>6.</b> Parte: ';
		// define la variable
		$variable_name = 'id_parte_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT *
				FROM t_parte;";
		 		 $qu = pg_query($db, $query);
			// echo "<option value =NULL>NULL</option>";			

		while ($data = pg_fetch_object($qu)) 
		{
			echo "<option value = '".$data->id_Parte."'>".$data->Parte."</option>"; 
		}	
		echo "</select>"; 
		 
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_parte,$parte);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_parte."'>".$parte."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>

	<!-- 	<tr>
	 <td valign="top">
		<label for="parte_texto"><b>6.b</b> Parte 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i>:
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="parte_texto" maxlength="60" cols="46" rows="3">NULL</textarea>
	 </td>
	</tr>
		 -->


	<!-- **************
	Agente
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>7.a</b> Agente:';
		// define la variable
		$variable_name = 'id_agente_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"id_Agente\",\"Agente\",\"id_ag\" 
					FROM t_agente;";


		$qu = pg_query($db, $query);
		echo "<option value =NULL>NULL</option>";
		while ($data = pg_fetch_object($qu)) 
		{
		 echo "<option value = '".$data->id_Agente."'>".$data->Agente.' ( '.$data->id_ag.' ) '."</option>"; 
		 }
			 echo "</select>"; 
		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_agente,$agente,$agente_extra);
			// add default
			echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_agente."'>".$agente.' ( '.$agente_extra.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>	

	<tr>
	 <td valign="top">
	  <label for="agente_texto">
		  <span title="Ejemplo: Nido de rata">
			  <b>7.b</b> Agente
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="agente_texto" maxlength="50" size="40" value=NULL>
	 </td>
	</tr>	

	<tr>
	 <td valign="top">
	  <label for="agente_clave_texto">
		  <span title="Ejemplo: NR">
			  <b>7.c</b> Agente (Clave)
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="agente_clave_texto" maxlength="2" size="1" value=NULL>
	 </td>
	</tr>	



	<!-- **************
	Contexto
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>8.</b> Contexto:';
		// define la variable
		$variable_name = 'id_contexto_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"id_Contexto\",\"Contexto\",\"id_ctx\" FROM t_contexto;";


				 $qu = pg_query($db, $query);
		while ($data = pg_fetch_object($qu)) 
		{

			echo "<option value = '".$data->id_Contexto."'>".$data->Contexto.' ( '.$data->id_ctx.' ) '."</option>"; 

		}	
		echo "</select>"; 


		 
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_contexto,$contexto,$contexto_extra);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_contexto."'>".$contexto.' ( '.$contexto_extra.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>	

	<!-- **************
	Interperismo
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>9.</b> Interperismo:';
		// define la variable
		$variable_name = 'id_interperismo_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 
		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"id_Interperismo\",\"Interperismo\",\"id_intem\" 
					FROM t_interperismo;";


		 $qu = pg_query($db, $query);
		while ($data = pg_fetch_object($qu)) 
		{
		 echo "<option value = '".$data->id_Interperismo."'>".$data->Interperismo.' ( '.$data->id_intem.' ) '."</option>"; 
		 }
			 echo "</select>"; 
		 
	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_interperismo,$interperismo,$interperismo_extra);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_interperismo."'>".$interperismo.' ( '.$interperismo_extra.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>	
	
	</table>
	<table>
		
	<!-- **************
	Alojamiento
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>10.a</b> Alojamiento:';
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
		 
	/*	if ($stmt = $con->prepare($query)) {
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

	<tr>
	 <td valign="top">
		<label for="alojamiento_texto"><b>10.b</b> Alojamiento 
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
			  <b>10.c</b> Clave Alojamiento (<i>llenar solo en caso de que valor buscado no este en combo-box)</i>: 
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
	  <input type="submit" value="Capturar valores de mer&iacute;stica">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.html">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>
