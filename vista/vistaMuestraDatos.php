<?php

function mostrarDatos($link){
        echo "<article>";
        echo "<table>";       
        echo "<tr><td class='coloreada'>DNI</td><td>".$_SESSION['id']."</td></tr>";
        echo "<tr><td class='coloreada'>Nombre</td><td>".$_SESSION['nombre']."</td></tr>"; 
        echo "<tr><td class='coloreada'>Direccion</td><td>".$_SESSION['direccion']."</td></tr>"; 
        echo "<tr><td class='coloreada'>E-mail</td><td>".$_SESSION['email']."</td></tr>"; 
        echo "<tr><td class='coloreada'>Contraseña</td><td>".$_SESSION['pwd']."</td></tr>";        	     
        echo "</table class='coloreada'><a href='index.php'>Volver</a></article>"; 

	}