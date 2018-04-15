<form name="Captura de datos" method="post" action="import.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->
<table>

<!--********************************************************************
DESPLIEGUE DE INSTRUCCIONES
*********************************************************************-->

		<h3>Instrucciones:</h3>
			<strong>1) Si quiere respaldar la base de datos: </strong>
					<br>
					A. Los respaldos se guardar&aacute;n en la siguiente ruta <strong>C:\xampp\htdocs\paleoFCB\backups</strong>.
					<br>
					B. Los respaldos (espec&iacute;ficamente los archivos con el nombre: backupDD-MM-AAAA_HHMM[am/pm].sql) anteriores
		 				ser&aacute;n eliminados antes de generar el nuevo respaldo.
					<br>
					<br>
			<strong>2) Si quiere recuperar la base de datos desde un respaldo: </strong> 
					<br>
					A. Coloque el respaldo de la base de datos que desea importar en la siguiente ruta: <strong>C:\xampp\htdocs\paleoFCB\backups\</strong>";
					<br>
					B. Especifique el nombre del respaldo antes de importarlo.  <strong>Evite</strong> poner la extensi&oacute;n, s&oacute;lo el nombre.
					Por ejemplo: "backup07-14-2015_0837pm".
					<br><br>

</table>


<table>

	<!--**************************************-->
	<h2>ESPECIFIQUE EL NOMBRE DEL RESPALDO A IMPORTAR</h2>
	<!--**************************************-->

	<br>

	<tr>
	 <td valign="top">
	  <label for="archivo">
		  <span title="Ejemplo: backup07-14-2015_0837pm">
			  <b>1.</b> Nombre del archivo: 
		  </span> 
	  </label>	 </td>
	 <td valign="top">
	  <textarea  name="archivo" maxlength="100" cols="35" rows="1">NULL</textarea>
	 </td>
	</tr>
	
	<br><br>



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

