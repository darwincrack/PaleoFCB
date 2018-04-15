<form name="Captura de datos" method="post" action="forma_captura_edad_continental_glaciaciones.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->
<table width="600px">

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
		require_once 'instrucciones_nota_2.php';		
		// *****************************************************************
		// CARGAR FUNCIONES
		// *****************************************************************
		include("functions_lib.php");			
	?>



<!--********************************************************************
EXTRAE VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php
	// extrae valores del formulario
		// edad
		$tipo_edad = $_POST['tipo_edad'];
		// region
		// $id_region_FK = $_POST['id_region_FK'];
		// era
		$id_era_FK = $_POST['id_era_FK'];
		// periodo
		$id_periodo_FK = $_POST['id_periodo_FK'];
		// epoca
		$id_epoca_FK = $_POST['id_epoca_FK'];
		$epoca_texto = $_POST['epoca_texto'];
		// VALIDA LLAVE
		if($id_epoca_FK=='NULL' & $epoca_texto=='NULL')
		{
			// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
			$query = "SELECT id_epoca as llave
					  FROM paleo_fcb.t_epoca
					  WHERE epoca = 'No Disponible';";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($llave);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_ubicacion_FK);
				}				
				$stmt->close();
			}
			$id_epoca_FK=$llave;	
		}

		if(!isset($_POST['tipo_operacion'])) {
			died('We are sorry, but there appears to be a 
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
	<h2>CAPTURE LA EDAD CONTINENTAL (PISO FAUN&Iacute;STICO)</h2>
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
	  <option value="edad_continental">Edad Continental</option>		 
	 </select> </td>
	</tr>	
	
	<br><br>
	
	<!-- **************
	region
	****************-->	
	<?php
		// nombre que se imprime en html
		$nombre_combo_box = '<b>ii.</b> Regi&oacute;n: ';
		// define la variable
		$variable_name = 'id_region_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "
				SELECT 
					paleo_fcb.t_region.id_region as id_region_FK,
					paleo_fcb.t_region.region as region
				FROM 
					paleo_fcb.t_region 
				WHERE 
					paleo_fcb.t_region.id_region = 
					(SELECT 
						paleo_fcb.ubicacion.Region as id_region_FK 
					FROM 
						paleo_fcb.ubicacion
					WHERE
						paleo_fcb.ubicacion.id_Ubicacion = 
						(SELECT 
							MAX(paleo_fcb.hallazgo.id_ubicacion) 
						FROM 
							paleo_fcb.hallazgo));";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_region_FK,$region);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_region_FK."'>".$region."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}
		echo '</td>';
		echo '</tr>';
	?>
<br><br>
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
		$query = "SELECT 
						paleo_fcb.t_era.id_era as id_era_FK,
						paleo_fcb.t_era.era as era
					FROM 
						paleo_fcb.t_era
					WHERE 
						id_era = $id_era_FK;";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_era_FK,$era);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($era!="" & $era!="NULL")
				 {
				echo "<option value = '".$id_era_FK."'>".$era.''."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} 
	?>	
	<br><br>
	<!-- **************
	Periodo
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
		$query = "SELECT 
						paleo_fcb.t_periodo.id_periodo as id_periodo_FK,
						paleo_fcb.t_periodo.periodo as periodo
					FROM 
						paleo_fcb.t_periodo
					WHERE 
						id_periodo = $id_periodo_FK;";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_periodo_FK,$periodo);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($periodo!="" & $periodo!="NULL")
				 {
				echo "<option value = '".$id_periodo_FK."'>".$periodo.''."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} 
	?>		
<br><br>
	<!-- **************
	Epoca
	****************-->

	<?php
		// revisa si se tiene que hacer un insert en 
		// la tabla con un nuevo registro
		if ($id_epoca_FK=="NULL" & $epoca_texto!="NULL")
		{
			// extrae el ultimo valor del ID en tabla
			$query = "SELECT MAX(id_epoca) as id_epoca_FK 
						FROM paleo_fcb.t_epoca;";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_epoca_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_epoca_FK);
				}				
				$stmt->close();
			}
			// suma uno al max key
			$id_epoca_FK = check_key($id_epoca_FK);
			// INSERTA LOS VALORES
			$query = "INSERT INTO paleo_fcb.t_epoca 
						VALUES ('$id_epoca_FK','$epoca_texto');";	
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}
		}
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
		$query = "SELECT 
						paleo_fcb.t_epoca.id_epoca as id_epoca_FK,
						paleo_fcb.t_epoca.epoca as epoca
					FROM 
						paleo_fcb.t_epoca
					WHERE 
						id_epoca = $id_epoca_FK;";
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_epoca_FK,$epoca);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($epoca!="" & $epoca!="NULL")
				 {
				echo "<option value = '".$id_epoca_FK."'>".$epoca.''."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} 
	?>	
	<br><br>
	<!-- **************
	piso_faunistico
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>4.a </b> Piso faun&iacute;stico: ';
		// define la variable
		$variable_name = 'id_piso_faunistico_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT 
					paleo_fcb.t_pisofaunistico.id_pisofaunistico as id_piso_faunistico_FK,
					paleo_fcb.t_pisofaunistico.pisoFaunistico as piso_faunistico
				FROM 
					paleo_fcb.t_pisofaunistico
				WHERE 
					id_pisofaunistico IN 
					(SELECT DISTINCT 
						paleo_fcb.edadescontinentalescompleta.pisoFaun
					FROM 
						paleo_fcb.edadescontinentalescompleta
					WHERE 
						paleo_fcb.edadescontinentalescompleta.region = $id_region_FK);";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_piso_faunistico_FK,$piso_faunistico);
			// add default
			echo "<option value =NULL>NULL</option>";
			echo "<option value =NULL>No Disponible</option>";				
			while ($stmt->fetch()) 
			 { 
				if($piso_faunistico!='No Disponible'){
					echo "<option value = '".$id_piso_faunistico_FK."'>".$piso_faunistico."</option>"; 
				}
			 }
			 echo "</select>"; 
			$stmt->close();
		}
		echo '</td>';
		echo '</tr>';
	?>
<br><br>
	<tr>
	 <td valign="top">
	  <label for="piso_faunistico_texto">
		  <span title="">
			 <b>4.b </b> Piso faun&iacute;stico
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="piso_faunistico_texto" maxlength="30" size="24" value=NULL>
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
	  <input type="submit" value="Capturar periodo glacial">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>
