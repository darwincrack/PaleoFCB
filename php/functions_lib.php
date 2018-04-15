<?php

function check_key($llave)
// Esta funcion evalua si en la tabla existe almenos una 
// instancia definida. Si la tabla esta vacia, entonces inicia 
// la llave con 1, si no, entonces agrega la instancia como 
// llave = max(llave) + 1
{
	// si la tabla esta vacia
	if ($llave==NULL || $llave=="")
	{
		$llave = 1 ;
	// si la tabla ya tiene instancias dentro
	}else
	{
		$llave = $llave + 1;
	}
	return $llave;	
}

?>
