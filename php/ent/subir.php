<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "../conex.php";

    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $especialidad = $_POST['especialidad'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];

    // Mover la foto subida a una carpeta en el servidor
    $upload_dir = '../img/upload/entrenadores/';
    $foto_path = $upload_dir . basename($foto);

    // Mover la imagen a la carpeta de destino
    if (!move_uploaded_file($foto_tmp, $foto_path)) {
        die("Error al mover el archivo.");
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO entrenadores (Nombre, Especialidad, Email, Telefono, Foto) VALUES (?, ?, ?, ?, ?)";
    $declaracion = $conexion->prepare($sql);
    $declaracion->bind_param("sssss", $nombre, $especialidad, $email, $telefono, $foto_path);

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
?>