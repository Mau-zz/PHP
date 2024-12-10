<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Configuración de conexión a la base de datos
$host = 'localhost';
$dbname = 'eps';
$usuario = 'root';
$contraseña = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $contraseña);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("¡Error en la conexión a la base de datos!: " . $e->getMessage());
}

// Funciones CRUD para "productos"
function crearProducto($pdo, $nombre_producto, $valor, $cantidad) {
    try {
        $valor_total = $valor * $cantidad;

        $sql = "INSERT INTO productos (nombre_producto, valor, cantidad, valor_total) 
                VALUES (:nombre_producto,:valor, :cantidad, :valor_total)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_producto', $nombre_producto);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':valor_total', $valor_total);
        $stmt->execute();

        echo "Producto creado exitosamente.";
    } catch (PDOException $e) {
        echo "Error al crear producto: " . $e->getMessage();
    }
}

function actualizarProducto($pdo, $nombre_producto, $valor, $cantidad) {
    try {
        $valor_total = $valor * $cantidad;

        $sql = "UPDATE productos 
                SET valor = :valor, cantidad = :cantidad, valor_total = :valor_total 
                WHERE nombre_producto = :nombre_producto";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_producto', $nombre_producto);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':valor_total', $valor_total);
        
        if ($stmt->execute()) {
            echo "Producto actualizado exitosamente.";
        } else {
            echo "Error al actualizar producto.";
        }
    } catch (PDOException $e) {
        echo "Error al actualizar producto: " . $e->getMessage();
    }
}

function eliminarProducto($pdo, $nombre_producto) {
    try {
        $sql = "DELETE FROM productos WHERE nombre_producto = :nombre_producto";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_producto', $nombre_producto);
        $stmt->execute();

        echo "Producto eliminado exitosamente.";
    } catch (PDOException $e) {
        echo "Error al eliminar producto: " . $e->getMessage();
    }
}

function obtenerProducto($pdo, $nombre_producto) {
    try {
        $sql = "SELECT * FROM productos WHERE nombre_producto = :nombre_producto";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_producto', $nombre_producto);
        $stmt->execute();

        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($producto) {
            return $producto;
        } else {
            echo "Producto no encontrado.";
            return null;
        }
    } catch (PDOException $e) {
        echo "Error al obtener producto: " . $e->getMessage();
    }
}

// Manejo de datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'] ?? '';
    $nombre_producto = htmlspecialchars(trim($_POST['nombre_producto'] ?? ''));
    $valor = htmlspecialchars(trim($_POST['valor'] ?? ''));
    $cantidad = htmlspecialchars(trim($_POST['cantidad'] ?? ''));

    if (!$nombre_producto) {
        echo "Error: el nombre del producto es obligatorio.";
        return;
    }

    switch ($accion) {
        case 'create':
            crearProducto($pdo, $nombre_producto, $valor, $cantidad);
            break;
        case 'read':
            $producto = obtenerProducto($pdo, $nombre_producto);
            if ($producto) {
                echo "Nombre del Producto: " . $producto['nombre_producto'] . "<br>";
                echo "Valor: " . $producto['valor'] . "<br>";
                echo "Cantidad: " . $producto['cantidad'] . "<br>";
                echo "Valor Total: " . $producto['valor_total'] . "<br>";
            }
            break;
        case 'update':
            actualizarProducto($pdo, $nombre_producto, $valor, $cantidad);
            break;
        case 'delete':
            eliminarProducto($pdo, $nombre_producto);
            break;
        default:
            echo "Acción no reconocida.";
            break;
    }
}
?>
