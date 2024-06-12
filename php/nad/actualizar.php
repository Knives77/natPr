<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imgC = isset($_POST["imgC"]) ? $_POST["imgC"] : null;
    $id = $_POST["id"];

    include_once "../conex.php";

    if (!$imgC) {
        // Verificar si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Obtener datos del formulario
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $sexo = $_POST['sexo'];
            $email = $_POST['email'];
            $foto = $_FILES['foto']['name'];
            $foto_tmp = $_FILES['foto']['tmp_name'];

            // Mover la foto subida a una carpeta en el servidor
            $upload_dir = '../img/upload/nadadores/';
            $foto_path = $upload_dir . basename($foto);

            // Mover la imagen a la carpeta de destino
            if (!move_uploaded_file($foto_tmp, $foto_path)) {
                die("Error al mover el archivo.");
            }

            // Preparar la consulta SQL
            $sql = "UPDATE nadadores SET Nombre=?, Edad=?, Sexo=?, Email=?, Foto=? WHERE id=?";
            $declaracion = $conexion->prepare($sql);
            $declaracion->bind_param("sisssi", $nombre, $edad, $sexo, $email, $foto_path, $id);

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
            // Si se intenta acceder al script sin enviar datos por POST
            echo "Acceso no permitido.";
        }
    } else {


        // Verificar si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Obtener datos del formulario
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $sexo = $_POST['sexo'];
            $email = $_POST['email'];

            // Preparar la consulta SQL
            $sql = "UPDATE nadadores SET Nombre=?, Edad=?, Sexo=?, Email=? WHERE id=?";
            $declaracion = $conexion->prepare($sql);
            $declaracion->bind_param("sissi", $nombre, $edad, $sexo, $email, $id);

            // Ejecutar la consulta
            if ($declaracion->execute()) {
                echo "El registro se ha agregado correctamente.";
            } else {
                echo "Error al agregar el registro: " . $declaracion->error;
            }
            echo "  <script>
                alert('Agregado con exito');
                location.href = './consulta.php';
            </script>";
            exit;
        } else {
            // Si se intenta acceder al script sin enviar datos por POST
            echo "Acceso no permitido.";
        }
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