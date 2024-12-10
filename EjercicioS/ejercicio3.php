<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="servimoto";

try {
  $conn = new PDO("mysql:host=$servername;dbname=", $username, $password,);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conexion Exitosa, con PDO Orientada a Objetos, extencion de PHP </br> :";
} catch(PDOException $e) {
  echo "Conexion Fallida, con PDO Orientada a Objetos, extencion de PHP </br> " . $e->getMessage();
}

?>;