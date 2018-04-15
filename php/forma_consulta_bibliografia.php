<form name="Captura de datos" method="post" action="realizar_consulta_bibliografia.php">
<center><IMG SRC="images/banner_3.png" ALT="banner" WIDTH=1107 HEIGHT=438></center>
<table width="600px">

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

	<center>
	<!--**************************************-->
	<h2>CONSULTA SI LA BIBLOGRAFIA YA FUE DADA DE ALTA EN LA BASE</h2>	
	<!--**************************************-->
	</center>
	
	<!--**************************************-->
	<h3>Instrucciones</h3>	
	<!--**************************************-->
	
	Bienvenido a la p&aacute;gina de consulta de referencias.  Para verificar si una publicaci&oacute;n ya ha
	sido capturada, s&oacute;lo tiene que ingresar el t&iacute;tulo (o parte del mismo) en el cuadro de texto. 

	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="query">
		  <span title="Colocar el t&iacute;tulo o los autores de la referencia que se desee buscar en la base de datos">
			  <b>1.</b> Consulta Referencias: 
		  </span> 
	  </label>	 </td>
	 <td valign="top">
	  <textarea  name="referencia" maxlength="10000" cols="80" rows="1"></textarea>
	 </td>
	</tr>

	

<!-- *******************************************************************
PIE DE PAGINA
*********************************************************************-->

<center>
	<tr>
	 <td colspan="2" style="text-align:center">
	  <br>
	  <br>
	  <input type="submit" value="Ejecutar consulta en la base de datos">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.php">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>

