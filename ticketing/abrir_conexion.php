<?php
	$host = "localhost";
	$usuariodb = "root";
	$clavedb = "Barcelona1.";
	$basededatos = "Ticketing";

	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);
	if ($conexion->connect_errno) {
	    echo "Error al conectar con la base de datos.";
	    exit();
	}
?>
