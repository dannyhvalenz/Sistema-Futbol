<?php
	require 'database.php';
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	function sort_by_orden ($a,$b) {
		if($a["puntos"] == $b["puntos"]){
			return ($a["numero_goles"]>$b["numero_goles"]) ?  -1 : 1;
		}
		return ($a["puntos"]>$b["puntos"])?  -1 : 1;
	}

	//======================================================================
	// ***************** Crear tabla de resultados ***********************+
	//======================================================================


	$tablaPosiciones = array();

	$equipos = array();

	 
	$sql = "SELECT ID,NOMBRE FROM EQUIPO";
	$result = $mysqli->query($sql);

	while($row = $result->fetch_object()){
	   array_push($equipos, array('id'=> $row->{'ID'},'nombre'=> $row->{'NOMBRE'}));
	}
	
	
	


	
	foreach ($equipos as $equipo) {
		$id_Equipo = $equipo['id'];

				$sql = "SELECT COUNT(ID_EQUIPO) AS PARTIDOS_JUGADOS FROM PARTICIPA WHERE ID_EQUIPO = $id_Equipo";

				$partidosJugados = intval($mysqli->query($sql)->fetch_object()->{'PARTIDOS_JUGADOS'});

				$sql = "SELECT COUNT(PUNTOS) AS PARTIDOS_GANADOS FROM PARTICIPA WHERE ID_EQUIPO = $id_Equipo AND PUNTOS = 3";
				$partidosGanados = intval($mysqli->query($sql)->fetch_object()->{'PARTIDOS_GANADOS'});

				$sql = "SELECT COUNT(PUNTOS) AS PARTIDOS_EMPATADOS FROM PARTICIPA WHERE ID_EQUIPO = $id_Equipo AND PUNTOS = 1";
				$partidosEmpatados = intval($mysqli->query($sql)->fetch_object()->{'PARTIDOS_EMPATADOS'});

				$sql = "SELECT COUNT(PUNTOS) AS PARTIDOS_PERDIDOS FROM PARTICIPA WHERE ID_EQUIPO = $id_Equipo AND PUNTOS = 0";
				$partidosPerdidos = intval($mysqli->query($sql)->fetch_object()->{'PARTIDOS_PERDIDOS'});
				
				$sql = "SELECT ID_PARTIDO, VISITANTE FROM PARTICIPA WHERE ID_EQUIPO = $id_Equipo";
				$resultado = $mysqli->query($sql);
				
				$numeroGoles = 0;
				
				while($row = $resultado->fetch_object()){
					
					$id_Partido = $row->{'ID_PARTIDO'};
					$visitante = intval($row->{'VISITANTE'});
					
					if($visitante == 1){
						$sql = "SELECT GOLES_VISITANTE FROM PARTIDO WHERE ID = $id_Partido";
						$golesTemp = $mysqli->query($sql)->fetch_object()->{'GOLES_VISITANTE'};
						$numeroGoles += $golesTemp;
						
					}else{
						$sql = "SELECT GOLES_LOCAL FROM PARTIDO WHERE ID = $id_Partido";
						$golesTemp = $mysqli->query($sql)->fetch_object()->{'GOLES_LOCAL'};
						$numeroGoles += $golesTemp;
					}
						
				
				}
				
				
				$puntos = ($partidosGanados * 3) + ($partidosEmpatados * 1);
				 
				$datosEquipo = array('nombre'=> $equipo['nombre'],'partidos_jugados'=>$partidosJugados,'partidos_ganados'=>$partidosGanados,'partidos_empatados'=>$partidosEmpatados,'partidos_perdidos'=>$partidosPerdidos,'numero_goles'=>$numeroGoles,'puntos'=>$puntos);
		array_push($tablaPosiciones,$datosEquipo);
	}

	


	usort($tablaPosiciones, 'sort_by_orden');

	header('Content-type: application/json; charset=utf-8');
	echo json_encode(array('data'=>$tablaPosiciones));


	
?>