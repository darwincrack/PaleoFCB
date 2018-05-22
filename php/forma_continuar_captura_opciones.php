<form name="Captura de datos" method="post" action="bifurcacion_continuarCaptura.php">
<!-- <IMG SRC="images/banner_2.png" ALT="banner" WIDTH=1267 HEIGHT=443> -->

<?php


			require_once 'dbconfig.php';


	$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

 	$db = pg_connect($conn_string);
    if(!$db){
        $errormessage=pg_last_error();
        echo "Error 0: " . $errormessage;
        exit();
    }	


	// validation expected data exists
	if( !isset($_POST['ID_REF']) ) {
		die('We are sorry, but there appears to be a problem with 
		the form you submitted.');		
	}
	// define el mensaje de error
	require_once 'error_message.php';
	
	$ID_REF = $_POST['ID_REF'];
	$query_busqueda = 'SELECT  R."id_ReferenciaBibliografica" AS ID_REF, 
							TR."Referencia" AS Referencia
					FROM referenciabibliografica R 
						 JOIN t_referencia TR ON R."id_Referencia" = TR."id_Referencia" WHERE R."id_ReferenciaBibliografica" = '.$ID_REF;

						 $result_consulta = pg_query($db,$query_busqueda);
if (!$result_consulta) {
		die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
				<br>
				<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
}	


if($row_consulta = pg_fetch_array($result_consulta, NULL, PGSQL_ASSOC)){
	$referencia = $row_consulta['referencia'];

		$query_consulta = "SELECT * FROM t_referencia TR WHERE TR.\"Referencia\"='".$referencia."';";
		$result_consulta = pg_query($db,$query_consulta);
		if (!$result_consulta) {
				die(
					"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
						<br>
						<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
					);
		}


		if($row_consulta = pg_fetch_array($result_consulta, NULL, PGSQL_ASSOC)){
			$referencia  =  $row_consulta['id_Referencia'];
		}







		
		$query_consulta = "SELECT  *
						FROM registro_formulario WHERE referencia='".$referencia."' ;";
					
		$result_consult = pg_query($db,$query_consulta);
	if (!$result_consult) {
			die(
				"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
					<br>
					<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
				);
	}	


		if($result_consult = pg_fetch_array($result_consult, NULL, PGSQL_ASSOC)){
			$formulario_original = $result_consult['formulario'];
			$ruta = $result_consult['ruta'];

			$formulario = json_decode($result_consult['formulario']);
			foreach ($formulario as $key => $value) {

				if(!isset($_POST[$key]))
				{
					$_POST[$key] = $value;
				}
			}
		}				
}
else
{
	echo "no existe";
}


$pos = strpos($ruta, ".php?");
if ($pos === false) {
}else
{
	$ruta = explode(".php?",$ruta);
	$ruta = $ruta[0].".php";	
}

$host= $_SERVER["HTTP_HOST"];
$ruta_pagina = "http://" . $host.$ruta;

$formulario_original = urlencode($formulario_original);
$ruta_pagina = $ruta_pagina."?referencia=$formulario_original";
header('Location: '.$ruta_pagina);

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