<?php

/*volver a recargar con datos el post*/
if(isset($_GET['referencia']))
{

$formulario = urldecode($_GET['referencia']); 
$formulario = json_decode($formulario);

	foreach ($formulario as $key => $value) {

		if(!isset($_POST[$key]))
		{
			$_POST[$key] = $value;
		}

	}

}
?>