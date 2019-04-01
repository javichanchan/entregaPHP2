<?php 

	function vistaPideId($link, $queHacer){
		//FORMULARIO PARA PEDIR DNI, CUYA RESPUESTA VUELVE AL CONTROLADOR
		echo "<article>";
		switch ($queHacer) {
			case 'alta':
				echo "<h2>Introduzca el DNI del nuevo cliente.</h2>"; 
				break;

			case 'modificar':
				echo "<h2>Introduzca el DNI del cliente a modificar.</h2>"; 
				break;

			case 'consultar':
				echo "<h2>Introduzca el DNI del cliente a consultar.</h2>";
				break;

			case 'baja':
				echo "<h2>Introduzca el DNI del cliente que vamos a eliminar.</h2>";
				break;
			
			default:
				echo "<p>Cuidado. El programa no sabe lo que hace.</p>";
				break;
		}

		echo "<form action='index.php' method='post'>";	
		echo "<table>";	
		echo "<tr><td class='coloreada'>DNI: </td><td><input type='text' name='DNI' class='introducir'></td></tr><br>";
		echo "<input type='hidden' name=$queHacer value=$queHacer>";
		echo "</table>";	
		echo "<input type='submit' id='submit' name='DNIpedido' value='Continuar'>";				
		echo "</form><a href='index.php'>Cancelar</a></article>";
	}

	function mensajeExiste($siONo){
		echo "<article>";
		if($siONo=="si") echo "<h2>ERROR: El DNI que escribiste ya está registrado.</h2>";
			else if($siONo=="no") echo "<h2>ERROR: El DNI que escribiste no existe.</h2>";	
			else echo "<h2>ERROR: No has escrito nada.</h2>";	
		echo "<a href='index.php'>Volver</a>";
		echo "</article>";
	}

	


