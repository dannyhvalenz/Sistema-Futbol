<?php
	require 'database.php';
	error_reporting(E_ALL);
    ini_set('display_errors', '1');

//========================================================
// **************************Recuperar parámetros **********************************+
//========================================================

$operacion = $_GET['operacion'];
switch ($operacion) {
    case 0: //Agregar torneo
        echo "Agregar torneo";
        crearTorneo("Liga Mexicana de Futbol", "2020-05-01", "2020-12-12");
        break;
    case 1: // Actualizar torneo
        echo "Actualizar torneo";
        actualizarTorneo($_GET['torneo'], "Liga MX", "2020-05-01", "2020-12-12");
      break;
    case 2: // Eliminar torneo
        echo "Eliminar torneo";
        eliminarTorneo($_GET['torneo']);
      break;
    case 3: // Consultar torneo
        echo "Consultar torneo";
        consultarTorneo($_GET['torneo']);
        break;
  }

//===========================================================
// ****************** Consultar torneo ***********************+
//===========================================================
function consultarTorneo($idTorneo) {
    
    $sql = "SELECT * FROM TORNEO WHERE ID = '".$idTorneo."'";
    $resultado = $mysqli->query($sql);
    if(mysqli_num_rows($resultado) > 0){
        while($row = mysqli_fetch_array($result)){
            echo $row["ID"];
            echo $row["NOMBRE"];
            echo $row["FECHA_INICIAL"];
            echo $row["FECHA_FINAL"];
        }
    } else {
        echo "Error al consultar el torneo";
    }
    //echo ($mysqli->query($sql))? 'Datos del jugador'."\n" : 'Error al consultar el Jugador'."\n";
}

//========================================================
// ****************** Crear torneo ***********************+
//========================================================
function crearTorneo($nombre, $fechaIncial, $fechaFinal) {
    $sql = "INSERT INTO TORNEO (ID,NOMBRE,FECHA_INICIAL, FECHA_FINAL) VALUES(NULL,$nombre, $fechaIncial, $fechaFinal)";
    $resultado = $mysqli->query($sql);
    echo ($resultado)? 'Se creó el torneo'."\n" : 'Error al crear el torneo'."\n";
}

    
//===========================================================
// ****************** Actualizar torneo ***********************+
//===========================================================
function  actualizarTorneo($idTorneo, $nombre, $fechaIncial, $fechaFinal) {
    $sql = "UPDATE TORNEO SET NOMBRE='$nombre', FECHA_INICIAL='$fechaIncial',FECHA_FINAL='$fechaFinal' WHERE ID = '$idTorneo'";
    echo ($mysqli->query($sql))? 'Se actualizó el torneo'."\n" : 'Error al actualizar el torneo'."\n";
}

//===========================================================
// ****************** Eliminar torneo ***********************+
//===========================================================
function eliminarTorneo($idTorneo) {
    $sql = "DELETE FROM TORNEO WHERE ID = '".$idTorneo."'";
    echo ($mysqli->query($sql))? 'Se eliminó la noticia'."\n" : 'Error al eliminar la noticia'."\n";
}


?>