<form name="Captura de datos" method="post" action="insertar_valores_bibliografia.php">
<IMG SRC="images/diplodocus.jpg" ALT="some text" WIDTH=560 HEIGHT=335>
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
		require_once 'instrucciones.php';
		echo '
		<style type="text/css">
			.container {
				width: 500px;
				clear: both;
			}
			.container input {
				width: 100%;
				clear: both;
			}
			.column
			{
			float: left;
			width: 33%;
			}
		</style>
		';
	?>

<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>INSERTA LA BIBLIOGRAF&Iacute;A COxMPLETA</h2>	
	<!--**************************************-->

	<div class="column">
		<tr>
		 <td valign="top">
		  <label for="referencia">
			  <span title="Ejemplo: &Aacute;lvarez T. and Ferrusqu&iacute;a-Villafranca.1967:107">
				  <b>1.</b> Bibliograf&iacute;a completa: 
			  </span> 
		  </label>	 </td>
		 <td valign="top">
		  <textarea  name="referencia" maxlength="1000" cols="50" rows="6">NULL</textarea>
		 </td>
		</tr>
	</div>
	<div class="column">
		<label>Password: </label>
		<input type="text" name="password" id="password"/>
	</div>

	<tr>
	 <td valign="top">
	  <label for="referencia">
		  <span title="Ejemplo: &Aacute;lvarez T. and Ferrusqu&iacute;a-Villafranca.1967:107">
			  <b>1.</b> Bibliograf&iacute;a completa: 
		  </span> 
	  </label>	 </td>
	 <td valign="top">
	  <textarea  name="referencia" maxlength="1000" cols="50" rows="6">NULL</textarea>
	 </td>
	</tr>
		
	<tr>
	 <td valign="top">
	  <label for="anio">
		  <span title="Ejemplo: 1999">
			  <b>2.</b> A&ntilde;o de la publicaci&oacute;n: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="anio" maxlength="4" size="1" value=NULL>
	 </td>
	</tr>


	<!-- **************
	TIPO DE PUBLICACION
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>3.</b> Tipo de publicaci&oacute;n:';
		// define la variable
		$variable_name = 'tipo_referencia';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT Tipo_Referencia as result
					FROM paleo_fcb.t_tiporeferencia;";
		 
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
		echo '</td>';
		echo '</tr>';
		echo "<br>"; 
	?>
	
<tr><td> <input type="hidden" name="tipo_operacion" value="<?= 'captura_normal' ?>" ></td></tr>

	
</table>

<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

<center>
	<tr>
	 <td colspan="2" style="text-align:center">
	  <br>
	  <br>
	  <input type="submit" value="Enviar">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.html">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>
