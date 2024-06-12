<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imgC = isset($_POST["imgC"]) ? $_POST["imgC"] : null;
    $id = $_POST["id"];

    include_once "../conex.php";

    if (!$imgC) {
        // Obtener datos del formulario
        $nombre = $_POST['nombre'];
        $entrenador = $_POST['entrenador'];
        $numnadadores = $_POST['numnadadores'];
        $categoria = $_POST['categoria'];
        $foto = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];

        // Mover la foto subida a una carpeta en el servidor
        $upload_dir = '../img/upload/equipos/';
        $foto_path = $upload_dir . basename($foto);

        // Preparar la consulta SQL
        $sql = "UPDATE equiposnatacion SET NombreEquipo=?, Entrenador=?, NumNadadores=?, Categoria=?, Foto=? WHERE id=?";
        $declaracion = $conexion->prepare($sql);
        $declaracion->bind_param("ssissi", $nombre, $entrenador, $numnadadores, $categoria, $foto_path, $id);

        // Mover la imagen a la carpeta de destino
        if (!move_uploaded_file($foto_tmp, $foto_path)) {
            die("Error al mover el archivo.");
        }
        // Ejecutar la consulta
        if ($declaracion->execute()) {
            echo "El registro se ha agregado correctamente.";
        } else {
            echo "Error al agregar el registro: " . $declaracion->error;
        }

        // Cerrar la conexión
        $conexion->close();
        echo "  <script>
            alert('Agregado con exito');
            location.href = './consulta.php';
        </script>";
        exit;


    } else {
        // Obtener datos del formulario
        $nombre = $_POST['nombre'];
        $entrenador = $_POST['entrenador'];
        $numnadadores = $_POST['numnadadores'];
        $categoria = $_POST['categoria'];

        // Preparar la consulta SQL
        $sql = "UPDATE equiposnatacion SET NombreEquipo=?, Entrenador=?, NumNadadores=?, Categoria=? WHERE id=?";
        $declaracion = $conexion->prepare($sql);
        $declaracion->bind_param("ssisi", $nombre, $entrenador, $numnadadores, $categoria, $id);

        // Ejecutar la consulta
        if ($declaracion->execute()) {
            echo "El registro se ha agregado correctamente.";
        } else {
            echo "Error al agregar el registro: " . $declaracion->error;
        }

        // Cerrar la conexión
        $conexion->close();
        echo "  <script>
            alert('Agregado con exito');
            location.href = './consulta.php';
        </script>";
        exit;
    }
} else {
    echo "<script>
    alert('Método de solicitud no válido.');
    location.href = './editar.php';
    </script>";
    // Cerrar la conexión
    $conexion->close();
}


?>