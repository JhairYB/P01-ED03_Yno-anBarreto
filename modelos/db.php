<?php
  
$host = "localhost"; 
$user = "root";   
$pass = "";       
$dbname = "jhairbarreto";  

try {
    // Crear una nueva conexión PDO a la base de datos MySQL
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    
    // Configurar el modo de error para que lance excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si hay un error en la conexión, detener el script y mostrar el mensaje de error
    die("Error en la conexión: " . $e->getMessage());
}
?>
