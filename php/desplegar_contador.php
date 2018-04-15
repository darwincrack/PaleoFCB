<?php	
	echo '<table align=RIGHT>';
		// ********************		
		// CONTADOR REFERENCIAS
		// ********************
		
		// nombre que se imprime en html
		$nombre_combo_box = '<b>A) </b> Referencias capturadas al momento:';
		// define la variable
		$variable_name = 'cant_referencias';

		// DEFINE QUERY PARA DESPLEGAR EL VALOR
		$query = "SELECT COUNT(*) AS cant_referencias 
					FROM referenciabibliografica;";


		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<br>");
		}

		if($uno = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
			$value = $uno['cant_referencias'];
		}
						

			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($value);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_materiales_catalogo_FK);
				}				
				$stmt->close();
			}*/	
		
		echo '<tr>';
		echo '<td valign="top">';
		echo '  <label for='.$variable_name.'>';
		echo	  ''.$nombre_combo_box.'';
		echo '	 </label>';
		echo ' </td>';
		echo ' <td valign="top">';
		echo '  <input  type="text" name='.$variable_name.' maxlength="5" size="2" value='.$value.'>';
		echo ' </td>';
		echo '</tr>';

		// ********************		
		// CONTADOR REGISTROS
		// ********************
		
		// nombre que se imprime en html
		$nombre_combo_box = '<b>B) </b> Registros capturados al momento:';
		// define la variable
		$variable_name = 'cant_ua';

		// DEFINE QUERY PARA DESPLEGAR EL VALOR
		$query = "SELECT COUNT(*) AS cant_ua FROM unidadanalisis;";		

		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<br>");
		}
			
		if($uno = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
			$value = $uno['cant_ua'];
		}
			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($value);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_materiales_catalogo_FK);
				}				
				$stmt->close();
			}*/	
		
		echo '<tr>';
		echo '<td valign="top">';
		echo '  <label for='.$variable_name.'>';
		echo	  ''.$nombre_combo_box.'';
		echo '	 </label>';
		echo ' </td>';
		echo ' <td valign="top">';
		echo '  <input  type="text" name='.$variable_name.' maxlength="5" size="2" value='.$value.'>';
		echo ' </td>';
		echo '</tr>';

		// ********************		
		// CONTADOR ESPECIES
		// ********************
		
		// nombre que se imprime en html
		$nombre_combo_box = '<b>C) </b> Especies capturadas al momento:';
		// define la variable
		$variable_name = 'cant_especies';

		// DEFINE QUERY PARA DESPLEGAR EL VALOR
		$query = "SELECT COUNT(*) AS cant_especies FROM especies;";
		
		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<br>");
		}


		if($uno = pg_fetch_array($result, NULL, PGSQL_ASSOC))
		{
			$value = $uno['cant_especies'];
		}
		


			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($value);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_materiales_catalogo_FK);
				}				
				$stmt->close();
			}*/	
		
		echo '<tr>';
		echo '<td valign="top">';
		echo '  <label for='.$variable_name.'>';
		echo	  ''.$nombre_combo_box.'';
		echo '	 </label>';
		echo ' </td>';
		echo ' <td valign="top">';
		echo '  <input  type="text" name='.$variable_name.' maxlength="5" size="2" value='.$value.'>';
		echo ' </td>';
		echo '</tr>';
	echo '</table>';
?>	
