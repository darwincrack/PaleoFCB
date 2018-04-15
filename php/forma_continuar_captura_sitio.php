<form name="Captura de datos" method="post" action="forma_captura_sitio.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->
<table>

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
	?>

<!--********************************************************************
DESPLIEGUE DE INSTRUCCIONES
*********************************************************************-->
    <?php
		require_once 'desplegar_id.php';
		require_once 'desplegar_contador.php';
        //require_once 'instrucciones.php';
    ?>
	<!--
    <font color ="FF0000">
        <strong>NOTA 2:</strong> Si quiere dar de alta una nueva especie, seleccione la acci&oacute;n 
        <strong>'Dar de alta una nueva especie'</strong> en el combo-box <strong>'2. Seleccionar Acci&oacute;n'</strong>.
		No es necesario que modifique el valor del combo-box <strong>'1.Especie'</strong>.
    </font>
	-->
	
<!--********************************************************************
INSERTA LOS VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php		
		
		if(!isset($_POST['ID_REF'])) {
			die('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		// define el mensaje de error
		require_once 'error_message.php';
		$ID_REF = $_POST['ID_REF'];
		
		if(!isset($_POST['tipo_accion'])) {
			die('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		// define el mensaje de error
		require_once 'error_message.php';

		$tipo_accion = $_POST['tipo_accion'];
		//echo $tipo_accion;

		$tipo_operacion = $_POST['tipo_accion'];

		
	?>

	<tr><td> <input type="hidden" name="tipo_accion" value="<?= $tipo_accion ?>" ></td></tr>
	<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>
	
	
<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>BUSCAR LA UBICACION PARA EL NUEVO SITIO</h2>
	<!--**************************************-->
	
	<!-- **************
	Localidad
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>1. Localidad: </b>
							</font>';
		// $nombre_combo_box = '<b>1. </b> Especie:';
		// define la variable
		$variable_name = 'id_Ubicacion';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 
		 
		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		echo $query = 'SELECT U."Localidad" as Localidad,
						 U."id_Ubicacion"
					FROM referenciabibliografica R 
						 JOIN hallazgo H ON R."id_ReferenciaBibliografica" = H."id_ReferenciaBibliografica"
						 JOIN ubicacion U ON H."id_ubicacion" = U."id_Ubicacion"
					WHERE R."id_ReferenciaBibliografica" ='.$ID_REF;

		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}


		echo "<option value =NULL>NULL</option>";
		while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
				 if ($row['id_Ubicacion']!="" & $row['id_Ubicacion']!="NULL")
				 {
					echo "<option value = '".$row['id_Ubicacion']."'>".$row['localidad']."</option>"; 
					     
				 }

		}
		echo "</select>"; 

		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($Localidad,$id_Ubicacion);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($id_Ubicacion!="" & $id_Ubicacion!="NULL")
				 {
				echo "<option value = '".$id_Ubicacion."'>".$Localidad."</option>"; 
					 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} */
	?>

</table>

<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->
<table>
<center>
	<tr>
	 <td colspan="2" style="text-align:center">
	  <br>
	  <br>
	  <input type="submit" value="Continuar">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>

