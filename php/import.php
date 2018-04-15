<html>
	<head>
		<title>recupero de la base de datos</title>
	</head>

	<body>

		<?php
			
			// *****************************************************************
			// Datos para conectarse a la BBDD
			// *****************************************************************	
			require_once 'C:\xampp7\htdocs\paleoFCB\php\dbconfig.php';

			date_default_timezone_set('America/Monterrey');

			if(!isset($_POST['archivo'])) {
					died('We are sorry, but there appears to be a 
						problem with the form you submitted.');		
			}
			$archivo = $_POST['archivo'];

			//$input = 'backup07-14-2015_0837pm.sql';	

			$dbbackup= 'C:\xampp7\htdocs\paleoFCB\backups\\'.$archivo.'.sql';

			//$instruction = 'C:\xampp\mysql\bin\mysql.exe' . ' --user=' . $user . ' --host=' . $host . ' --port=' . $port . ' < ';


			$instruction= 'C:\"Program Files"\PostgreSQL\10\bin\pg_restore.exe -c -d --format=tar --dbname=postgresql://'.$user.':'.$password.'@'.$host.':'.$port.'/'.$dbname.' < ';


			$cmd = $instruction . $dbbackup;

			// die("assss");

			$output = array();
			unset($returnVar);

			if(set_time_limit(1000)){

				exec ($cmd, $output, $returnVar);
				if($returnVar == 0) {
					echo 'La base se ha restaurado correctamente';
				}else{
					echo "postgresql ha finalizado con error.  [Error: " . $returnVar . "] ";
				}

			}else{
				echo 'Error al aumentar el tiempo de espera';
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
