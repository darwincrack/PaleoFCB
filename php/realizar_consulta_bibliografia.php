<html><head><title>Visor de resultados</title></head><body>
	
<!--
	Autores: 

		MSc. Benjamin Tovar: https://www.linkedin.com/in/benjamintovarcis
		MSc. Pablo Mazzucchi: https://www.linkedin.com/in/pablomazzucchi
		
							 .       .
							/ `.   .' \
					.---.  <    > <    >  .---.
					|    \  \ - ~ ~ - /  /    |
					 ~-..-~             ~-..-~
				 \~~~\.'                    `./~~~/
				  \__/                        \__/
				   /                  .-    .  \
			_._ _.-    .-~ ~-.       /       }   \/~~~/
		_.-'q  }~     /       }     {        ;    \__/
	   {'__,  /      (       /      {       /      `. ,~~|   .     .
		`''''='~~-.__(      /_      |      /- _      `..-'   \\   //
					/ \   =/  ~~--~~{    ./|    ~-.     `-..__\\_//_.-'
				   {   \  +\         \  =\ (        ~ - . _ _ _..---~
				   |  | {   }         \   \_\
				  '---.o___,'       .o___,'

-->	
	
<?php
	// *****************************************************************
	// CONECTARSE A LA BASE DE DATOS
	// *****************************************************************	

	require_once 'dbconfig.php';

	/*if (!mysql_connect($host, $user, $password))
		die("Can't connect to database");

	if (!mysql_select_db($dbname))
		die("Can't select database");*/

	$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

 	$db = pg_connect($conn_string);
    if(!$db){
        $errormessage=pg_last_error();
        echo "Error 0: " . $errormessage;
        exit();
    }		

	// validation expected data exists
	if(!isset($_POST['referencia'])) {
		died('We are sorry, but there appears to be a problem with the form you submitted.');		
	}
	// define el mensaje de error
	require_once 'error_message.php';
	
	// extrae valores del formulario
	$ref = $_POST['referencia'];
	
	// revisa si la referencia no es NULL o esta vacio
	if ($ref!="" & $ref!="NULL")
	{
		// sending query
		// $query = "SELECT *  FROM paleo_fcb.especies;";
		// sending query
		
		/*echo $query = "SELECT R.id_ReferenciaBibliografica AS ID_REF, 
                         TipR.Tipo_Referencia AS 'Tipo Referencia',
						 TR.Referencia,
						 U.Localidad,
						 UA.id_unidadAnalisis AS ID_UA,
						 TE.estado,
						 IF (EpM.epoca IS NULL, EpC.epoca,EpM.epoca)  AS Epoca,
						 IF (UA.id_EdadMaritima IS NULL, TPF.pisoFaunistico, TEM.edad) AS Edad,     
						 S.Sitio, S.Latitud, S.Longitud,
						 C.Clase, O.Orden, F.Familia, E.id_Especies AS ID_ESP, E.Genero, E.Especie
				 FROM referenciabibliografica R 
					 JOIN t_referencia TR ON R.id_Referencia = TR.id_Referencia
					 JOIN t_tiporeferencia TipR ON R.id_Tipo_Referencia = TipR.id_Tipo_Referencia
					 JOIN hallazgo H ON R.id_ReferenciaBibliografica = H.id_ReferenciaBibliografica
					 JOIN ubicacion U ON H.id_ubicacion = U.id_Ubicacion
					 JOIN t_estado TE ON U.Estado = TE.id_estado
					 JOIN sitio S ON U.id_Ubicacion = S.id_Ubicacion
					 JOIN unidadanalisis UA ON S.id_Sitio = UA.id_Sitio
					 JOIN unidadespecie UE ON UA.id_UnidadAnalisis = UE.id_UnidadAnalisis
					 LEFT JOIN especies E ON UE.id_Especies= E.id_Especies
					 JOIN t_clase C ON E.id_Clase = C.id_Clase
					 JOIN t_orden O ON E.id_Orden = O.id_Orden
					 JOIN t_familia F ON E.id_Familia = F.id_Familia
					 LEFT JOIN edadcontinental EC ON UA.id_EdadContinental = EC.id_EdadContinental
					 LEFT JOIN t_pisofaunistico TPF ON EC.Piso_Faunistico = TPF.id_pisofaunistico
					 LEFT JOIN t_periodo PC ON EC.Periodo = PC.id_periodo
					 LEFT JOIN t_epoca EpC ON EC.Epoca = EpC.id_epoca
					 LEFT JOIN edadmaritima EM ON UA.id_EdadMaritima = EM.id_EdadMaritima
					 LEFT JOIN t_edadesmarinas TEM ON EM.Edad = TEM.id_edades_marinas
					 LEFT JOIN t_periodo PM ON EM.Periodo = PM.id_periodo
					 LEFT JOIN t_epoca EpM ON EM.Epoca = EpM.id_epoca
				 WHERE TR.Referencia LIKE '%$ref%';";*/




		$query = 'SELECT * FROM referenciabibliografica R 
JOIN t_referencia TR ON R."id_Referencia" = TR."id_Referencia"
JOIN t_tiporeferencia TipR ON R."id_Tipo_Referencia" = TipR."id_Tipo_Referencia"
JOIN hallazgo H ON R."id_ReferenciaBibliografica" = H."id_ReferenciaBibliografica"
JOIN ubicacion U ON H."id_ubicacion" = U."id_Ubicacion" 
JOIN t_estado TE ON U."Estado" = TE."id_estado"
JOIN sitio S ON U."id_Ubicacion" = S."id_Ubicacion" 
JOIN unidadanalisis UA ON S."id_Sitio" = UA."id_Sitio" 
JOIN unidadespecie UE ON UA."id_UnidadAnalisis" = UE."id_UnidadAnalisis" 
LEFT JOIN especies E ON UE."id_Especies"= E."id_Especies"
JOIN t_clase C ON E."id_Clase" = C."id_Clase" 
JOIN t_orden O ON E."id_Orden" = O."id_Orden" 
JOIN t_familia F ON E."id_Familia" = F."id_Familia" 
LEFT JOIN edadcontinental EC ON UA."id_EdadContinental" = EC."id_EdadContinental" 
LEFT JOIN t_pisofaunistico TPF ON EC."Piso_Faunistico" = TPF."id_pisofaunistico" 
LEFT JOIN t_periodo PC ON EC."Periodo" = PC."id_periodo"
LEFT JOIN t_epoca EpC ON EC."Epoca" = EpC."id_epoca" 
LEFT JOIN edadmaritima EM ON UA."id_EdadMaritima" = EM."id_EdadMaritima" 
LEFT JOIN t_edadesmarinas TEM ON EM."Edad" = TEM."id_edades_marinas" 
LEFT JOIN t_periodo PM ON EM."Periodo" = PM."id_periodo" 
LEFT JOIN t_epoca EpM ON EM."Epoca" = EpM."id_epoca" WHERE TR."Referencia" LIKE';





		$query .= "'%$ref%';";	
 
		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}

		//$fields_num = mysql_num_fields($result);
		$fields_num = pg_num_fields ($result);
		// si no hubo errores, despliega el contenido del query y la tabla
		// con los resultados
		//echo "<center><h2>Consulta realizada</h2></center>";
		//echo "<center>$query</center>";
		
		echo "<center><h2>Tabla de resultados</h2></center>";
		echo "<table border='1'><tr>";
		// printing table headers
		for($i=0; $i<$fields_num; $i++)
		{
			//$field = mysql_fetch_field($result);
			$field = pg_field_name($result, $i);
			$nombre_dat = $field;
			echo "<td><strong><center>{$nombre_dat}</center></strong></td>";
		}
		echo "</tr>\n";
		// printing table rows
		/*while($row = mysql_fetch_row($result))
		{	*/	

		while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
			echo "<tr>";
			// $row is array... foreach( .. ) puts every element
			// of $row to $cell variable
			foreach($row as $cell)
				if ($cell=="" || $cell=="NULL")
				{
					// $cell="NULL";
					$cell="<font color ='fe5757' size='2pt'> NULL </font>";
					echo "<td><left>$cell</left></td>";	
				}else
				{
					$cell_formatted="<font size='2pt'> $cell </font>";
					echo "<td><left>$cell_formatted </left></td>";	
					
				}
			echo "</tr>\n";
		}
		//mysql_free_result($result);
		pg_free_result ($result);
	}else
	{
		echo "<strong>ERROR:</strong> La consulta no puede ir vac&iacute;a o tener valor NULL. 
			<strong>Teclee por ejemplo:</strong> Mooser";
		echo "<br>";
		echo "<br>";
		echo "<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>";
	}
?>

</body>

<table>
<br>
<center><a href='http://127.0.0.1/paleoFCB/inicio.php'>volver a la p&aacute;gina principal</a></center>
</table>

</html>


	
