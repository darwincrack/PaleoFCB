<form name="Captura de datos" method="post" action="insertar_valores_ubicacion.php">
<IMG SRC="images/diplodocus.jpg" ALT="some text" WIDTH=560 HEIGHT=335>
<table width="600px">

<!--********************************************************************
CONECTARSE A LA BASE DE DATOS
*********************************************************************-->
	<?php
		// connect to database
		$host="127.0.0.1";
		$port=3306;
		$socket="";
		$user="root";
		$password="T4tabox.2";
		$dbname="paleo_fcb";
		// check connection
		$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
			or die ('Could not connect to the database server' . mysqli_connect_error());
	?>

<!--********************************************************************
BIBLIOGRAFIA COMPLETA
*********************************************************************-->
	<h2>INSERTA LA UBICACI&Oacute;N</h2>
		
	<h3>Instrucciones:</h3>
	<!--COMBO BOX MODIFICABLES -->
<!--
	<strong>1) Combo-box (<IMG SRC="images/null.png" WIDTH=68 HEIGHT=27>):</strong> Si el valor buscado <b>NO</b> se 
	encuentra en el men&uacute; desplegable (campos con sufijo "a"), 
	dejar seleccionado el valor <strong>NULL</strong> y <b>reemplazar</b> el valor <b>NULL</b> en la barra de texto (campos con sufijo "b")
	con su valor deseado. 
	Si el men&uacute; desplegable contiene el valor buscado (campos con sufijo "a") 
	<strong>NO modifique el contenido en el cuadro de texto</strong> (campos con sufijo "b").
	<br><br>
-->
	<!--CAMPOS DE TEXTO -->
	<strong>1) Campos de texto (<IMG SRC="images/text.png" WIDTH=61 HEIGHT=21>):</strong> si llegase a darse el caso 
	en el que el usuario no sabe el valor de un campo y quisiera dejarlo en blanco, favor de <b>NO modificar el contenido</b> dejando 
	por default el valor <b>NULL</b> (<IMG SRC="images/null2.png" WIDTH=51 HEIGHT=24>) para hacer
	la transacci&oacute;n en la base de datos.
	<br><br>
	
	<!-- **************
	Region (dado que solo
	tenemos datos de Mexico. 
	Solo se pondra norte america)
	****************-->

	 <tr>
	 <td valign="top">
	 <label for="comments"><b>1. </b>Regi&oacute;n: </label>
	 </td>
	 <td valign="top">
	 <select name=region>
	  <option value="America del Norte">America del Norte</option>
		<!--
	  <option value="Bing">Bing</option>
	  <option value="Yahoo">Yahoo</option>
		-->
	 </select>	
	 </tr>
	 
	<!-- **************
	Region (combo box)
	****************-->
<!--
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>1.</b> Regi&oacute;n:';
		// define la variable
		$variable_name = 'region';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT region 
				FROM paleo_fcb.t_region
				ORDER BY region ;";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($result);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}
		echo '</tr>'; 
	?>		
-->

	<!-- **************
	Pais
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>2.</b> Pa&iacute;s:';
		// define la variable
		$variable_name = 'pais';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT pais 
				FROM paleo_fcb.t_pais
				ORDER BY pais ;";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($result);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}
		echo '</tr>'; 		
	?>	

	<!-- **************
	Estado
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>3.</b> Estado:';
		// define la variable
		$variable_name = 'estado';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT estado 
				FROM paleo_fcb.t_estado
				ORDER BY estado ;";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($result);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}
		echo '</tr>';
	?>	
</table>
<table>
	<!-- **************
	Municipio
	****************-->
	<?php

		// nombre que se imprime en html
		$nombre_combo_box = '<b>4.</b> Municipio:';
		// define la variable
		$variable_name = 'municipio';

		 echo '<tr>';
		 echo '<td valign="top">';
		 echo '<label for="comments">'.$nombre_combo_box.'</label>';
		 echo '</td>';
		 echo '<td valign="top">';
		 echo '<select name='.$variable_name.'>'; 

		// DEFINE QUERY PARA DESPLEGAR EL COMBO BOX
		$query = "SELECT municipio_prov 
				FROM paleo_fcb.t_municipioprov
				GROUP BY municipio_prov 
				ORDER BY municipio_prov ;";
		 
		if ($stmt = $con->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($result);
			// add default
			// echo "<option value =NULL>NULL</option>";			
			while ($stmt->fetch()) 
			 { 
				echo "<option value = '".$result."'>".$result."</option>"; 
			 }
			 echo "</select>"; 
			$stmt->close();
		}
		echo '</tr>';
	?>	

	<tr>
	 <td valign="top">
	  <label for="localidad"><b>5.</b> Localidad: </label>
	 </td>
	 <td valign="top">
	  <textarea  name="localidad" maxlength="200" cols="75" rows="6">NULL</textarea>
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
	  <input type="submit" value="Enviar">  <input type="reset" value="Borrar campos">
	  <br>
	  <br>
	  <a href="http://127.0.0.1/paleoFCB/inicio.html">volver a la p&aacute;gina principal</a> 
	 </td>
	</tr>
</center>

</table>
</form>


