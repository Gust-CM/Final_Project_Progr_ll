<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "final_project";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
