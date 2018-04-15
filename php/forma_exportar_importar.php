<form name="Captura de datos" method="post" action="bifurcacion_exportar_importar.php">
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
<!-- **************
diferentes_opciones
****************-->

	<!--**************************************-->
	<h2>SELECCIONAR LA OPCION DESEADA</h2>
	<!--**************************************-->

		<tr>
			<td valign="top">
				<label for="tipo_accion">
					<b>2.</b> Seleccionar Acci&oacute;n: 
				</label>
			</td>
			<td valign="top"> 
				<select name="tipo_accion">
					<option value="exportar">Respaldar base de datos</option>
					<option value="importar">Recuperar BBDD desde respaldo</option>
				</select> 
			</td>
		</tr>	



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

