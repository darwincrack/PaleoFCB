<form name="Captura de datos" method="post" action="realizar_consulta.php">
<center><IMG SRC="images/banner_3.png" ALT="banner" WIDTH=1107 HEIGHT=438></center>
<table width="1500px">

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
	<h2>INSERTA LA CONSULTA EN FORMATO MYSQL</h2>	
	<!--**************************************-->
	</center>
	
	<!--**************************************-->
	<h3>Instrucciones</h3>	
	<!--**************************************-->
	
	Bienvenido a la p&aacute;gina de consulta de la base de datos. Para realizar una consulta.
	S&oacute;lo tiene que escribirla en el cuadro de texto. Recuerde que la consulta tiene 
	que hacerse en formato MySQL. Para informaci&oacute;n al respecto,
	<a href="http://www.nachocabanes.com/sql/curso/sql01.php"> leer breve introducci&oacute;n</a>. 
	<br><br>
	Por ejemplo, si el usuario desea observar los primeros 50 registros de especies en la base de datos
	(tabla ESPECIES). Escriba en la consulta: <strong>SELECT *  FROM especies LIMIT 50</strong>
	<br><br>
	
	<tr>
	 <td valign="top">
	  <label for="query">
		  <span title="Ejemplo (Se desea desplegar todos los g&eacute;neros 
						de especies capturados ordenados alfab&eacute;ticamente 
						y sin repetidos): 
						SELECT DISTINCT Genero FROM 
						paleo_fcb.especies ORDER BY Genero">
			  <b>1.</b> Consulta MySQL: 
		  </span> 
	  </label>	 </td>
	 <td valign="top">
	  <textarea  name="query" maxlength="100000" cols="140" rows="10">SELECT * FROM especies limit 50</textarea>
	 </td>
	</tr>

</table>

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


</form>

