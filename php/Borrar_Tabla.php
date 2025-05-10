<?php 

function borrar_registro($id) {
    require("Conexion.php");
    $conexion = mysqli_connect($servername, $username, $password, $database);
    $consulta = "DELETE FROM altas WHERE INSCRIPCION = '$id'";
    mysqli_query($conexion, $consulta);
    header("Location: index.php");
}