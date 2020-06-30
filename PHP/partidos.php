<?php
	require 'database.php';
	error_reporting(E_ALL);
    ini_set('display_errors', '1');

//========================================================
// **************************Recuperar parámetros **********************************+
//========================================================

$operacion = $_GET['operacion'];
switch ($operacion) {
    case 0: //Agregar partido
        echo "Agregar partido";
        $idEquipoLocal = 1;
        $idEquipoVisitante = 6;

        $golesLocal = 2;
        $golesVisitante = 1;

        $puntosLocal = 3;
        $puntosVisitante = 0;

        //$partido= 10; 
        crearPartido($idEquipoLocal, $idEquipoVisitante,$golesLocal, $golesVisitante, $puntosLocal, $puntosVisitante);
        break;
    case 1: // Actualizar partido
        echo "Actualizar partido";
        $idEquipoLocal = 1;
        $idEquipoVisitante = 6;

        $golesLocal = 2;
        $golesVisitante = 1;

        $puntosLocal = 3;
        $puntosVisitante = 0;
        actualizarPartido($idEquipoLocal, $idEquipoVisitante,$golesLocal, $golesVisitante, $puntosLocal, $puntosVisitante, $_GET['partido']);
      break;
    case 2: // Eliminar partido
        echo "Eliminar partido";
        eliminarPartido($_GET['partido']);
      break;
    case 3: // Consultar partido
        echo "Consultar partido";
        consultarPartido($_GET['partido']);
        break;
  }

//===========================================================
// ****************** Consultar partido con asignación de puntos ***********************+
//===========================================================
function consultarPartido($partido) {
    global $mysqli;
    $sql = "SELECT * FROM PARTIDO WHERE ID = '".$partido."'";
    echo ($mysqli->query($sql))? 'Datos del partido'."\n" : 'Error al consultar el partido'."\n";

    $sql = "SELECT * FROM PARTIDO WHERE ID = '".$partido."'";
    echo ($mysqli->query($sql))? 'Datos del partido'."\n" : 'Error al consultar el partido'."\n";
}

//========================================================
// ****************** Crear partido con asignación de puntos ***********************+
//========================================================
function crearPartido($idEquipoLocal, $idEquipoVisitante,$golesLocal, $golesVisitante, $puntosLocal, $puntosVisitante) {
    global $mysqli;
    $sql = "INSERT INTO PARTIDO (ID,GOLES_LOCAL,GOLES_VISITANTE) VALUES(NULL,$golesLocal,$golesVisitante)";
    $resultado = $mysqli->query($sql);
    // recuperar ultimo partido insertado
    $last_id = $mysqli->insert_id;
    echo ($resultado)? 'Creo partido'."\n" : 'Error en crear partido'."\n";

    $sql = "INSERT INTO PARTICIPA VALUES($last_id,$idEquipoLocal,1,FALSE,$idEquipoVisitante,$puntosLocal)";
    echo ($mysqli->query($sql))? 'Se añadió puntos a equipo local'."\n" : 'Error al añadir puntos a equipo local'."\n";

    $sql = "INSERT INTO PARTICIPA VALUES($last_id,$idEquipoVisitante,1,TRUE,$idEquipoLocal,$puntosVisitante)";
    echo ($mysqli->query($sql))? 'Se añadió puntos a equipo visitante'."\n" : 'Error al añadir puntos a equipo visitante'."\n";
}

    
//===========================================================
// ****************** Actualizar partido con asignación de puntos ***********************+
//===========================================================
function actualizarPartido($idEquipoLocal, $idEquipoVisitante,$golesLocal, $golesVisitante, $puntosLocal, $puntosVisitante, $partido){
    global $mysqli;
    $sql = "UPDATE PARTIDO SET GOLES_LOCAL='$golesLocal', GOLES_VISITANTE='$golesVisitante' WHERE ID = '$partido'";
    echo ($mysqli->query($sql))? 'Se actualizó el partido'."\n" : 'Error al actualizar el partido'."\n";

    // Recuperar ids participa del partido
    $sql = "INSERT INTO PARTIDO (ID,GOLES_LOCAL,GOLES_VISITANTE) VALUES(NULL,$golesLocal,$golesVisitante)";
    //echo ($mysqli->query($sql))? 'Consultar participantes del partido'."\n" : 'Error al consultar participantes del partido'."\n";
    $resultado = $mysqli->query($sql);
    if(mysqli_num_rows($resultado) > 0){
        $fila = mysql_fetch_row($resultado);
        $idParticipaLocal = $fila[0]['ID'];
        $idParticipaVisitante = $fila[1]['ID'];
    } else {
        echo "Error al consultar los participantes del partido";
    }

    $sql = "UPDATE PARTICIPA SET ID_PARTIDO='$partido', ID_EQUIPO='$idEquipoLocal',ID_TORNEO=1,VISITANTE=FALSE, CONTRINCANTE='$idEquipoVisitante', PUNTOS='$puntosLocal' WHERE ID = '$idParticipaLocal'";
    echo ($mysqli->query($sql))? 'Se actualizaron los puntos a equipo local'."\n" : 'Error al actualizar puntos del equipo local'."\n";

    $sql = "UPDATE PARTICIPA SET ID_PARTIDO='$partido', ID_EQUIPO='$idEquipoVisitante',ID_TORNEO=1,VISITANTE=TRUE, CONTRINCANTE='$idEquipoLocal', PUNTOS='$puntosVisitante' WHERE ID = '$idParticipaVisitante'";
    echo ($mysqli->query($sql))? 'Se actualizaron los puntos a equipo visitante'."\n" : 'Error al actualizar puntos del equipo visitante'."\n";
}

//===========================================================
// ****************** Eliminar partido con asignación de puntos ***********************+
//===========================================================
function eliminarPartido($partido) {
    global $mysqli;
    $sql = "DELETE FROM PARTICIPA WHERE ID_PARTIDO = '".$partido."'";
    echo ($mysqli->query($sql))? 'Se eliminaron los puntos el partido'."\n" : 'Error al eliminar el los puntos del partido'."\n";


    $sql = "DELETE FROM PARTIDO WHERE ID = '".$partido."'";
    echo ($mysqli->query($sql))? 'Se eliminó el partido'."\n" : 'Error al eliminar el partido'."\n";
}


?>