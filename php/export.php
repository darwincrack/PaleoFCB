<html>
	<head>
		<title>respaldo de la base de datos</title>
	</head>

	<body>
		<?php
			
			// *****************************************************************
			// Datos para conectarse a la BBDD
			// *****************************************************************	
			require_once 'C:\xampp7\htdocs\paleoFCB\php\dbconfig.php';

			$delcommand = 'cd c:\xampp\htdocs\paleoFCB\backups && del backup*.sql /f && del ErrorLog.* /f';
			
			exec ($delcommand, $output, $returnVar);

			if($returnVar == 0) {

				date_default_timezone_set('America/Monterrey');

				$fecha = date('m-d-Y_hia');
					
				$outputPath= 'C:\xampp7\htdocs\paleoFCB\backups\backup'.$fecha.'.sql';

				$logPath= 'C:\xampp\htdocs\paleoFCB\backups\ErrorLog.txt';



   // exec('respaldo.bat',$outputPath);
	//exec('respaldo.bat');
    //print_r($output);

//die('estamos aqui');
			/*	$instruction = 'C:\xampp\mysql\bin\mysqldump.exe' . ' --user=' . $user . ' --host=' . $host . ' --port=' . $port . ' --skip-opt --add-drop-database --add-drop-table --add-locks --create-options --complete-insert --dump-date --log-error='. $logPath .' --quick --set-charset --extended-insert --databases' . ' paleo_fcb > ';*/

				//$cmd = $instruction . $outputPath;

				$output = array();
				unset($returnVar);

				if(set_time_limit(1000)){

					//exec ($cmd, $output, $returnVar);

					exec('C:\"Program Files"\PostgreSQL\10\bin\pg_dump.exe --format=tar --dbname=postgresql://'.$user.':'.$password.'@'.$host.':'.$port.'/'.$dbname.' > '.$outputPath, $output ,$returnVar);

					if($returnVar == 0) {
						echo 'El backup ha finalizado exitosamente';
					}else{
						echo "pg_dump ha finalizado con error.  [Error: " . $returnVar . " ] \n\n" ;
						echo "Favor de verificar el mensaje de error en el log.";
					}
				}else{
					echo 'Error al aumentar el tiempo de espera';
				}
			}else{
				echo 'Ha fallado el borrado de los archivos de respaldo anteriores';
			}


		?>
	</body>

	<table>
		<br>
		<center>
			<a href='http://127.0.0.1/paleoFCB/inicio.php'>volver a la p&aacute;gina principal</a>
		</center>
	</table>
</html>

