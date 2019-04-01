<?php
	function mostrarLista($link){
		$result = $link->prepare("SELECT dniCliente, nombre FROM clientes");
        $result->execute(); 

        echo "<article>";
        echo "<table><tr><td class='coloreada'>DNI</td><td class='coloreada'>Nombre</td></tr>";
        while($fila=$result->fetch(PDO::FETCH_ASSOC)){
        	echo "<tr><td>".$fila['dniCliente']."</td><td>".$fila['nombre']."</td></tr>";       	
        }
        echo "</table><a href='index.php'>Volver</a></article>";      
	}
