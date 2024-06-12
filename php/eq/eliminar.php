<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["eliminar"];

    include_once "../conex.php";

    // Preparar la consulta SQL para eliminar el registro
    $sql = "DELETE FROM equiposnatacion WHERE id = ?";

    // Preparar la declaración
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("i", $id);

        // Ejecutar la declaración
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "<script>
                alert('Registro eliminado correctamente.');
                location.href = './baja.php';
                </script>";
            } else {
                echo "<script>
                alert('No se encontró el registro con el ID proporcionado.');
                location.href = './baja.php';
                </script>";
            }
        } else {
            echo "Error al eliminar el registro: " . $stmt->error;
            echo "<script>
            alert('Error al eliminar el registro.');
            location.href = './baja.php';
            </script>";
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error al preparar la declaración: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
?>