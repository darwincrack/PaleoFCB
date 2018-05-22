<?php include("post_data_informacion.php"); ?>
<form name="Captura de datos" method="post" action="forma_captura_especies_existente.php">
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
		// piso_faunistico
		$id_piso_faunistico_FK = $_POST['id_piso_faunistico_FK'];
		// glacial_interglacial
		$id_glacial_interglacial_FK = $_POST['id_glacial_interglacial_FK'];
		// estadio
		$id_estadio_FK = $_POST['id_estadio_FK'];
		$estadio_texto = $_POST['estadio_texto'];
		// VALIDA LLAVE
		if($id_estadio_FK=='NULL' & $estadio_texto=='NULL')
		{
			// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
			$query = "SELECT id_estadios as llave
					  FROM t_estadios
					   WHERE estadios = 'No Disponible';";
			
			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
			  $id_estadio_FK= $data->llave;
			}


			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($llave);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_ubicacion_FK);
				}				
				$stmt->close();
			}
			$id_estadio_FK=$llave;	*/
		}			

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
	<h2>CAPTURE LA EDAD CONTINENTAL</h2>
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

			while ($data = pg_fetch_object($qu)) 
			{
			  $id_ubicacion_PK= $data->id_region_fk;
			  echo "<option value = '".$data->id_region_fk."'>".$data->region."</option>"; 

			}					
		 	echo "</select>"; 
		 
		/*if ($stmt = $con->prepare($query)) {
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
						t_era.id_era as id_era_fk,
						t_era.era as era
					FROM 
						t_era
					WHERE 
						id_era = $id_era_FK;";


			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
				if ($data->era!="" & $data->era!="NULL")
				 {
			  		echo "<option value = '".$data->id_era_fk."'>".$data->era."</option>";
			  	 } 

			}					
		 	echo "</select>"; 


	/*	if ($stmt = $con->prepare($query)) {
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
		} */
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
						t_periodo.id_periodo as id_periodo_fk,
						t_periodo.periodo as periodo
					FROM 
						t_periodo
					WHERE 
						id_periodo = $id_periodo_FK;";

		$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
				if ($data->periodo!="" & $data->periodo!="NULL")
				{
					echo "<option value = '".$data->id_periodo_fk."'>".$data->periodo."</option>"; 
				}
			 
			}					
		 	echo "</select>"; 


		/*if ($stmt = $con->prepare($query)) {
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
		} */
	?>		
	
	<br><br>


	<!-- **************
	Epoca
	****************-->
	<?php

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
						t_epoca.id_epoca as id_epoca_fk,
						t_epoca.epoca as epoca
					FROM 
						t_epoca
					WHERE 
						id_epoca = $id_epoca_FK;";


		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{

			if ($data->epoca!="" & $data->epoca!="NULL")
			{
				echo "<option value = '".$data->id_epoca_fk."'>".$data->epoca.''."</option>"; 

			}


		}	
			 echo "</select>";

		/*if ($stmt = $con->prepare($query)) {
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
		} */
	?>		
	
	<br><br>


	<!-- **************
	piso_faunistico
	****************-->
	<?php
		// revisa si se tiene que hacer un insert en 
		// la tabla con un nuevo registro
		//if ($id_piso_faunistico_FK=="NULL" & $piso_faunistico_texto!="NULL")
		//{
			//// extrae el ultimo valor del ID en tabla
			//$query = "SELECT MAX(id_pisofaunistico) as id_piso_faunistico_FK 
						//FROM paleo_fcb.t_pisofaunistico;";
			//if ($stmt = $con->prepare($query)) {
				//$stmt->execute();
				//$stmt->bind_result($id_piso_faunistico_FK);
				//while ($stmt->fetch()) {
					//// printf("%s\n", $id_piso_faunistico_FK);
				//}				
				//$stmt->close();
			//}
			//// suma uno al max key
			//$id_piso_faunistico_FK = check_key($id_piso_faunistico_FK);
			//// INSERTA LOS VALORES
			//$query = "INSERT INTO paleo_fcb.t_pisofaunistico 
						//VALUES ('$id_piso_faunistico_FK','$piso_faunistico_texto');";	
			//if ($stmt = $con->prepare($query)) {
				//$stmt->execute();
			//}
		//}
		// nombre que se imprime en html
		$nombre_combo_box = '<b>4.</b> Piso faun&iacute;stico: ';
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
						t_pisofaunistico.id_pisofaunistico as id_piso_faunistico_fk,
						t_pisofaunistico.\"pisoFaunistico\" as piso_faunistico
					FROM 
						t_pisofaunistico
					WHERE 
						id_pisofaunistico = $id_piso_faunistico_FK;";


		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{

		  	if ($data->piso_faunistico!="" & $data->piso_faunistico!="NULL")
				 {
				echo "<option value = '".$data->id_piso_faunistico_fk."'>".$data->piso_faunistico.''."</option>"; 
				 }

		}	
 		echo "</select>"; 


		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_piso_faunistico_FK,$piso_faunistico);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($piso_faunistico!="" & $piso_faunistico!="NULL")
				 {
				echo "<option value = '".$id_piso_faunistico_FK."'>".$piso_faunistico.''."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} */
	?>	

	<br><br>


	<!-- **************
	glacial_interglacialssss
	****************-->
	<?php
		// revisa si se tiene que hacer un insert en 
		// la tabla con un nuevo registro
		//if ($id_glacial_interglacial_FK=="NULL" & $glacial_interglacial!="NULL")
		//{
			//// extrae el ultimo valor del ID en tabla
			//$query = "SELECT MAX(id_glacialinterglacial) as id_glacial_interglacial_FK 
						//FROM paleo_fcb.t_glacialinterglacial;";
			//if ($stmt = $con->prepare($query)) {
				//$stmt->execute();
				//$stmt->bind_result($id_glacial_interglacial_FK);
				//while ($stmt->fetch()) {
					//// printf("%s\n", $id_glacial_interglacial_FK);
				//}				
				//$stmt->close();
			//}
			//// suma uno al max key
			//$id_glacial_interglacial_FK = check_key($id_glacial_interglacial_FK);
			//// INSERTA LOS VALORES
			//$query = "INSERT INTO paleo_fcb.t_glacialinterglacial 
						//VALUES ('$id_glacial_interglacial_FK','$glacial_interglacial');";	
			//if ($stmt = $con->prepare($query)) {
				//$stmt->execute();
			//}
		//}
		// nombre que se imprime en html
		$nombre_combo_box = '<b>5.</b> Periodo Glacial: ';
		// define la variable
		$variable_name = 'id_glacial_interglacial_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT 
						t_glacialinterglacial.id_glacialinterglacial as id_glacial_interglacial_fk,
						t_glacialinterglacial.idgi as glacial_interglacial
					FROM 
						t_glacialinterglacial
					WHERE 
						id_glacialinterglacial = $id_glacial_interglacial_FK;";

echo $query;

		$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{

		  	if ($data->glacial_interglacial!="" & $data->glacial_interglacial!="NULL")
				 {
				echo "<option value = '".$data->id_glacial_interglacial_fk."'>".$data->glacial_interglacial.''."</option>"; 
				 }

		}	
 		echo "</select>"; 


	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_glacial_interglacial_FK,$glacial_interglacial);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($glacial_interglacial!="" & $glacial_interglacial!="NULL")
				 {
				echo "<option value = '".$id_glacial_interglacial_FK."'>".$glacial_interglacial.''."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} */
	?>	
		

	<br><br>


	<!-- **************
	estadio
	****************-->
	<?php
		// revisa si se tiene que hacer un insert en 
		// la tabla con un nuevo registro
		if ($id_estadio_FK=="NULL" & $estadio_texto!="NULL")
		{
			// extrae el ultimo valor del ID en tabla
			$query = "SELECT MAX(id_estadios) as id_estadio_fk
						FROM t_estadios;";

			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
			  $id_estadio_FK= $data->id_estadio_fk;
			}	




			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_estadio_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_estadio_FK);
				}				
				$stmt->close();
			}*/
			// suma uno al max key
			$id_estadio_FK = check_key($id_estadio_FK);
			// INSERTA LOS VALORES
			$query = "INSERT INTO t_estadios 
						VALUES ('$id_estadio_FK','$estadio_texto');";


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
		// nombre que se imprime en html
		$nombre_combo_box = '<b>6.a </b> Estad&iacute;o: ';
		// define la variable
		$variable_name = 'id_estadio_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT 
						t_estadios.id_estadios as id_estadio_FK,
						t_estadios.estadios as estadio
					FROM 
						t_estadios
					WHERE 
						id_estadios = $id_estadio_FK;";

			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
				 if ($data->estadio!="" & $data->estadio!="NULL")
				 {
				echo "<option value = '".$data->id_estadio_fk."'>".$data->estadio.''."</option>"; 
				 }
			}
			echo "</select>"; 	

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_estadio_FK,$estadio);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($estadio!="" & $estadio!="NULL")
				 {
				echo "<option value = '".$id_estadio_FK."'>".$estadio.''."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} */
	?>	


	<br><br>


	
	<!-- **************
	gli_duracion
	****************-->

	<tr>
	 <td valign="top">
	  <label for="gli_duracion">
		  <span title="Ejemplo: 100000000">
			  <b>7.</b> GL-I_duraci&oacute;n: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="gli_duracion" maxlength="40" size="6" value=0>
	 </td>
	</tr>
	<br>

	<br><br>


	<!-- **************
	fauna_local
	****************-->

	<tr>
	 <td valign="top">
	  <label for="fauna_local">
		  <span title="Descripci&oacute;n: Nombre faun&iacute;stico com&uacute;n que recibe el dep&oacute;sito">
			  <b>8.</b> Fauna local: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="fauna_local" maxlength="40" size="40" value=NULL>
	 </td>
	</tr>
	<br>


	<br><br>


	<!-- **************
	edad_cultural
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>9.</b> Edad cultural: ';
		// define la variable
		$variable_name = 'id_edad_cultural_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM t_edadcultural;";

					$qu = pg_query($db, $query);
echo $query;
			while ($data = pg_fetch_object($qu)) 
			{
				
				echo "<option value = '".$data->id_edadcultural."'>".$data->edadcultural.' ( '.$data->temporalidad.' ) '."</option>"; 
				 
			}
			echo "</select>"; 
		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_edad_cultural,$edad_cultural,$edad_cultural_extra);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_edad_cultural."'>".$edad_cultural.' ( '.$edad_cultural_extra.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>
	
	<br><br>



	<!-- **************
	isotopo
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>10.</b> Isotopo: ';
		// define la variable
		$variable_name = 'id_isotopo_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT id_isotopo,isotopo
				FROM t_isotopo;";
		 



			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
				
			echo "<option value = '".$data->id_isotopo."'>".$data->isotopo."</option>"; 

				 
			}
			echo "</select>"; 

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_isotopo,$isotopo);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_isotopo."'>".$isotopo."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>
	
	<br><br>


	<!-- **************
	magnetocron
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>11.</b> Magnetocron: ';
		// define la variable
		$variable_name = 'id_magnetocron_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM t_magnetocron;";


			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
				
				echo "<option value = '".$data->id_magnetocron."'>".$data->idmag.' ( '.$data->magnetocron.' ) '."</option>"; 
				 
			}
			echo "</select>"; 
		 

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_magnetocron,$magnetocron,$magnetocron_extra);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_magnetocron."'>".$magnetocron.' ( '.$magnetocron_extra.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>

	<br><br>


	<!-- **************
	metodo_fechamiento
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>12.</b> M&eacute;todo de fechamiento: ';
		// define la variable
		$variable_name = 'id_metodo_fechamiento_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM t_metodofechamiento;";



			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
				
				echo "<option value = '".$data->id_metodoFechamiento."'>".$data->metodofechamiento_clave.' ( '.$data->metodofechamiento.' ) '."</option>"; 
				 
			}
			echo "</select>"; 
		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_metodo_fechamiento,$metodo_fechamiento,$metodo_fechamiento_extra);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_metodo_fechamiento."'>".$metodo_fechamiento.' ( '.$metodo_fechamiento_extra.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>

	<br><br>


	<!-- **************
	material_fechado
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>13.</b> Material fechado: ';
		// define la variable
		$variable_name = 'id_material_fechado_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT * FROM t_materialfechado;";
		 

		 	$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{
				
				echo "<option value = '".$data->id_materialfechado."'>".$data->idmf.' ( '.$data->materialFechado.' ) '."</option>"; 
				 
			}
			echo "</select>"; 



	/*	if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_material_fechado,$material_fechado,$material_fechado_extra);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$id_material_fechado."'>".$material_fechado.' ( '.$material_fechado_extra.' ) '."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
	?>

	<br><br>


	<!-- **************
	no_muestra
	****************-->

	<tr>
	 <td valign="top">
	  <label for="no_muestra">
		  <span title="Descripci&oacute;n: clave de entrada al laboratorio">
			  <b>14.</b> No. de muestra: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="no_muestra" maxlength="45" size="40" value=NULL>
	 </td>
	</tr>

	<br><br>


	<!-- **************
	laboratorio
	****************-->

	<tr>
	 <td valign="top">
	  <label for="laboratorio">
		  <span title="Descripci&oacute;n: Nombre del laboratorio que realiz&oacute; fechado">
			  <b>15.</b> Laboratorio: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="laboratorio" maxlength="40" size="40" value=NULL>
	 </td>
	</tr>

	<br><br>


	<!-- **************
	edad_unidad_analisis
	****************-->

	<tr>
	 <td valign="top">
	  <label for="edad_unidad_analisis">
		  <span title="Descripci&oacute;n: miles o millones de a&ntilde;os; 500000000">
			  <b>16.</b> Edad unidad de an&aacute;lisis: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="edad_unidad_analisis" maxlength="11" size="5" value=0>
	 </td>
	</tr>


<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

<tr><td> <input type="hidden" name="tipo_accion" value="<?= 'edadgliduracion' ?>" ></td></tr>


<center>
	<tr>
	 <td colspan="2" style="text-align:center">
	  <br>
	  <br>
	  <input type="submit" value="Capturar datos de la especie">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>
