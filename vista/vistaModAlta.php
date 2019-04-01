<?php	

	function mostrarModAlta($link, $queHacer){
		echo "<article>";
		if($queHacer=='alta'){
			echo "<h2>Formulario de alta.</h2>";
		}else{
			echo "<h2>Formulario de modificaciones.</h2>";
		}

		echo "<form action='' method ='post'><table>";
		echo "<input type='hidden' name='op' value='$queHacer'>";
		echo "<tr><td class='coloreada'>Nombre: </td><td><input type='text' name='nombre' class='introducir' value='".$_SESSION['nombre']."'></td></tr>";
		echo "<tr><td class='coloreada'>Direccion: </td><td><input type='text' name='direccion' class='introducir' value='".$_SESSION['direccion']."'></td></tr>";
		echo "<tr><td class='coloreada'>e-mail: </td><td><input type='text' name='email' class='introducir' value='".$_SESSION['email']."'></td></tr>";
		echo "<tr><td class='coloreada'>Contraseña: </td><td><input type='text' name='pwd' class='introducir' value='".$_SESSION['pwd']."'></td></tr></table>";
		echo "<input type='submit' id='submit' name='modalta' value='Enviar'></form>";
		echo "<a href='index.php'>Cancelar</a>";
		echo "</article>";
	}

	function mensajeFaltan(){
		echo "<article>";
		echo "<h2>ERROR: Algunos campos no están rellenos.</h2>";	
		echo "<a href='index.php'>Volver</a>";
		echo "</article>";
	}

