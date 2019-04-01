<?php
	function mostrarHeader(){
		echo "<!DOCTYPE html><html><head><title>mantenimientoClientes</title><meta charset='utf-8'>";
		echo "<link rel='stylesheet' type='text/css' href='estilos.css'></head>";
		echo "<link href='https://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet'>";
		echo "<body><header><h1>VIRTUAL MARKET</h1>";
		echo "<form action='index.php' method='post'>";
		echo "<ul><li><input type='submit' name='lista' value='LISTADO'></li>";
		echo "<li><input type='submit' name='alta' value='ALTA'></li>";
		echo "<li><input type='submit' name='baja' value='BAJA'></li>";
		echo "<li><input type='submit' name='modificar' value='MODIFICACIONES'></li>";
		echo "<li><input type='submit' name='consultar' value='CONSULTA'></li>";
		echo "</ul></form></header>";
	}
