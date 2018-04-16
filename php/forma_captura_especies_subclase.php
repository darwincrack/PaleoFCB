<form name="Captura de datos" method="post" action="forma_captura_especies_orden.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->
<table width="800px">

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
	        echo "Error 0: " . $errormessage;
	        exit();
	    }	
	?>
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
EXTRAE VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php
	// extrae valores del formulario
		$id_clase_FK = $_POST['id_clase_FK'];
		$clase_texto = $_POST['clase_texto'];
		$clase_autor = $_POST['clase_autor'];
		$clase_anio = $_POST['clase_anio'];
		// VALIDA LLAVE
		// no hay entrada nueva, el usuario le puso NULL
		// y se le asignara el valor No Disponible el cual
		// ya existe y por ende no es necesario hacer inserciones 
		// nuevas
		if($id_clase_FK=='NULL' & $clase_texto=='NULL')
		{
			// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
			$query = "SELECT id_Clase as llave
					  FROM t_clase
					  WHERE Clase = 'No Disponible';";
					$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_clase_FK= $data->llave;
		}


			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($llave);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_ubicacion_FK);
				}				
				$stmt->close();
			}
			$id_clase_FK=$llave;*/
		// se requiere hacer una nueva insercion
		}else
		{
			require_once 'insertar_valores_especies_clase.php';
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
	<h2>CAPTURE LOS DATOS DE LA ESPECIE (SUBCLASE)</h2>
	<!--**************************************-->

	<!-- **************
	Clase 
	****************-->
	<?php
		// en dado caso que el valor NO este en el combo box
		// y se tenga que agregar una nueva entrada
		if ($id_clase_FK=="NULL" & $clase_texto!="NULL"){
			// extrae la llave de la ultima insercion que sera la FK
			// de la tabla de referencias
			$query = "SELECT MAX(id_Clase) as id_clase_fk 
					FROM t_clase";


					$qu = pg_query($db, $query);

		while ($data = pg_fetch_object($qu)) 
		{
		  $id_clase_FK= $data->id_clase_fk;
		}



		/*	if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_clase_FK);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_clase_FK);
				}				
				$stmt->close();
			}	*/			
		}
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



		/*if ($stmt = $con->prepare($query)) {
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
		}*/
	?>

	<br><br>
	
	<!-- **************
	Subclase
	****************-->
	<?php
		$nombre_combo_box = '<font color ="3b5998">
								<b>2.a Subclase: </b>
							</font>';
		// define la variable
		$variable_name = 'subclase';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT DISTINCT especies.Subclase  as result
				FROM especies
				WHERE especies.id_Clase = $id_clase_FK;";
		 

		 		 $qu = pg_query($db, $query);
			// add default
			echo "<option value =NULL>NULL</option>";
			echo "<option value =NULL>No Disponible</option>";
		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->result!="" & $data->result!="NULL")
			{
				if($data->result!='No Disponible'){  
					echo "<option value = '".$data->result."'>".$data->result."</option>"; 
				}
			}	
		}	
		echo "</select>"; 



		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($result);
			// add default
			echo "<option value =NULL>NULL</option>";
			echo "<option value =NULL>No Disponible</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($result!="" & $result!="NULL")
				 {
					if($result!='No Disponible'){  
						echo "<option value = '".$result."'>".$result."</option>";  
					}
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		}*/
		echo '</td>';
		echo '</tr>';
		//echo "<br>"; 
	?>	

	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="subclase_texto">
		  <span title="Ejemplo: Labyrinthodontia">
			  <b>2.b</b> Subclase
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="subclase_texto" maxlength="60" size="50" value=NULL>
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
	  <input type="submit" value="Capturar orden">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>

