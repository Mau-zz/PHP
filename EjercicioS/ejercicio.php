<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "servimoto";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
  die("Conexión Fallida: " . $conn->connect_error);
}

echo "Conexión Correcta, con MySQL orientado a Objetos </br>";
?>
