<?php
// Incluir el archivo de conexión a la base de datos
include '../modelos/db.php';

// Iniciar la sesión para poder almacenar mensajes de éxito o error
session_start();

// Verificar si el método de la solicitud es POST (se está enviando un formulario)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Filtrar y validar los datos recibidos del formulario
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT); // ID de la denuncia
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING); // Título de la denuncia
    $descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING); // Descripción de la denuncia
    $ubicacion = filter_input(INPUT_POST, 'ubicacion', FILTER_SANITIZE_STRING); // Ubicación de la denuncia
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING); // Estado de la denuncia
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING); // Teléfono del ciudadano

    // Verificar que todos los campos requeridos sean válidos
    if ($id && $titulo && $descripcion && $ubicacion && $estado && $telefono) {
        // Preparar la consulta SQL para actualizar la denuncia
        $stmt = $pdo->prepare("UPDATE denuncias SET titulo = :titulo, descripcion = :descripcion, ubicacion = :ubicacion, estado = :estado, telefono_ciudadano = :telefono WHERE id = :id");
        
        try {
            // Ejecutar la consulta con los datos proporcionados
            $stmt->execute([
                ':titulo' => $titulo,
                ':descripcion' => $descripcion,
                ':ubicacion' => $ubicacion,
                ':estado' => $estado,
                ':telefono' => $telefono, 
                ':id' => $id
            ]);

            // Verificar si se actualizó alguna fila en la base de datos
            if ($stmt->rowCount() > 0) {
                // Si se actualizó correctamente, almacenar un mensaje de éxito en la sesión
                $_SESSION['success'] = "Denuncia actualizada";
            } else {
                // Si no se encontraron cambios, almacenar un mensaje de error
                $_SESSION['error'] = "No se encontraron cambios en la denuncia";
            }
        } catch (PDOException $e) {
            // Registrar el error y almacenar un mensaje de error en la sesión
            error_log("Update error: " . $e->getMessage());
            $_SESSION['error'] = "Actualización fallida. Inténtalo de nuevo.";
        }
    } else {
        // Si los datos son inválidos, almacenar un mensaje de error
        $_SESSION['error'] = "Datos inválidos";
    }

    // Redirigir al usuario de vuelta a la página principal
    header("Location: ../index.php");
    exit;
} 
