<form name="Captura de datos" method="post" action="bifurcacion_especies_a_materiales.php">
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
	
		// validation expected data exists
		if(!isset($_POST['tipo_edad'])) {
			die('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		// define el mensaje de error
		require_once 'error_message.php';
		$tipo_edad = $_POST['tipo_edad'];

		if ($tipo_edad=='edad_continental')
		{
			// option 1
			require_once 'insertar_valores_edad_continental.php';		
		}else
		{
			// option 2
			require_once 'insertar_valores_edad_maritima.php';		
		}		
	?>

<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>CAPTURE LOS DATOS DE LA ESPECIE</h2>
	<!--**************************************-->

	<!-- **************
	Clase
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>1.a</b> Clase:';
		// define la variable
		$variable_name = 'clase';

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
	?>	

	<tr>
	 <td valign="top">
		<label for="clase_texto"><b>1.b</b> Clase 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		</label>
	 </td>
	 <td valign="top"> 
	  <textarea  name="clase_texto" maxlength="30" cols="35" rows="3">NULL</textarea>
	 </td>
	</tr>	

		
	<!-- **************
	Subclase
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>2.a</b> Subclase:';
		// define la variable
		$variable_name = 'subclase';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Subclase\" as result
					FROM especies 
					GROUP BY Subclase
					ORDER BY Subclase;";
				 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->result!="" & $data->result!="NULL")
			{
				echo "<option value = '".$data->result."'>".$data->result."</option>"; 
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
		//echo "<br>"; 
	?>	
	
	<tr>
	 <td valign="top">
		<label for="subclase_texto"><b>2.b</b> Subclase 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i>:
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="subclase_texto" maxlength="30" cols="35" rows="3">NULL</textarea>
	 </td>
	</tr>	
	

	<!-- **************
	Orden
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>3.a</b> Orden:';
		// define la variable
		$variable_name = 'orden';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Orden\" as result
					FROM t_orden 
					GROUP BY Orden
					ORDER BY Orden;";


						 $qu = pg_query($db, $query);
	// add default
			echo "<option value =NULL>NULL</option>";
		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->result!="" & $data->result!="NULL")
			{
				echo "<option value = '".$data->result."'>".$data->result."</option>"; 
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
		} */
	?>	

	<tr>
	 <td valign="top">
		<label for="orden_texto"><b>3.b</b> Orden 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i>:
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="orden_texto" maxlength="30" cols="47" rows="3">NULL</textarea>
	 </td>
	</tr>	

	
	<!-- **************
	Suborden
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>4.a</b> Suborden:';
		// define la variable
		$variable_name = 'suborden';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Suborden\" as result
					FROM especies
					GROUP BY Suborden
					ORDER BY Suborden;";

								 $qu = pg_query($db, $query);
	// add default
			echo "<option value =NULL>NULL</option>";
		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->result!="" & $data->result!="NULL")
			{
				echo "<option value = '".$data->result."'>".$data->result."</option>"; 
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
		// echo "<br>"; 
	?>	

	<tr>
	 <td valign="top">
		<label for="suborden_texto"><b>4.b</b> Suborden 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i>:
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="suborden_texto" maxlength="30" cols="35" rows="3">NULL</textarea>
	 </td>
	</tr>	

	<!-- **************
	Infraorden
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>5.a</b> Infraorden:';
		// define la variable
		$variable_name = 'infraorden';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Infraorden\" as result
					FROM especies
					GROUP BY Infraorden 
					ORDER BY Infraorden;";


								 $qu = pg_query($db, $query);
	// add default
			echo "<option value =NULL>NULL</option>";
		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->result!="" & $data->result!="NULL")
			{
				echo "<option value = '".$data->result."'>".$data->result."</option>"; 
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
		// echo "<br>"; 
	?>	

	<tr>
	 <td valign="top">
		<label for="infraorden_texto"><b>5.b</b> Infraorden 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i>:
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="infraorden_texto" maxlength="30" cols="35" rows="3">NULL</textarea>
	 </td>
	</tr>	


	<!-- **************
	Familia
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>6.a</b> Familia:';
		// define la variable
		$variable_name = 'familia';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Familia\" as result
					FROM t_familia
					GROUP BY \"Familia\"
					ORDER BY \"Familia\";";
		 

		$qu = pg_query($db, $query);
	// add default
			echo "<option value =NULL>NULL</option>";
		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->result!="" & $data->result!="NULL")
			{
				echo "<option value = '".$data->result."'>".$data->result."</option>"; 
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
		} */
	?>	

	<tr>
	 <td valign="top">
		<label for="familia_texto"><b>6.b</b> Familia 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i>:
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="familia_texto" maxlength="30" cols="47" rows="3">NULL</textarea>
	 </td>
	</tr>	


	<!-- **************
	Subfamilia
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>7.a</b> Subfamilia:';
		// define la variable
		$variable_name = 'subfamilia';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Subfamilia\" as result
					FROM especies
					GROUP BY \"Subfamilia\"
					ORDER BY \"Subfamilia\";";
		 

		 $qu = pg_query($db, $query);
			// add default
			echo "<option value =NULL>NULL</option>";
		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->result!="" & $data->result!="NULL")
			{
				echo "<option value = '".$data->result."'>".$data->result."</option>"; 
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
		<label for="subfamilia_texto"><b>7.b</b> Subfamilia 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i>:
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="subfamilia_texto" maxlength="30" cols="35" rows="3">NULL</textarea>
	 </td>
	</tr>	

	<!-- **************
	Genero
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>8.a</b> Genero:';
		// define la variable
		$variable_name = 'genero';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Genero\" as result
					FROM especies 
					GROUP BY \"Genero\"
					ORDER BY \"Genero\";";

				 $qu = pg_query($db, $query);
			// add default
			echo "<option value =NULL>NULL</option>";
		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->result!="" & $data->result!="NULL")
			{
				echo "<option value = '".$data->result."'>".$data->result."</option>"; 
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

	<tr>
	 <td valign="top">
		<label for="genero_texto"><b>8.b</b> Genero 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i>:
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="genero_texto" maxlength="30" cols="35" rows="3">NULL</textarea>
	 </td>
	</tr>	

	<!-- **************
	Especie
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>9.a</b> Especie:';
		// define la variable
		$variable_name = 'especie';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Especie\" as result
					FROM especies 
					GROUP BY \"Especie\"
					ORDER BY \"Especie\";";
		 


		$qu = pg_query($db, $query);
			// add default
			echo "<option value =NULL>NULL</option>";
		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->result!="" & $data->result!="NULL")
			{
				echo "<option value = '".$data->result."'>".$data->result."</option>"; 
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
		<label for="especie_texto"><b>9.b</b> Especie 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i>:
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="especie_texto" maxlength="30" cols="35" rows="3">NULL</textarea>
	 </td>
	</tr>
	
	<!-- **************
	Autor
	****************-->
	
	<tr>
	 <td valign="top">
	  <label for="autor">
		  <span title="Ejemplo: Hamilton-Smith 1827">
			  <b>10.</b> Autor: 
		  </span> 	  
	  </label>
	 </td>
	 <td valign="top">
	  <input type="text" name="autor" maxlength="50" size="24" value=NULL>
	 </td>
	</tr>		

	<!-- **************
	Sinonimias
	****************-->
	
	<tr>
	 <td valign="top">
	  <label for="sinonimias">
		  <span title="Descripci&oacute;n: nombres con los que se ha identificado en el pasado">
			  <b>11.</b> Sinonimias: 
		  </span> 	 	  
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="sinonimias" maxlength="50" size="24" value=NULL>
	 </td>
	</tr>		

	<!-- **************
	Taxon_valido
	****************-->
	
	<tr>
	 <td valign="top">
	  <label for="taxon_valido"> 
		  <span title="Ejemplo: Bison Hamilton- Smith 1827">
			  <b>12.</b> Tax&oacute;n v&aacute;lido:
		  </span> 		  
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="taxon_valido" maxlength="50" size="24" value=NULL>
	 </td>
	</tr>		

	<!-- **************
	Nombre_espaniol
	****************-->
	
	<tr>
	 <td valign="top">
	  <label for="nombre_espaniol">
		  <span title="Ejemplo: bisonte">
			  <b>13.</b> Nombre espa&ntilde;ol: 
		  </span> 		  
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="nombre_espaniol" maxlength="50" size="24" value=NULL>
	 </td>
	</tr>		

	<!-- **************
	Nombre_ingles
	****************-->
	
	<tr>
	 <td valign="top">
	  <label for="nombre_ingles">
		  <span title="Ejemplo: bison">
			  <b>14.</b> Nombre ingl&eacute;s: 
		  </span> 		  
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="nombre_ingles" maxlength="50" size="24" value=NULL>
	 </td>
	</tr>

	<!-- **************
	Actividad
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>15.</b> Actividad:';
		// define la variable
		$variable_name = 'actividad';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Actividad\"  as result
					FROM t_actividad;";
		 		 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
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
	?>

	<!-- **************
	DIETA A
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>16.</b> Dieta A:';
		// define la variable
		$variable_name = 'dieta_a';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Dieta_A\"  as result
				  FROM t_dietaa;";


				  		 		 $qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
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
	?>
	

	<!-- **************
	DIETA B
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>17.</b> Dieta B:';
		// define la variable
		$variable_name = 'dieta_b';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Dieta_B\" as result FROM t_dietab;";
		

		$qu = pg_query($db, $query);
		while ($data = pg_fetch_object($qu)) 
		{
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
	?>
	

	<!-- **************
	Hab_Alim_A
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>18.</b> H&aacute;bito alimenticio A:';
		// define la variable
		$variable_name = 'hab_alim_a';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Hab_Alim_A\" as result FROM t_habalima;";
		
		$qu = pg_query($db, $query); 
		while ($data = pg_fetch_object($qu)) 
		{
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
	?>
	

	<!-- **************
	Hab_Alim_B
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>19.</b> H&aacute;bito alimenticio B:';
		// define la variable
		$variable_name = 'hab_alim_b';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Hab_Alim_B\" as result FROM t_habalimb;";
		 
		 $qu = pg_query($db, $query);
		while ($data = pg_fetch_object($qu)) 
		{
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
	?>

	<!-- **************
	Hab_Refugio
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>20.</b> H&aacute;bitat refugio:';
		// define la variable
		$variable_name = 'hab_refugio';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Hab_Refugio\" as result FROM t_habrefugio;";
		 
		 $qu = pg_query($db, $query);
		while ($data = pg_fetch_object($qu)) 
		{
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
	?>
	
	<!-- **************
	locomocion
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>21.</b> Locomocion:';
		// define la variable
		$variable_name = 'locomocion';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Locomocion\"  as result FROM t_locomocion;";
		 
		 $qu = pg_query($db, $query);
		while ($data = pg_fetch_object($qu)) 
		{
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
	?>




	<!-- **************
	status
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>22.</b> Status:';
		// define la variable
		$variable_name = 'status';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Status\" as result FROM t_status;";
		 $qu = pg_query($db, $query);
		while ($data = pg_fetch_object($qu)) 
		{
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
	?>



	</table>
	<table>
		
	<!-- **************
	Alojamiento
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>23.a</b> Alojamiento:';
		// define la variable
		$variable_name = 'alojamiento';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT \"Alojamiento\" as result 
				FROM t_alojamiento
				ORDER BY Alojamiento;";
		 
		 $qu = pg_query($db, $query);
		while ($data = pg_fetch_object($qu)) 
		{
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
		echo "<br>"; 
	?>	

	<tr>
	 <td valign="top">
		<label for="alojamiento_texto"><b>23.b</b> Alojamiento 
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
			  <b>23.c</b> Clave Alojamiento (<i>llenar solo en caso de que valor buscado no este en combo-box)</i>: 
		  </span> 
		</label>
	 </td>
	 <td valign="top">
	  <textarea  name="clave_alojamiento_texto" maxlength="50" cols="33" rows="1">NULL</textarea>
	 </td>
	</tr>	


	<!-- **************
	tipo_medidas
	****************-->
	<br>
	<br>
	<tr>
	 <td valign="top">
		<label for="tipo_medidas">
			  <b>24.</b> Seleccionar: 
		</label>
	 </td>
	 <td valign="top"> 
	 <select name="tipo_medidas">
	  <option value="tipo_materiales_catalogo">Capturar materiales cat&aacute;logo</option>		 
	  <option value="tipo_materiales_lote">Capturar materiales lote</option>
	 </select> </td>
	</tr>	



<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

<center>
	<tr>
	 <td colspan="2" style="text-align:center">
	  <br>
	  <br>
	  <input type="submit" value="Capturar materiales">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.html">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>

