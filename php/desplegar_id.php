<?php	
	echo '<table align=RIGHT>';
		// ********************		
		// CONTADOR REFERENCIAS
		// ********************
		
		// nombre que se imprime en html
		$nombre_combo_box = '<b>D) </b> &Uacute;ltima ID.Referencia:';
		// define la variable
		$variable_name = 'id_bib';

		// DEFINE QUERY PARA DESPLEGAR EL VALOR
		$query = 'select MAX("id_ReferenciaBibliografica") as id_bib 
					from referenciabibliografica;';
					
		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}	

		if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
			$id_bib  = $row['id_bib'];
			$value  = $row['id_bib'];
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
		$maxRef = $value;

		// ********************		
		// CONTADOR REGISTROS
		// ********************
		
		// nombre que se imprime en html
		$nombre_combo_box = '<b>E) </b> &Uacute;ltimo ID.Registro:';
		// define la variable
		$variable_name = 'id_ua';

		// DEFINE QUERY PARA DESPLEGAR EL VALOR
	//	$query = "SELECT MAX(id_UnidadAnalisis) as id_ua  
	//				FROM unidadanalisis;";
	//	
		/*echo $query = "SELECT MAX(UA.id_unidadAnalisis) AS id_ua
					FROM referenciabibliografica R 
						 JOIN hallazgo H ON R.id_ReferenciaBibliografica = H.id_ReferenciaBibliografica
						 JOIN ubicacion U ON H.id_ubicacion = U.id_Ubicacion
						 JOIN sitio S ON U.id_Ubicacion = S.id_Ubicacion
						 JOIN unidadanalisis UA ON S.id_Sitio = UA.id_Sitio
					WHERE  R.id_ReferenciaBibliografica = $maxRef;";*/



		$query = 'SELECT MAX(UA."id_UnidadAnalisis") AS id_ua FROM referenciabibliografica R JOIN hallazgo H ON R."id_ReferenciaBibliografica" = H."id_ReferenciaBibliografica" JOIN ubicacion U ON H."id_ubicacion" = U."id_Ubicacion" JOIN sitio S ON U."id_Ubicacion" = S."id_Ubicacion" JOIN unidadanalisis UA ON S."id_Sitio" = UA."id_Sitio" WHERE R."id_ReferenciaBibliografica" ='.$maxRef;

		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}	

		if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
			$id_ua  = $row['id_ua'];
		}	

			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($value);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_materiales_catalogo_FK);
				}				
				$stmt->close();
			}	*/
		
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

		$maxUA = $value;
		
		// ********************		
		// CONTADOR ESPECIES
		// ********************
		
		// nombre que se imprime en html
		$nombre_combo_box = '<b>F) </b> &Uacute;ltima ID.Especie:';
		// define la variable
		$variable_name = 'id_esp';

		// DEFINE QUERY PARA DESPLEGAR EL VALOR
		//$query = "SELECT MAX(id_Especies) as id_esp 
		//			FROM especies;";

		/*echo $query = "SELECT MAX(E.id_Especies) AS id_esp
					FROM referenciabibliografica R 
						 JOIN hallazgo H ON R.id_ReferenciaBibliografica = H.id_ReferenciaBibliografica
						 JOIN ubicacion U ON H.id_ubicacion = U.id_Ubicacion
						 JOIN sitio S ON U.id_Ubicacion = S.id_Ubicacion
						 JOIN unidadanalisis UA ON S.id_Sitio = UA.id_Sitio
						 JOIN unidadespecie UE ON UA.id_UnidadAnalisis = UE.id_UnidadAnalisis
						 LEFT JOIN especies E ON UE.id_Especies= E.id_Especies
					WHERE  R.id_ReferenciaBibliografica = $maxRef
					  AND UA.id_unidadAnalisis = $maxUA;";*/


		$query = 'SELECT MAX(E."id_Especies") AS id_esp FROM referenciabibliografica R JOIN hallazgo H ON R."id_ReferenciaBibliografica" = H."id_ReferenciaBibliografica" 
JOIN ubicacion U ON H.id_ubicacion = U."id_Ubicacion" JOIN sitio S ON U."id_Ubicacion" = S."id_Ubicacion"
JOIN unidadanalisis UA ON S."id_Sitio" = UA."id_Sitio" JOIN unidadespecie UE ON UA."id_UnidadAnalisis" = UE."id_UnidadAnalisis"
LEFT JOIN especies E ON UE."id_Especies"= E."id_Especies" WHERE R."id_ReferenciaBibliografica" = '.$maxRef.' AND UA."id_UnidadAnalisis" = '.$maxUA.';';
					

		$result = pg_query($db,$query);
		if (!$result) {
			die(
			"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
			<br>
			<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
			);
		}


		if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
			$id_esp  = $row['id_esp'];
			$value  = $row['id_esp'];
			$id_materiales_catalogo_FK  = $row['id_esp'];
		}	




			/*if ($stmt = $con->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($value);
				while ($stmt->fetch()) {
					// printf("%s\n", $id_materiales_catalogo_FK);
				}				
				$stmt->close();
			}	*/
	
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
