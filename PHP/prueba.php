<?php
	require 'database.php';
	
	function sort_by_orden ($a, $b) {
		return $b['puntos'] - $a['puntos'];
	}
//======================================================================
// ***************** Crear jugadores ***********************+
//======================================================================
	
	$nombres = ['Jeronimo Mena mulaUDEC','Amador Matas oRoLATEN','Erica Sabater bRaGniUs','Clotilde Solana MideCEDI','Petra Casas LEventid'];
	$posiciones = ['Defensa central','Defensor lateral','Segundo delantero','Delantero','Delantero centro','Portero'];
	
	$id = 6;
	
//	foreach ($nombres as $nombre) {
//		$fechaNacimiento = rand(1980,2005).'-'.rand(1,12).'-'.rand(1,31);
//		$nombre = explode(" ", $nombre);
//		$posicion = $posiciones[rand(0,5)];
//		$sql = "INSERT INTO JUGADOR (ID,NOMBRE,APELLIDO,NICKNAME,IMAGEN,FECHA_NACIMIENTO,POSICION,ID_EQUIPO) VALUE(null,'$nombre[0]','$nombre[1]','$nombre[2]','','$fechaNacimiento','$posicion',$id)";
////		if($mysqli->query($sql)){
////			echo 'Éxito'."\n";
////		}else{
////			printf("Errormessage: %s\n", $mysqli->error);
////		}
//	}
	
//======================================================================
// ***************** Crear noticias ***********************+
//======================================================================
	
	$titulos = ['Diego Martínez: Europa es una exigencia para otros equipos','El Valdepeñas hace historia y disputará la final ante el Inter','Así está la lucha por la Bota de Oro: Lewandowski afianza su liderato','Las mejores imágenes del Celta Barcelona','Unai López agradece la frescura que han dado los cambios'];
	
	$cuerpo = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque enim massa, consectetur ac feugiat nec, ornare vel nisi. Nunc sit amet metus libero. Quisque nec orci a tortor ullamcorper congue. Cras commodo turpis sed felis sagittis, interdum egestas libero cursus. Donec condimentum rutrum tristique. Curabitur pharetra interdum metus, ut rhoncus ipsum dignissim at. Integer dapibus lacinia risus vitae tempor. Vestibulum ultricies nulla non nulla accumsan viverra. Praesent dignissim orci id venenatis vestibulum. Donec a eleifend augue, sed facilisis enim. Maecenas consectetur ipsum in cursus accumsan. Ut vitae auctor magna.';
	
	$autores = ['Petra Casas','Maite Espinoza','Juliana Ibarra','Juan Dios Singh','Juan Pedro Postigo'];
	
	$fecha = '2020-07-27';
	$idTorneo = 1;	
	
//	for ($i = 0; $i<5; $i++) {
//		$sql = "INSERT INTO NOTICIA(ID,AUTOR,FECHA,TITULO,CUERPO,IMAGEN,ID_TORNEO) VALUE(NULL,'$autores[$i]','$fecha','$titulos[$i]','$cuerpo','',$idTorneo)";
//		
//			if($mysqli->query($sql)){
//					echo 'Éxito'."\n";
//			}else{
//					printf("Errormessage: %s\n", $mysqli->error);
//			}	
//		}
		

//======================================================================
// ***************** Crear partidos con asignación de puntos ***********************+
//======================================================================



 $idEquipoLocal = 1;
 $idEquipoVisitante = 6;

 $golesLocal = 2;
 $golesVisitante = 1;

 $puntosLocal = 3;
 $puntosVisitante = 0;

 $partido= 10; 


 $sql = "INSERT INTO PARTIDO (ID,GOLES_LOCAL,GOLES_VISITANTE) VALUES(NULL,$golesLocal,$golesVisitante)";
 echo ($mysqli->query($sql))? 'Creo partido'."\n" : 'Error en crear partido'."\n";
 
 
 $sql = "INSERT INTO PARTICIPA VALUES($partido,$idEquipoLocal,1,FALSE,$idEquipoVisitante,$puntosLocal)";
 echo ($mysqli->query($sql))? 'Se añadio puntos a equipo local'."\n" : 'Error al añadir puntos a equipo local'."\n";
 
 $sql = "INSERT INTO PARTICIPA VALUES($partido,$idEquipoVisitante,1,TRUE,$idEquipoLocal,$puntosVisitante)";
 echo ($mysqli->query($sql))? 'Se añadio puntos a equipo visitante'."\n" : 'Error al añadir puntos a equipo visitante'."\n";
 	
 
	
?>