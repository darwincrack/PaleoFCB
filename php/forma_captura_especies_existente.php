<?php include("post_data_informacion.php"); ?>
<form name="Captura de datos" method="post" action="bifurcacion_nuevaEspecie_o_materialCatalogo.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->
<table>

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
    ?>
    <font color ="FF0000">
        <strong>NOTA 2:</strong> Si quiere dar de alta una nueva especie, seleccione la acci&oacute;n 
        <strong>'Dar de alta una nueva especie'</strong> en el combo-box <strong>'2. Seleccionar Acci&oacute;n'</strong>.
		No es necesario que modifique el valor del combo-box <strong>'1.Especie'</strong>.
    </font>

<!--********************************************************************
INSERTA LOS VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php		
		
		if(!isset($_POST['tipo_accion'])) {
			die('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		// define el mensaje de error
		require_once 'error_message.php';
		$tipo_accion = $_POST['tipo_accion'];
		
		if($tipo_accion != 'otra_esp'){
			// validation expected data exists
			if(!isset($_POST['tipo_edad'])) {
				die('We are sorry, but there appears to be a 
				problem with the form you submitted.');		
			}
			
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
	<h2>CAPTURE LOS DATOS DE LA ESPECIE</h2>
	<!--**************************************-->
	
	<!-- **************
	Especie
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<font color ="3b5998">
								<b>1. Especie: </b>
							</font>';
		// $nombre_combo_box = '<b>1. </b> Especie:';
		// define la variable
		$variable_name = 'id_Especies';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT especies.\"id_Especies\", t_clase.\"Clase\", t_orden.\"Orden\", especies.\"Genero\", especies.\"Especie\", especies.\"Autor\" 
					FROM especies LEFT JOIN t_clase  ON especies.\"id_Clase\" = t_clase.\"id_Clase\" 
					                          LEFT JOIN t_familia ON especies.\"id_Familia\" = t_familia.\"id_Familia\"
											  LEFT JOIN t_orden  ON especies.\"id_Orden\" = t_orden.\"id_Orden\"
					ORDER BY  t_clase.\"Clase\", t_orden.\"Orden\", t_familia.\"Familia\", especies.\"Genero\", especies.\"Especie\" ASC;";
		 
			$qu = pg_query($db, $query);

			while ($data = pg_fetch_object($qu)) 
			{$id_Especies =$data->id_Especies;
				if ($data->id_Especies!="" & $data->id_Especies!="NULL")
				 {
				echo "<option value = '".$data->id_Especies."'>".$data->Clase.' -> '.$data->Orden.' -> '.$data->Familia.' -> '.$data->Genero.' '.$data->Especie.' '.$data->Autor."</option>"; 
				 }

			}
			 echo "</select>";	


		/*if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($id_Especies,$Clase,$Orden, $Familia, $Genero, $Especie, $Autor);
			// add default
			// echo "<option value =NULL>NULL</option>";
			while ($stmt->fetch()) 
			 { 
				 if ($id_Especies!="" & $id_Especies!="NULL")
				 {
				echo "<option value = '".$id_Especies."'>".$Clase.' -> '.$Orden.' -> '.$Familia.' -> '.$Genero.' '.$Especie.' '.$Autor."</option>"; 
				 }
			 }
			 echo "</select>"; 
			$stmt->close();
		} */
	?>

</table>


<?php if ($id_Especies=="" ): ?>
			<table>
				<!-- **************
				diferentes_opciones
				****************-->
				<br>
				<br>
				<tr>
				 <td valign="top">
					<label for="tipo_accion">
						  <b>2.</b> Seleccionar Acci&oacute;n: 
					</label>
				 </td>
				 <td valign="top"> 
				 <select name="tipo_accion">
				  <option value="nueva_especie">Dar de alta una nueva Especie</option>		 
				 </select> </td>
				</tr>	
			</table>
			
<?php else : ?>
			<table>
				<!-- **************
				diferentes_opciones
				****************-->
				<br>
				<br>
				<tr>
				 <td valign="top">
					<label for="tipo_accion">
						  <b>2.</b> Seleccionar Acci&oacute;n: 
					</label>
				 </td>
				 <td valign="top"> 
				 <select name="tipo_accion">
				  <option value="material_cat">Ir a materiales Cat&aacute;logo</option>
				  <option value="material_lot">Ir a materiales Lote</option>
				  <option value="nueva_especie">Dar de alta una nueva Especie</option>		 
				 </select> </td>
				</tr>	
			</table>
<?php endif; ?>
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

