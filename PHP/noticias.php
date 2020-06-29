<?php
	require 'database.php';
	error_reporting(E_ALL);
    ini_set('display_errors', '1');

//========================================================
// **************************Recuperar parámetros **********************************+
//========================================================

$operacion = $_GET['operacion'];
switch ($operacion) {
    case 0: //Agregar noticia
        echo "Agregar noticia";
        $autor = "David Moran";
        $fecha = "2020-08-10";
        $titulo = "El mejor gol del torneo";
        $cuerpo = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor nibh molestie nulla dapibus ullamcorper. Sed at lacus id ipsum elementum congue sit amet posuere nunc. Proin tincidunt congue nulla quis pulvinar. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eget massa diam. Cras posuere tellus nec eros malesuada gravida. Nam eget accumsan nisl. Pellentesque placerat ultricies justo, quis dapibus nisl molestie non. Cras id erat iaculis, ullamcorper arcu bibendum, aliquam massa. Nullam venenatis risus odio, vitae aliquet libero laoreet eget. Suspendisse justo ante, sagittis eu ipsum imperdiet, vulputate dictum nisi.";
        $idTorneo = 1;
        crearNoticia($autor, $fecha, $titulo, $cuerpo, $idTorneo);
        break;
    case 1: // Actualizar noticia
        echo "Actualizar noticia";
        $autor = "David Miramontes";
        $fecha = "2020-08-10";
        $titulo = "El peor penal del torneo";
        $cuerpo = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor nibh molestie nulla dapibus ullamcorper. Sed at lacus id ipsum elementum congue sit amet posuere nunc. Proin tincidunt congue nulla quis pulvinar. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eget massa diam. Cras posuere tellus nec eros malesuada gravida. Nam eget accumsan nisl. Pellentesque placerat ultricies justo, quis dapibus nisl molestie non. Cras id erat iaculis, ullamcorper arcu bibendum, aliquam massa. Nullam venenatis risus odio, vitae aliquet libero laoreet eget. Suspendisse justo ante, sagittis eu ipsum imperdiet, vulputate dictum nisi.";
        $idTorneo = 1;
        actualizarNoticia($_GET['noticia'], $autor, $fecha, $titulo, $cuerpo, $idTorneo);
      break;
    case 2: // Eliminar noticia
        echo "Eliminar noticia";
        eliminarNoticia($_GET['noticia']);
      break;
    case 3: // Consultar noticia
        echo "Consultar noticia";
        consultarNoticia($_GET['noticia']);
        break;
  }

//===========================================================
// ****************** Consultar noticia ***********************+
//===========================================================
function consultarNoticia($idNoticia) {
    
    $sql = "SELECT * FROM NOTICIA WHERE ID = '".$idNoticia."'";
    $resultado = $mysqli->query($sql);
    if(mysqli_num_rows($resultado) > 0){
        while($row = mysqli_fetch_array($result)){
            echo $row["ID"];
            echo $row["AUTOR"];
            echo $row["FECHA"];
            echo $row["TITULO"];
            echo $row["CUERPO"];
            echo $row["ID_TORNEO"];
        }
    } else {
        echo "Error al consultar la noticia";
    }
    //echo ($mysqli->query($sql))? 'Datos del jugador'."\n" : 'Error al consultar el Jugador'."\n";
}

//========================================================
// ****************** Crear noticia ***********************+
//========================================================
function crearNoticia($autor, $fecha, $titulo, $cuerpo, $idTorneo) {
    $sql = "INSERT INTO NOTICIA (ID,AUTOR,FECHA, TITULO, CUERPO, ID_TORNEO) VALUES(NULL,$autor, $fecha, $titulo, $cuerpo, $idTorneo)";
    $resultado = $mysqli->query($sql);
    echo ($resultado)? 'Se creó la noticia'."\n" : 'Error al crear la noticia'."\n";
}

    
//===========================================================
// ****************** Actualizar noticia ***********************+
//===========================================================
function  actualizarNoticia($idNoticia, $autor, $fecha, $titulo, $cuerpo, $idTorneo) {
    $sql = "UPDATE JUGADOR SET AUTOR='$autor', FECHA='$fecha',TITULO='$titulo',CUERPO='$cuerpo', ID_TORNEO='$idTorneo' WHERE ID = '$idNoticia'";
    echo ($mysqli->query($sql))? 'Se actualizó la noticia'."\n" : 'Error al actualizar la noticia'."\n";
}

//===========================================================
// ****************** Eliminar noticia ***********************+
//===========================================================
function eliminarNoticia($idNoticia) {
    $sql = "DELETE FROM NOTICIA WHERE ID = '".$idNoticia."'";
    echo ($mysqli->query($sql))? 'Se eliminó la noticia'."\n" : 'Error al eliminar la noticia'."\n";
}


?>