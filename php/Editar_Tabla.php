<html>
    <head>
        <title>Evaluación UT6</title>
        <link rel="stylesheet" type="text/css" href="../css/estilo2.css">
    </head>
    <body>
        <h1>Editar registro</h1>

    <?php
    function editar_registro($id) {
        require("Conexion.php");
        $conexion = mysqli_connect($servername, $username, $password, $database);
        $consulta = "SELECT * FROM altas WHERE INSCRIPCION = '$id'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_assoc($resultado);
    
        // Mostrar los campos de texto con la información del registro
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='id' value='".$id."'>";
    
        echo "<label>Nombre:</label>"; echo "&nbsp"; echo "&nbsp";
        echo "<input type='text' name='nombre' value='".$fila['NOMBRE']."'>";
        echo "<br>";
        echo "<br>";
        echo "<label>Dirección:</label>"; echo "&nbsp"; echo "&nbsp";
        echo "<input type='text' name='direccion' value='".$fila['DIRECCION']."'>";
        echo "<br>";
        echo "<br>";
        echo "<label>Fecha de nacimiento:</label>"; echo "&nbsp"; echo "&nbsp";
        echo "<input type='text' name='fecha_nacimiento' value='".$fila['FECHA_NACIMIENTO']."'>";
        echo "<br>";
        echo "<br>";
        echo "<label>Sexo:</label>"; echo "&nbsp"; echo "&nbsp";
        echo "<input type='text' name='sexo' value='".$fila['SEXO']."'>";
        echo "<br>";
        echo "<br>";
        echo "<label>NSS:</label>"; echo "&nbsp"; echo "&nbsp";
        echo "<input type='text' name='nss' value='".$fila['NSS']."'>";
        echo "<br>";
        echo "<br>";
        echo "<button id='guardar' name='Guardar'>Guardar cambios</button>";
        echo "</form>";
    
        // Guardar los cambios si se pulsa el botón
        if (isset($_POST["Guardar"])) {
            $nombre = $_POST["nombre"];
            $direccion = $_POST["direccion"];
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
            $sexo = $_POST["sexo"];
            $nss = $_POST["nss"];
    
            $consulta = "UPDATE altas SET NOMBRE = '$nombre', DIRECCION = '$direccion', FECHA_NACIMIENTO = '$fecha_nacimiento', SEXO = '$sexo', NSS = '$nss' WHERE INSCRIPCION = '$id'";
            mysqli_query($conexion, $consulta);
    
            // Redirigir al index.php después de guardar los cambios
            header("Location: index.php");
            exit;
        }
    }
        $id = $_GET["id"];
        editar_registro($id);
    ?>

    </body>
</html>
