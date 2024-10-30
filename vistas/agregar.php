<?php
include '../modelos/db.php'; // Adjusted the path

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $ubicacion = $_POST['ubicacion'];
    $estado = $_POST['estado'];
    $ciudadano = $_POST['ciudadano']; 
    $telefono_ciudadano = $_POST['telefono'];
    $fecha_registro = date("Y-m-d H:i:s");  

    // Asegúrate de que la conexión $pdo esté disponible
    if (isset($pdo)) {
        $stmt = $pdo->prepare("INSERT INTO denuncias (titulo, descripcion, ubicacion, estado, ciudadano, telefono_ciudadano, fecha_registro) VALUES (?, ?, ?, ?, ?, ?, ?)");

        if ($stmt->execute([$titulo, $descripcion, $ubicacion, $estado, $ciudadano, $telefono_ciudadano, $fecha_registro])) {
            header("Location: ../index.php"); // Cambia la ruta si es necesario
            exit;
        } else {
            // Mostrar error si falla la inserción
            $errorInfo = $stmt->errorInfo();
            echo "Error al insertar: " . htmlspecialchars($errorInfo[2]);
        }
    } else {
        echo "No se pudo conectar a la base de datos.";
    }
}
?>
