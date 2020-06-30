<?php
	require 'database.php';
	error_reporting(E_ALL);
    ini_set('display_errors', '1');

//========================================================
// **************************Recuperar parámetros **********************************+
//========================================================

$operacion = $_GET['operacion'];
echo $_GET['jugador'];
switch ($operacion) {
    case 0: //Agregar jugador
        echo "Agregar jugador";
        $nombre = "David";
        $apellido = "Quintero";
        $nickname = "Quinterito";
        $fnacimiento = "1992-04-04";
        $posicion = "Defensa";
        $idEquipo = 1;
        crearJugador($nombre, $apellido, $nickname, $fnacimiento, $posicion, $idEquipo);
        break;
    case 1: // Actualizar jugador
        echo "Actualizar jugador";
        $nombre = "Guillermo";
        $apellido = "Quintero";
        $nickname = "Patas Locas";
        $fnacimiento = "1992-04-04";
        $posicion = "Portero";
        $idEquipo = 1;
        actualizarJugador($_GET['jugador'], $nombre, $apellido, $nickname, $fnacimiento, $posicion, $idEquipo);
      break;
    case 2: // Eliminar jugador
        echo "Eliminar jugador";
        eliminarJugador($_GET['jugador']);
      break;
    case 3: // Consultar jugador
        echo "Consultar jugador";
        consultarJugador($_GET['jugador']);
        break;
  }

//===========================================================
// ****************** Consultar jugador ***********************+
//===========================================================
function consultarJugador($idJugador) {
    global $mysqli;
    $sql = "SELECT * FROM JUGADOR WHERE ID = '".$idJugador."'";
    $resultado = $mysqli->query($sql);
    if(mysqli_num_rows($resultado) > 0){
        while($row = mysqli_fetch_array($result)){
            echo $row["ID"];
            echo $row["NOMBRE"];
            echo $row["APELLIDO"];
            echo $row["NICKNAME"];
            echo $row["FECHA_NACIMIENTO"];
            echo $row["POSICION"];
            echo $row["ID_EQUIPO"];
        }
    } else {
        echo "Error al consultar al jugador";
    }
    //echo ($mysqli->query($sql))? 'Datos del jugador'."\n" : 'Error al consultar el Jugador'."\n";
}

//========================================================
// ****************** Crear jugador ***********************+
//========================================================
function crearJugador($nombre, $apellido, $nickname, $fnacimiento, $posicion, $idEquipo) {
    global $mysqli;
    $sql = "INSERT INTO JUGADOR (ID,NOMBRE,APELLIDO, NICKNAME, FECHA_NACIMIENTO, POSICION, ID_EQUIPO) VALUES(NULL,$nombre, $apellido, $nickname, $fnacimiento, $posicion, $idEquipo)";
    $resultado = $mysqli->query($sql);
    echo ($resultado)? 'Se creó el jugador'."\n" : 'Error al crear el jugador'."\n";
}

    
//===========================================================
// ****************** Actualizar jugador ***********************+
//===========================================================
function  actualizarJugador($idJugador, $nombre, $apellido, $nickname, $fnacimiento, $posicion, $idEquipo) {
    global $mysqli;
    $sql = "UPDATE JUGADOR SET NOMBRE='$nombre',APELLIDO='$apellido',NICKNAME='$nickname',FECHA_NACIMIENTO='$fnacimiento', POSICION='$posicion', ID_EQUIPO='$idEquipo' WHERE ID = '$idJugador'";
    echo ($mysqli->query($sql))? 'Se actualizó el jugador'."\n" : 'Error al actualizar al jugador'."\n";
}

//===========================================================
// ****************** Eliminar jugador ***********************+
//===========================================================
function eliminarJugador($idJugador) {
    global $mysqli;
    $sql = "DELETE FROM JUGADOR WHERE ID = '".$idJugador."'";
    echo ($mysqli->query($sql))? 'Se eliminó el jugador'."\n" : 'Error al eliminar al jugador'."\n";
}


?>