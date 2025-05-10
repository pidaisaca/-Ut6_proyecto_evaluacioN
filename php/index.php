<html>
    <head>
        <title>Evaluación UT6</title>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    </head>
    <body>
        <h1>Tabla de Altas</h1>
            <!-- Creacion de los campos de texto para introducir los datos   -->
            <div class="formulario">
                <form action="" method="POST">
                        <input type="text" id="id_inscripcion" name="INSCRIPCION" placeholder="ID Inscripción">
                        <input type="text" id="nombre" name="NOMBRE" placeholder="Nombre">
                        <input type="text" id="direccion" name="DIRECCION" placeholder="Dirección">
                        <input type="text" id="fecha_nacimiento" name="FECHA_NACIMIENTO" placeholder="Fecha de nacimiento">
                        <input type="text" id="sexo" name="SEXO" placeholder="Sexo">
                        <input type="text" id="nss" name="NSS" placeholder="NSS">
                        <button id="crear" name="Crear">Crear</button>
                        <?php
                        //Llamada a las funciones de php. Requiere que el boton Crear sea pulsado
                            require_once ("Insertar_Tabla.php");
                            if (isset($_POST["Crear"])) {
                            crear_registro();
                            }
                        ?>
                </form>
            </div>

            <?php
//Creacion de la tabla con los datos de la base de datos
// Tambien con los botones de borrar y editar que llaman a las funciones php correspondientes
                function getAltas($conexion){
                    $sql= "SELECT * FROM altas";
                    $consulta=mysqli_query($conexion, $sql);
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Inscripción</th>";
                    echo "<th>Nombre</th>";
                    echo "<th>Dirección</th>";
                    echo "<th>Fecha de nacimiento</th>";
                    echo "<th>Sexo</th>";
                    echo "<th>NSS</th>";
                    echo "<th>Acciones 1</th>";
                    echo "<th>Acciones 2</th>";
                    echo "</tr>";
                        while ($file = mysqli_fetch_assoc($consulta)) {
                            echo "<tr>";
                            echo "<td>".$file['INSCRIPCION']."</td>";
                            echo "<td>".$file['NOMBRE']."</td>";
                            echo "<td>".$file['DIRECCION']."</td>";
                            echo "<td>".$file['FECHA_NACIMIENTO']."</td>";
                            echo "<td>".$file["SEXO"]."</td>";
                            echo "<td>".$file['NSS']."</td>";
                            echo "<td><form action='' method='post'><input type='hidden' name='id' value='".$file['INSCRIPCION']."'><button type='submit'>Borrar</button></form></td>";
                            if (isset($_POST['id'])) {
                                require_once 'Borrar_Tabla.php';
                                borrar_registro($_POST['id']);
                                getAltas($conexion);
                            }
                            echo "<td><button class='btn btn-primary' onclick='window.location.href=\"Editar_Tabla.php?id=$file[INSCRIPCION]\"'>Editar</button></td>";
                            echo "</tr>";
                    }
                echo "</table>";
                }

                require("Conexion.php");
                $conexion = mysqli_connect($servername, $username, $password, $database);

                getAltas($conexion);

            ?>
        </table>
    </body>
</html>