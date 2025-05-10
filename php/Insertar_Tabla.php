
<?php

// Función para insertar datos en la tabla
function crear_registro() {
  $id_inscripcion = $_POST["INSCRIPCION"];
  
  $nombre = $_POST["NOMBRE"];
  
  $direccion = $_POST["DIRECCION"];

  $fecha_nacimiento = $_POST["FECHA_NACIMIENTO"];
  
  $sexo = $_POST["SEXO"];
  
  $nss = $_POST["NSS"];

  require_once("Conexion.php");
  $conexion = mysqli_connect($servername, $username, $password, $database);

  $consulta = "SELECT * FROM altas WHERE INSCRIPCION = '$id_inscripcion'";
  $resultado = mysqli_query($conexion, $consulta);

  if (mysqli_num_rows($resultado) > 0) {
    echo "El registro ya existe";
  } else {
    $consulta = "INSERT INTO altas (INSCRIPCION, NOMBRE, DIRECCION, FECHA_NACIMIENTO, SEXO, NSS) VALUES ('$id_inscripcion', '$nombre', '$direccion', '$fecha_nacimiento', '$sexo', '$nss')";
    mysqli_query($conexion, $consulta);
  }
}

?>