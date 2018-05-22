<?php include("post_data_informacion.php"); ?>
<form name="Captura de datos" method="post" action="forma_captura_edad_continental_periodo.php">
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

		if(!isset($_POST['tipo_operacion'])) {
			die('We are sorry, but there appears to be a 
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
	<h2>CAPTURE LA EDAD CONTINENTAL (ERA)</h2>
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
	regionOOOO
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
					t_region.id_region as id_region_fk,
					t_region.region as region
				FROM 
					t_region 
				WHERE 
					t_region.id_region = 
					(SELECT 
						ubicacion.\"Region\" as id_region_fk 
					FROM 
						ubicacion
					WHERE
						ubicacion.\"id_Ubicacion\" = 
						(SELECT 
							MAX(hallazgo.id_ubicacion) 
						FROM 
							hallazgo));";

			$qu = pg_query($db, $query);


echo $query;
			while ($data = pg_fetch_object($qu)) 
			{
			  $id_ubicacion_PK= $data->id_ubicacion_pk;
			  echo "<option value = '".$data->id_region_fk."'>".$data->region."</option>"; 

			}
			echo "</select>"; 



				/*	if ($stmt = $con->prepare($query)) {
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
		}*/
		echo '</td>';
		echo '</tr>';
	?>
		<br><br>
	<!-- **************
	era
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>1. </b> Era: ';
		// define la variable
		$variable_name = 'id_era_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT id_era as id_era_fk,
						era as era
				FROM t_era as era;";



			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
			echo "<option value = '".$data->id_era_fk."'>".$data->era."</option>"; 
			}
 			echo "</select>"; 
		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		// SI SE DESEA QUE SEA DEPENDIENDO DE LA REGION
		//$query = "SELECT 
					//paleo_fcb.t_era.id_era as id_era_fk,
					//paleo_fcb.t_era.era as era
				//FROM 
					//paleo_fcb.t_era
				//WHERE 
					//id_era IN 
					//(SELECT DISTINCT 
						//paleo_fcb.edadescontinentalescompleta.era 
					//FROM 
						//paleo_fcb.edadescontinentalescompleta
					//WHERE 
						//paleo_fcb.edadescontinentalescompleta.region = $id_region_FK);";
		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_era_FK,$era);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_era_FK."'>".$era."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>
	

<!--
	<tr>
	 <td valign="top">
	  <label for="era_texto">
		  <span title="Ejemplo: Cenozoico">
			 <b>1.b</b> Era 
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="era_texto" maxlength="30" size="24" value=NULL>
	 </td>
	</tr>	
-->
	

<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

<center>
	<tr>
	 <td colspan="2" style="text-align:center">
	  <br>
	  <br>
	  <input type="submit" value="Capturar periodo">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>
