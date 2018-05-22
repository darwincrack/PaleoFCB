<?php


	/*para guardar ubicacion actual y variables post usadas en la pagina*/

		$url= $_SERVER["REQUEST_URI"];


		$pos = strpos($url, ".php?");
		if ($pos === false) {
		}else
		{
			$url = explode(".php?",$url);
			$url = $url[0].".php";	
		}


		$referencia = $_POST['referencia'];
		$formulario = json_encode($_POST);

		

	
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

		$query_consulta = "SELECT * FROM registro_formulario WHERE referencia='".$referencia."';";

		$result_consulta = pg_query($db,$query_consulta);
		if (!$result_consulta) {
				die(
					"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
						<br>
						<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
					);
		}	


		if($row_consulta = pg_fetch_array($result_consulta, NULL, PGSQL_ASSOC)){


			$query_dos = "UPDATE registro_formulario 
								SET formulario = '$formulario',ruta='$url' WHERE referencia='$referencia';";
				$result_dos = pg_query($db,$query_dos);


				if (!$result_dos) {
					die(
					"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
					<br>
					<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
					);
				}

		}
		else
		{

			$query_dos = "INSERT INTO registro_formulario 
							VALUES (DEFAULT,'$formulario',
									'$referencia','$url');";

			$result_dos = pg_query($db,$query_dos);


			if (!$result_dos) {
				die(
				"<strong>ERROR:</strong> Hubo un error con la consulta, intente de nuevo por favor. 
				<br>
				<a href='http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php'>Regresar al men&uacute; para consultar datos</a>"			
				);
			}

		}





?>