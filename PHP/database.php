<?php

	$server = '3.15.219.220';
	$username = 'aerolinea';
	$password = 'gygkaM-hixtiw-bydru6';
	$database = 'soccer';
	
	$mysqli = new mysqli($server,$username,$password,$database); 
	mysqli_set_charset( $mysqli, 'utf8');
	if(mysqli_connect_errno()){
			echo 'Conexion Fallida : ', mysqli_connect_error();
			exit();
	} 

?>