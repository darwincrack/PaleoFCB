<form name="Captura de datos" method="post" action="exportar_consulta.php">
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

	$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

 	$db = pg_connect($conn_string);
    if(!$db){
        $errormessage=pg_last_error();
        echo "Error 0: " . $errormessage;
        exit();
    }

	// validation expected data exists
	if(!isset($_POST['query'])) {
		die('We are sorry, but there appears to be a problem with the form you submitted.');		
	}

	// define el mensaje de error
	require_once 'error_message.php';
	
	// extrae valores del formulario
	$query = $_POST['query'];
	
	// revisa si el query no es NULL o esta vacio
	if ($query!="" & $query!="NULL")
	{
		// sending query
		// $query = "SELECT *  FROM paleo_fcb.especies;";
		// sending query
		//$result = mysql_query($query);
		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<strong>Teclee por ejemplo:</strong> SELECT * FROM paleo_fcb.unidadanalisis;
			<br>
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}

		//$fields_num = mysql_num_fields($result);
		$fields_num = pg_num_fields ($result);
		// si no hubo errores, despliega el contenido del query y la tabla
		// con los resultados
		echo "<center><h2>Consulta realizada</h2></center>";
		
		// **************
		// mostrar query
		// **************
				
		// nombre que se imprime en html
		$nombre_combo_box = 'C&oacute;digo consulta (<strong>NO MODIFIQUE EL TEXTO</strong>): ';
		// define la variable
		$variable_name = 'query';
	
		echo '<div class="column">';
		echo 	'<tr>';
		echo '	 <td valign="top">';
		echo '	  <label for='.$variable_name.'>'.$nombre_combo_box.'</label>'; 
		echo '	</td>';
		echo '	 <td valign="top">';
		echo '	  <textarea  name="'.$variable_name.'" maxlength="1000" cols="150" rows="5">'.$query.'</textarea>';
		echo '	 </td>';
		echo '	</tr>';
		echo '</div>';
		
		// ********************
		// exportar resultados
		// *******************
		
		echo "<center><h2>Exportar consulta</h2></center>";
		echo '<input type="submit" value="Exportar consulta en formato CSV (comma-separated values)">';
		#echo '<br>';
		#echo '<strong>NOTA:</strong>Por default el separador de columnas es el s&iacute;mbolo de pesos "$"';

		// ********************
		// nombre del archivo
		// *******************
		
		echo '<br>';
		echo '<br>';
		echo '<tr>';
		echo ' <td valign="top">';
		echo '  <label for="file">';
		echo '	  <span title="consulta_especies">';
		echo '		  Nombre del archivo:';
		echo '	  </span> ';
		echo '  </label>';
		echo ' </td>';
		echo ' <td valign="top">';
		echo '  <input  type="text" name="file" maxlength="100" size="50" value=consulta>';
		echo ' </td>';
		echo ' </tr>';


		// **************
		// tabla de resultados
		// **************		
		
		echo "<center><h2>Tabla de resultados</h2></center>";
		echo "<table border='1'><tr>";
		// printing table headers
		for($i=0; $i<$fields_num; $i++)
		{
			//$field = mysql_fetch_field($result);
			//$field = pg_num_fields ($result);
			$field = pg_field_name($result, $i);
			$nombre_dat = $field;
			//echo "<td><strong><center>{$field->name}</center></strong></td>";
			echo "<td><strong><center>{$nombre_dat}</center></strong></td>";
		}

		echo "</tr>\n";
		// printing table rows
		//while($row = mysql_fetch_row($result))
		while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{

			
			echo "<tr>";
			// $row is array... foreach( .. ) puts every element
			// of $row to $cell variable
			foreach($row as $cell)
				if ($cell=="" || $cell=="NULL")
				{
					// $cell="NULL";
					$cell="<font color ='fe5757'>NULL</font>";
					echo "<td><center>$cell</center></td>";	
				}else
				{
					echo "<td><center>$cell</center></td>";	
				}
			echo "</tr>\n";
		}
		pg_free_result ($result);
	}else
	{
		echo "<strong>ERROR:</strong> La consulta no puede ir vac&iacute;a o tener valor NULL. 
			<strong>Teclee por ejemplo:</strong> SELECT * FROM paleo_fcb.unidadanalisis";
		echo "<br>";
		echo "<br>";
		echo "<a href='http://127.0.0.1/paleoFCB/php/forma_consulta.php'>Regresar al men&uacute; para consultar datos</a>";
	}
?>

</body>

<table>
<br>
<center><a href='http://127.0.0.1/paleoFCB/inicio.php'>volver a la p&aacute;gina principal</a></center>

</table>

</html>


	
