<?php
	require 'database.php';
	error_reporting(E_ALL);
    ini_set('display_errors', '1');

//========================================================
// **************************Recuperar parámetros **********************************+
//========================================================

$operacion = $_GET['operacion'];
echo $_GET['equipo'];
switch ($operacion) {
    case 0: //Agregar partido
        echo "Agregar equipo";
        $nombre = "Atletico de Madrid";
        $entrenador = "Lucio Bernal";
        crearEquipo($nombre, $entrenador);
        break;
    case 1: // Actualizar partido
        echo "Actualizar partido";
        $nombre = "Panteras moradas";
        $entrenador = "Ignacio Aldana";
        $idEquipo = 7; 
        actualizarEquipo($idEquipo,$nombre, $entrenador);
      break;
    case 2: // Eliminar Equipo
        echo "Eliminar Equipo";
        eliminarEquipo($_GET['equipo']);
      break;
    case 3: // Consultar Equipo
        echo "Consultar Equipo";
        consultarEquipo($_GET['equipo']);
        break;
  }

//===========================================================
// ****************** Consultar equipo ***********************+
//===========================================================
function consultarEquipo($Equipo) {
    
    $sql = "SELECT * FROM EQUIPO WHERE ID = '".$Equipo."'";
    $resultado = $mysqli->query($sql);
    if(mysqli_num_rows($resultado) > 0){
        while($row = mysqli_fetch_array($result)){
            echo $row["ID"];
            echo $row["NOMBRE"];
            echo $row["ENTRENADOR"];
        }
    } else {
        echo "Error al consultar el Equipo";
    }
    //echo ($mysqli->query($sql))? 'Datos del equipo'."\n" : 'Error al consultar el Equipo'."\n";
}

//========================================================
// ****************** Crear equipo ***********************+
//========================================================
function crearEquipo($nombre, $entrenador) {
    $sql = "INSERT INTO EQUIPO (ID,NOMBRE,ENTRENADOR) VALUES(NULL,$nombre,$entrenador)";
    $resultado = $mysqli->query($sql);
    echo ($resultado)? 'Se creó el equipo'."\n" : 'Error al crear equipo'."\n";
}

    
//===========================================================
// ****************** Actualizar equipo ***********************+
//===========================================================
function actualizarEquipo($idEquipo, $nombre,$entrenador){
    $sql = "UPDATE EQUIPO SET NOMBRE='$nombre', ENTRENADOR='$entrenador' WHERE ID = '$idEquipo'";
    echo ($mysqli->query($sql))? 'Se actualizó el equipo'."\n" : 'Error en actualizar el equipo'."\n";
}

//===========================================================
// ****************** Eliminar equipo ***********************+
//===========================================================
function eliminarEquipo($Equipo) {
    $sql = "DELETE FROM EQUIPO WHERE ID = '".$Equipo."'";
    echo ($mysqli->query($sql))? 'Se eliminó el equipo'."\n" : 'Error al eliminar el equipo'."\n";
}


?>