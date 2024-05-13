<?php
// Configuración de la base de datos
$servername = "localhost:3310";
$username = "root";
$password = "";
$dbname = "bddorian";

// Crear conexión a la base de datos
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
