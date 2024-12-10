<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";  // Servidor de la base de datos (usualmente localhost)
$username = "root";         // Usuario de la base de datos (por defecto en muchos casos: root)
$password = "";             // Contraseña de la base de datos (puede estar vacía si es en entorno local)
$dbname = "servimoto";      // Nombre de la base de datos que quieres usar

// Crear la conexión usando MySQLi (orientado a objetos)
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger los datos del formulario
$nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '';
$apellido = isset($_POST['apellido']) ? htmlspecialchars($_POST['apellido']) : '';
$telefono = isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : '';

// Mostrar las tres variables
echo "<h3>Datos Recibidos:</h3>";
echo "Nombre: " . $nombre . "<br>";
echo "Apellido: " . $apellido . "<br>";
echo "Teléfono: " . $telefono . "<br>";

// Confirmar que la conexión a la base de datos es exitosa
echo "<div class='bg-green-500 text-white p-6 rounded-lg shadow-lg w-96 mx-auto mt-5'>
        <h2 class='text-xl font-semibold text-center'>¡Conexión Exitosa!</h2>
        <p class='text-center'>Los datos fueron recibidos correctamente y la conexión con la base de datos fue exitosa.</p>
      </div>";

// Cerrar la conexión
$conn->close();
?>
