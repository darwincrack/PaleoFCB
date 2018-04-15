
<form name="Pagina principal" method="post">
	
<!--
Autores: 

	MSc. Benjamin Tovar: https://www.linkedin.com/in/benjamintovarcis
	Pablo Mazzucchi: https://www.linkedin.com/in/pablomazzucchi
	
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
	
<center>
	<IMG SRC="images/banner_1.jpg" ALT="banner" WIDTH=1000 HEIGHT=571>
</center>

<table width="600px">

<br>

<center>
	<h1>Bienvenido a la base de datos del laboratorio de Paleobiolog&iacute;a de la FCB-UANL</h1>
</center>

<!--********************************************************************
CONECTARSE A LA BASE DE DATOS
*********************************************************************-->
	<?php
		// connect to database
		require_once 'php/dbconfig.php';
		// check connection
		/*$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
			or die ('Could not connect to the database server' . mysqli_connect_error());*/

	$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

 	$db = pg_connect($conn_string);
    if(!$db){
        $errormessage=pg_last_error();
        echo "Error 0: " . $errormessage;
        exit();
    }
			
	?>

<!--********************************************************************
DESPLIEGA CONTADOR REFERENCIAS
*********************************************************************-->	

	<?php
		// connect to database
		require_once 'php/desplegar_contador.php';
	?>


<!-- *******************************************************************
*********************************************************************-->

	<!-- capturar datos -->
	<br>
	<h3>1) Captura de informaci&oacute;n</h3>
	<a href="http://127.0.0.1/paleoFCB/php/forma_captura_bibliografia_region.php">
		Capturar datos
	</a>
	<br>
	<br>
	<a href="http://127.0.0.1/paleoFCB/php/forma_continuar_captura.php">
		Continuar captura
	</a>
	<!-- consulta datos -->
	<br>
	<h3>2) Consulta de informaci&oacute;n</h3>
	<a href="http://127.0.0.1/paleoFCB/php/forma_consulta.php">
		Consultar datos
	</a>
	<br>
	<br>
	<a href="http://127.0.0.1/paleoFCB/php/forma_consulta_bibliografia.php">
		Consultar Referencias dadas de alta
	</a>
		<br>
	<h3>3) Respaldo de informaci&oacute;n</h3>
	<a href="http://127.0.0.1/paleoFCB/php/forma_exportar_importar.php">
		Exportar/Importar
	</a>

</table>

