<?php
// Incluir el archivo de conexión a la base de datos
include '../modelos/db.php';

// Verificar si se ha pasado un parámetro 'id' en la URL y si es un número
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Obtener el ID de la denuncia a eliminar
    $id = $_GET['id'];

    // Preparar la consulta SQL para eliminar la denuncia con el ID proporcionado
    $stmt = $pdo->prepare("DELETE FROM denuncias WHERE id = :id");
    
    // Ejecutar la consulta
    $stmt->execute([':id' => $id]);

    // Redirigir al usuario de vuelta a la página principal después de la eliminación
    header("Location: ../index.php");
    exit; // Terminar la ejecución del script
} else {
    // Si el ID no es válido, redirigir con un parámetro de error
    header("Location: ../index.php?error=invalid_id");
    exit; // Terminar la ejecución del script
}
?>
