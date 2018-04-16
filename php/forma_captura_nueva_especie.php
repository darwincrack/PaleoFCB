<form name="Captura de datos" method="post" action="forma_captura_especies_subclase.php">
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
	        echo "Error : " . $errormessage;
	        exit();
	    }
	?>
<!--********************************************************************
DESPLIEGUE DE INSTRUCCIONES
*********************************************************************-->
	<?php
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
INSERTA LOS VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php
		//// validation expected data exists
		//if(!isset($_POST['tipo_edad'])) {
			//die('We are sorry, but there appears to be a 
			//problem with the form you submitted.');		
		//}
		//// define el mensaje de error
		//require_once 'error_message.php';
		//$tipo_edad = $_POST['tipo_edad'];

		//if ($tipo_edad=='edad_continental')
		//{
			//// option 1
			//require_once 'insertar_valores_edad_continental.php';		
		//}else
		//{
			//// option 2
			//require_once 'insertar_valores_edad_maritima.php';		
		//}		
	?>

<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>CAPTURE LOS DATOS DE LA ESPECIE (CLASE)</h2>
	<!--**************************************-->

	<!-- **************
	Clase
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>1.a Clase: </b>
							</font>';
		// $nombre_combo_box = '<b>1.a</b> Clase:';
		// define la variable
		$variable_name = 'id_clase_FK';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 


		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT DISTINCT \"Clase\", \"id_Clase\", \"Autor\", \"Anio\" 
					FROM t_clase 
					ORDER BY \"Clase\";";




		$qu = pg_query($db, $query);
			echo "<option value =NULL>NULL</option>";
			echo "<option value =NULL>No Disponible</option>";
		while ($data = pg_fetch_object($qu)) 
		{
			if ($data->Clase!="" & $data->Clase!="NULL")
				 {
					if($clase!='No Disponible'){  
						echo "<option value = '".$data->id_Clase."'>".$data->Clase.' '.$data->Autor.' '.$data->Anio.' '."</option>"; 
					}
				 }

		}	
	 echo "</select>"; 
		 
		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($clase,$id_clase_FK,$autor,$anio);
			// add default
			echo "<option value =NULL>NULL</option>";
			echo "<option value =NULL>No Disponible</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($clase!="" & $clase!="NULL")
				 {
					if($clase!='No Disponible'){   
						echo "<option value = '".$id_clase_FK."'>".$clase.' '.$autor.' '.$anio.' '."</option>"; 
					}
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} */
	?>	

	<tr>
	 <td valign="top">
	  <label for="clase_texto">
		  <span title="Ejemplo: Actinopterygii">
			  <b>1.b</b> Clase
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="clase_texto" maxlength="60" size="50" value=NULL>
	 </td>
	</tr>	

	<tr>
	 <td valign="top">
	  <label for="clase_autor">
		  <span title="Ejemplo: Klein">
			  <b>1.c</b> Autor
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="clase_autor" maxlength="20" size="24" value=NULL>
	 </td>
	</tr>

	<tr>
	 <td valign="top">
	  <label for="clase_anio">
		  <span title="Ejemplo: 1885">
			  <b>1.d</b> A&ntilde;o
			  (<i>llenar solo en caso de que valor buscado no este en combo-box)</i> :
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="clase_anio" maxlength="4" size="1" value=NULL>
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
	  <input type="submit" value="Capturar subclase">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.html">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>

