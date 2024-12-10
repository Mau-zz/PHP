<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "servioto";

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password);

// Verificar si la conexión fue exitosa
if (!$conn) {
  die("Conexión Fallida: " . mysqli_connect_error());
} else {
  echo "Conexión Exitosa a MySQL</br>";
}

// Intentar seleccionar la base de datos
if (!mysqli_select_db($conn, $dbname)) {
  die("Error al seleccionar la base de datos: " . mysqli_error($conn));
} else {
  echo "Base de datos seleccionada correctamente: " . $dbname . "</br>";
}

// Aquí puedes continuar con el resto de tu código
?>
