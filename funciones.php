<?php

function existe($link){
	try{
		$result=$link->prepare("SELECT * FROM clientes where dniCliente=:dniCliente");
		$result->bindParam(':dniCliente', $_SESSION['id']);
		$result->execute();
		return $fila=$result->fetch(PDO::FETCH_ASSOC);
		
	}catch(PDOException $e){
		print "<p>Error: No puede conectarse con la base de datos.</p><br><br>";
        print "<p>Error: ".$e->getMessage()."</p><br>";
        print "<p>Si no entiende lo que pone, avise a un informático.</p><br>";
	}
}

