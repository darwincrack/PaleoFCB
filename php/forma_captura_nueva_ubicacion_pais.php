<form name="Captura de datos" method="post" action="forma_captura_ubicacion_estado.php">
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
		// DESPLIEGA LAS INSTRUCCIONES
		require_once 'desplegar_id.php';
		require_once 'desplegar_contador.php';
		require_once 'instrucciones.php';
		require_once 'instrucciones_nota_2.php';
	?>
<!--********************************************************************
INSERTA LOS VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php
		// require_once 'insertar_valores_bibliografia.php';
	?>

<!--********************************************************************
EXTRAE VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php
		$region = $_POST['region'];
		$region_texto = $_POST['region_texto'];
	?>

<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>SELECCIONA EL PA&Iacute;S</h2>
	<!--**************************************-->

	<!-- **************
	Region 
	****************-->

	<?php
	
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($region=="NULL" & $region_texto!="NULL"){
			$region=$region_texto;
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_Region) as id_region 
					FROM paleo_fcb.t_region";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_region);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_region);
				}				
				$stmt->close();
			}
			// insertar nueva entrada
			$id_region_FK = $id_region + 1;
			$query = "INSERT INTO paleo_fcb.t_region 
					VALUES ('$id_region_FK','$region')";
			if ($stmt = $con->prepare($query)) {
				$stmt->execute();
			}					
		}		
	
	
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
		// sacar la FK de la region
		$query = "SELECT id_region as id_region_FK
				FROM paleo_fcb.t_region
				WHERE region = '$region';";		
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_region_FK);
			while ($stmt->fetch()) {
				// printf("%s\n", $id_region_FK);
			}				
			$stmt->close();
		}
		// nombre que se imprime en html
		$nombre_combo_box = '<b>2.a </b> Pa&iacute;s:';
		// define la variable
		$variable_name = 'pais';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT paleo_fcb.t_pais.pais as pais
				FROM paleo_fcb.ubicacion_completa, 
					paleo_fcb.t_pais
				WHERE  id_pais = paleo_fcb.ubicacion_completa.pais 
					AND paleo_fcb.ubicacion_completa.Region = '$id_region_FK'
				GROUP BY pais
				ORDER BY pais;";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($result);
			// add default
			echo "<option value =NULL>NULL</option>";
			echo "<option value ='No Disponible'>No Disponible</option>";		
			while ($stmt->fetch()) 
			 { 
				if($result!='No Disponible'){  
					echo "<option value = '".$result."'>".$result."</option>"; 
				}
			 }
			 echo "</select>"; 
			$stmt->close();
		}
		echo '</tr>'; 		
	?>	

	<br><br>
	
	<tr>
	 <td valign="top">
		<label for="pais_texto"><b>2.b </b> Pa&iacute;s 
			(<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		</label>
	 </td>
	 <td valign="top"> 
	  <textarea  name="pais_texto" maxlength="30" cols="35" rows="3">NULL</textarea>
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
	  <input type="submit" value="Seleccionar estado">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>


