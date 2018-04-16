<form name="Captura de datos" method="post" action="bifurcacion_continuarCaptura.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->

<?php

	// validation expected data exists
	if( !isset($_POST['ID_REF']) ) {
		die('We are sorry, but there appears to be a problem with 
		the form you submitted.');		
	}
	// define el mensaje de error
	require_once 'error_message.php';
	
	$ID_REF = $_POST['ID_REF'];


?>



	<table>
	
		<!--**************************************-->
		<h2>SELECCIONAR LA OPCION DESEADA</h2>
		<!--**************************************-->
		<!-- **************
		diferentes_opciones
		****************-->
		<br>
		<br>
		<tr>
		 <td valign="top">
			<label for="tipo_accion">
				  <b>1.</b> Continuar capturando: 
			</label>
		 </td>
		 <td valign="top"> 
		 <select name="tipo_accion">
		  <option value="continuar_ubicacion">Localidad</option>
		  <option value="continuar_sitio">Sitio </option>
		 </select> </td>
		</tr>	
	</table>
	
	<tr><td> <input type="hidden" name="ID_REF" value="<?= $ID_REF ?>" ></td></tr>
<!--
	<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_accion ?>" ></td></tr>
-->
	
	
	
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