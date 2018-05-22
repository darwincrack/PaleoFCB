<?php include("post_data_informacion.php"); ?> 
<form name="Captura de datos" method="post" action="bifurcacion_nuevamedida_o_finalizarCaptura.php">
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
	?>

<!--********************************************************************
INSERTA LOS VALORES DEL FORMULARIO ANTERIOR
*********************************************************************-->
	<?php
	
		if(!isset($_POST['tipo_accion'])) {
			die('We are sorry, but there appears to be a problem with the form you submitted.');		
		}
		$tipo_accion = $_POST['tipo_accion'];
		
		
		if( !isset($_POST['id_especies'])) {
			die('We are sorry, but there appears to be a problem with the form you submitted.');		
		}
		// define el mensaje de error
		require_once 'error_message.php';
	
		// extrae valores del formulario
		// Id_Especie
		$id_Especies = $_POST['id_especies'];
			
		//echo $id_Especies;

		if(!isset($_POST['tipo_operacion'])) {
			die('We are sorry, but there appears to be a 
			problem with the form you submitted.');		
		}
		$tipo_operacion = $_POST['tipo_operacion'];
		
		
	?>
		
	<tr><td> <input type="hidden" name="id_especies" value="<?= $id_Especies ?>" ></td></tr>
	<tr><td> <input type="hidden" name="tipo_accion" value="<?= $tipo_accion ?>" ></td></tr>
	<tr><td> <input type="hidden" name="tipo_operacion" value="<?= $tipo_operacion ?>" ></td></tr>
	
	<?php
	
		if($tipo_accion=='nueva_med'){
			require_once 'insertar_valores_meristica_adicionales.php';
		}else{
			require_once 'insertar_valores_materiales_catalogo.php';
		}	
	?>

<!--********************************************************************
************************************************************************
FORMA DE CAPTURA
************************************************************************
*********************************************************************-->

	<!--**************************************-->
	<h2>CAPTURE LOS DATOS DE MER&Iacute;STICA</h2>	
	<!--**************************************-->

	<!-- **************
	clave_medida
	****************-->
	
	<tr>
	 <td valign="top">
	  <label for="clave_medida">
		  <span title="Descripci&oacute;n: Abreviaci&oacute;n de la medida reportada">
			  <b>1.</b> Clave medida: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="clave_medida" maxlength="45" size="10" value=NULL>
	 </td>
	</tr>
	
	<br><br>
	
	<!-- **************
	descripcion_medida
	****************-->

	<tr>
	 <td valign="top">
	  <label for="descripcion_medida">
		  <span title="Descripci&oacute;n: descripci&oacute;n completa de la medida ">
			  <b>2.</b> Descripci&oacute;n medida: 
		  </span> 
	  </label>	 </td>
	 <td valign="top">
	  <textarea  name="descripcion_medida" maxlength="1000" cols="50" rows="8">NULL</textarea>
	 </td>
	</tr>
	
	<br><br>
	
	<!-- **************
	medida
	****************-->

	<tr>
	 <td valign="top">
	  <label for="medida">
		  <span title="Descripci&oacute;n: cantidad reportada en metros, cent&iacute;metros, etc.">
			  <b>3.</b> Medida: 
		  </span> 
	  </label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="medida" maxlength="10" size="10" value=0>
	 </td>
	</tr>

	<!-- **************
	unidades
	****************-->

	<br><br>
	
	<tr>
	 <td valign="top">
		<label for="unidades">
			  <b>4.</b> Unidades: 
		</label>
	 </td>
	 <td valign="top"> 
	 <select name="unidades">
	  <option value="m">Metros (m)</option>
	  <option value="cm">Cent&iacute;metros (cm)</option>
	  <option value="mm">Mil&iacute;metros (mm)</option>
	 </select> </td>
	</tr>


	<br><br>
	
	<!-- **************
	notas_meristica
	****************-->

	<tr>
	 <td valign="top">
	  <label for="notas_meristica">
		  <span title="Descripci&oacute;n: Notas sobre promedios y datos num&eacute;ricos proporcionados respecto a las medidas de materiales ">
			  <b>5.</b> Notas mer&iacute;stica: 
		  </span> 
	  </label>	 </td>
	 <td valign="top">
	  <textarea  name="notas_meristica" maxlength="1000" cols="50" rows="8">NULL</textarea>
	 </td>
	</tr>

	<br><br>
	
	<!-- **************
	acción a ejecutar
	****************-->
	<br>
	<br>
	<tr>
	 <td valign="top">
		<label for="tipo_edad">
			  <b>2.</b> Seleccionar Acci&oacute;n: 
		</label>
	 </td>
	 <td valign="top"> 
	 <select name="tipo_accion"> 
	  <option value="nueva_med">Capturar nueva medida</option>
	  <option value="finalizar">Finalizar captura Datos</option>
	 </select> </td>
	</tr>	
	
	

<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

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
