<form name="Captura de datos" method="post" action="bifurcacion_especies_a_materiales.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->
<table width="1000px">

<!--********************************************************************
CONECTARSE A LA BASE DE DATOS
*********************************************************************-->
	<?php
		// connect to database
		require_once 'dbconfig.php';
		// check connection
		$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
			or die ('Could not connect to the database server' . mysqli_connect_error());
	?>
<!--********************************************************************
DESPLIEGUE DE INSTRUCCIONES
*********************************************************************-->
	<?php
		require_once 'desplegar_id.php';
		require_once 'desplegar_contador.php';
		require_once 'instrucciones.php';
	?>
	<font color ="e8702a">
		<strong>NOTA 3:</strong> En los campos 16 (Dieta A) al campo 21 (Locomoci&oacute;n), 
		si <strong>NO conoce</strong> o <strong>NO desea</strong> dar de alta valores nuevos
		para estos campos. <strong>seleccione</strong> la opci&oacute;n <strong>NO Disponible</strong>
		en el combo-box (campos con sufijos 'a') y <strong>NO modifique</strong> los campos con sufijos 'b' y 'c'.
	</font>
<!--********************************************************************
INSERTA LOS VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php
	// extrae valores del formulario
		// clase
		$id_clase_FK = $_POST['id_clase_FK'];
		$subclase = $_POST['subclase'];
		// orden
		$id_orden_FK = $_POST['id_orden_FK'];
		$suborden = $_POST['suborden'];
		$infraorden = $_POST['infraorden'];	
		// familia
		$id_familia_FK = $_POST['id_familia_FK'];
		$subfamilia = $_POST['subfamilia'];
		// Genero
		$genero = $_POST['genero'];
		// especie
		$especie = $_POST['especie'];
		$especie_texto = $_POST['especie_texto'];		

		if(!isset($_POST['tipo_operacion'])) {
			died('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		$tipo_operacion = $_POST['tipo_operacion'];

	?>
	
	<tr><td> <input type="hidden" name="tipo_accion" value="<?= 'nueva_especie' ?>" ></td></tr>	
	<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>

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
		$nombre_combo_box = '<font color ="3b5998">
								<b>1. Clase: </b>
							</font>';
		// define la variable
		$variable_name = 'id_clase_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT Clase, id_Clase, Autor, Anio 
					FROM paleo_fcb.t_clase 
					WHERE id_Clase = $id_clase_FK;";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($clase,$id_clase_FK,$autor,$anio);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($clase!="" & $clase!="NULL")
				 {
				echo "<option value = '".$id_clase_FK."'>".$clase.' '.$autor.' '.$anio.' '."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		}
	?>

	<br><br>
	
	<!-- **************
	subclase 
	****************-->
	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>2. Subclase: </b>
							</font>';
		// define la variable
		$variable_name = 'subclase';
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$subclase."'>".$subclase."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>

	<br><br>
	
	<!-- **************
	Orden
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>3. Orden: </b>
							</font>';
		// define la variable
		$variable_name = 'id_orden_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT Orden, id_Orden, Autor, Anio 
					FROM paleo_fcb.t_orden
					WHERE id_Orden = $id_orden_FK;";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($orden,$id_orden_FK,$autor,$anio);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($orden!="" & $orden!="NULL")
				 {
				echo "<option value = '".$id_orden_FK."'>".$orden.' '.$autor.' '.$anio.' '."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} 
	?>	

	<br><br>
	
	<!-- **************
	Suborden
	****************-->
	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>4. Suborden: </b>
							</font>';
		// define la variable
		$variable_name = 'suborden';
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$suborden."'>".$suborden."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>

	<br><br>

	<!-- **************
	Infraorden
	****************-->
	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>5. Infraorden: </b>
							</font>';		
		// define la variable
		$variable_name = 'infraorden';
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$infraorden."'>".$infraorden."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>	

	<br><br>
	
	<!-- **************
	Familia
	****************-->
	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>6. Familia: </b>
							</font>';			
		// define la variable
		$variable_name = 'id_familia_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT Familia, id_familia, Autor, Anio 
					FROM paleo_fcb.t_familia
					WHERE id_familia = $id_familia_FK;";

		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($familia,$id_familia_FK,$autor,$anio);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($familia!="" & $familia!="NULL")
				 {
				echo "<option value = '".$id_familia_FK."'>".$familia.' '.$autor.' '.$anio.' '."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} 
	?>	
	
	<br><br>

	<!-- **************
	Subfamilia
	****************-->
	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>7. Subfamilia: </b>
							</font>';		
		// define la variable
		$variable_name = 'subfamilia';
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$subfamilia."'>".$subfamilia."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>	
	
	<br><br>

	<!-- **************
	Genero
	****************-->
	<?php
		//  revisa si el usuario desea agregar un nuevo campo
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>8. Genero: </b>
							</font>';		
		// define la variable
		$variable_name = 'genero';
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$genero."'>".$genero."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>	

	<br><br>
	
	<!-- **************
	Especie
	****************-->
	<?php
		//  revisa si el usuario desea agregar un nuevo campo
		if ($especie=="NULL" & $especie_texto!="NULL"){$especie=$especie_texto;}
		if ($especie=="NULL" & $especie_texto=="NULL"){$especie='No Disponible';}
			
		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>9. Especie: </b>
							</font>';		
		// define la variable
		$variable_name = 'especie';
		echo '<tr>';
		echo '<td valign="top">';
		echo '<label for="comments">'.$nombre_combo_box.'</label>';
		echo '</td>';
		echo '<td valign="top">';
		echo '<select name='.$variable_name.'>'; 
		echo "<option value = '".$especie."'>".$especie."</option>"; 
		echo "</select>"; 
		echo '</tr>'; 
	?>	

	<br><br>
	
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

	<br><br>
	
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

	<br><br>
	
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
	
	<br><br>

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
	
	<br><br>

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
	
	<br><br>

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
		$query = "SELECT Actividad 
					FROM paleo_fcb.t_actividad;";
		 
		if ($stmt = $con->prepare($query)) {
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
		}
	?>
	
	<br><br>

	<!-- **************
	DIETA A
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>16.a</b> Dieta A:';
		// define la variable
		$variable_name = 'dieta_a';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * 
				  FROM paleo_fcb.t_dietaa;";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($key,$clave,$result);
			// add default
			echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result.' ('.$clave.') '."</option>"; 				 
			 }
			 echo "</select>"; 
			$stmt->close();
		}
	?>
	
	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="dieta_a_texto">
		  <span title="Ejemplo: omnivoro">
			 <b>16.b </b> Dieta A
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="dieta_a_texto" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>	
	
	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="dieta_a_clave">
		  <span title="Ejemplo: o">
			 <b>16.c </b> Dieta A (clave)
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="dieta_a_clave" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>	
	
	<br><br>
	
	<!-- **************
	DIETA B
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>17.a</b> Dieta B:';
		// define la variable
		$variable_name = 'dieta_b';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM paleo_fcb.t_dietab;";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($key,$clave,$result);
			// add default
			echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result.' ('.$clave.') '."</option>"; 				 
			 }
			 echo "</select>"; 
			$stmt->close();
		}
	?>
	
	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="dieta_b_texto">
		  <span title="Ejemplo: ramoneador">
			 <b>17.b </b> Dieta B
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="dieta_b_texto" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>	
	
	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="dieta_b_clave">
		  <span title="Ejemplo: ra">
			 <b>17.c </b> Dieta B (clave)
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="dieta_b_clave" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>	
	
	<br><br>
	
	<!-- **************
	Hab_Alim_A
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>18.a</b> H&aacute;bito alimenticio A:';
		// define la variable
		$variable_name = 'hab_alim_a';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM paleo_fcb.t_habalima;";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($key,$clave,$result);
			// add default
			echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result.' ('.$clave.') '."</option>"; 				 
			 }
			 echo "</select>"; 
			$stmt->close();
		}
	?>
	
	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="hab_alim_a_texto">
		  <span title="terrestre">
			 <b>18.b </b> H&aacute;bito alimenticio A
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="hab_alim_a_texto" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>	
			
	<br><br>
			
	<tr>
	 <td valign="top">
	  <label for="hab_alim_a_clave">
		  <span title="te">
			 <b>18.c </b> H&aacute;bito alimenticio A (clave)
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="hab_alim_a_clave" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>	
		
	<br><br>

	<!-- **************
	Hab_Alim_B
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>19.a</b> H&aacute;bito alimenticio B:';
		// define la variable
		$variable_name = 'hab_alim_b';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 


		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM paleo_fcb.t_habalimb;";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($key,$clave,$result);
			// add default
			echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result.' ('.$clave.') '."</option>"; 				 
			 }
			 echo "</select>"; 
			$stmt->close();
		}
	?>
	
	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="hab_alim_b_texto">
		  <span title="suelo">
			 <b>19.b </b> H&aacute;bito alimenticio B
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="hab_alim_b_texto" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>	
		
	<br><br>
		
	<tr>
	 <td valign="top">
	  <label for="hab_alim_b_clave">
		  <span title="su">
			 <b>19.c </b> H&aacute;bito alimenticio B (clave)
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="hab_alim_b_clave" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>	
	
	<br><br>

	<!-- **************
	Hab_Refugio
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>20.a</b> H&aacute;bitat refugio:';
		// define la variable
		$variable_name = 'hab_refugio';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM paleo_fcb.t_habrefugio;";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($key,$clave,$result);
			// add default
			echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result.' ('.$clave.') '."</option>"; 				 
			 }
			 echo "</select>"; 
			$stmt->close();
		}
	?>
	
	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="hab_refugio_texto">
		  <span title="cueva">
			 <b>20.b </b> H&aacute;bitat refugio
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="hab_refugio_texto" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>	
			
	<br><br>
			
	<tr>
	 <td valign="top">
	  <label for="hab_refugio_clave">
		  <span title="cv">
			 <b>20.c </b> H&aacute;bitat refugio (clave)
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="hab_refugio_clave" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>	

	<br><br>
	
	<!-- **************
	locomocion
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>21.a</b> Locomocion:';
		// define la variable
		$variable_name = 'locomocion';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM paleo_fcb.t_locomocion;";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($key,$clave,$result);
			// add default
			echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result.' ('.$clave.') '."</option>"; 				 
			 }
			 echo "</select>"; 
			$stmt->close();
		}
	?>
	
	<br><br>

	<tr>
	 <td valign="top">
	  <label for="locomocion_texto">
		  <span title="vuelo">
			 <b>21.b </b> Locomocion
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="locomocion_texto" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>

	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="locomocion_clave">
		  <span title="v">
			 <b>21.c </b> Locomocion (clave)
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="locomocion_clave" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>
	
	<br><br>
	
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
		$query = "SELECT Status FROM paleo_fcb.t_status;";
		 
		if ($stmt = $con->prepare($query)) {
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
		}
	?>

	<br><br>

	<!-- **************
	tipo_medidas
	****************-->
	<br>
	<br>
	<tr>
	 <td valign="top">
		<label for="tipo_medidas">
			  <b>23.</b> Seleccionar: 
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
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>

