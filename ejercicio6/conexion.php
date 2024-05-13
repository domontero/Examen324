<?php
// Configuración de la base de datos
$servername = "localhost:3310";
$username = "root";
$password = "";
$dbname = "bddorian";

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
