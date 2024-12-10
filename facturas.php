<?php

    // Recibir las variables del formulario
    $accion = $_POST['accion'] ?? '';
    $id_cliente = $_POST['id_cliente'] ?? null;
    $id_producto = $_POST['id_producto'] ?? null;
    $valor_producto = $_POST['valor_producto'] ?? null;
    $cantidad = $_POST['cantidad'] ?? null;
    $valor_total = $_POST['valor_total'] ?? null;

    switch ($accion) {
        case 'create':
            if ($id_cliente && $id_producto && $valor_producto && $cantidad && $valor_total) {
                // Insertar la factura en la base de datos
                $query = "INSERT INTO facturas (id_cliente, id_producto, valor_producto, cantidad, valor_total) 
                          VALUES (:id_cliente, :id_producto, :valor_producto, :cantidad, :valor_total)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([
                    ':id_cliente' => $id_cliente,
                    ':id_producto' => $id_producto,
                    ':valor_producto' => $valor_producto,
                    ':cantidad' => $cantidad,
                    ':valor_total' => $valor_total,
                ]);
                echo "Factura creada correctamente.";
            } else {
                echo "Por favor, complete todos los campos.";
            }
            break;

        case 'read':
            // Consultar las facturas
            $query = "SELECT f.id_factura, c.nombre AS cliente, p.nombre_producto AS producto, f.cantidad, f.valor_total 
                      FROM facturas f
                      JOIN cliente c ON f.id_cliente = c.id_cliente
                      JOIN productos p ON f.id_producto = p.id_producto";
            $stmt = $pdo->query($query);
            $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo "<h3>Listado de Facturas:</h3><table><tr><th>Factura ID</th><th>Cliente</th><th>Producto</th><th>Cantidad</th><th>Valor Total</th></tr>";
            foreach ($facturas as $factura) {
                echo "<tr><td>{$factura['id_factura']}</td><td>{$factura['cliente']}</td><td>{$factura['producto']}</td><td>{$factura['cantidad']}</td><td>{$factura['valor_total']}</td></tr>";
            }
            echo "</table>";
            break;

        case 'update':
            // Actualizar una factura
            $id_factura = $_POST['id_factura'] ?? null;
            if ($id_factura && $id_cliente && $id_producto && $valor_producto && $cantidad && $valor_total) {
                $query = "UPDATE facturas SET id_cliente = :id_cliente, id_producto = :id_producto, 
                          valor_producto = :valor_producto, cantidad = :cantidad, valor_total = :valor_total 
                          WHERE id_factura = :id_factura";
                $stmt = $pdo->prepare($query);
                $stmt->execute([
                    ':id_factura' => $id_factura,
                    ':id_cliente' => $id_cliente,
                    ':id_producto' => $id_producto,
                    ':valor_producto' => $valor_producto,
                    ':cantidad' => $cantidad,
                    ':valor_total' => $valor_total,
                ]);
                echo "Factura actualizada correctamente.";
            } else {
                echo "Por favor, complete todos los campos.";
            }
            break;

        case 'delete':
            // Eliminar una factura
            $id_factura = $_POST['id_factura'] ?? null;
            if ($id_factura) {
                $query = "DELETE FROM facturas WHERE id_factura = :id_factura";
                $stmt = $pdo->prepare($query);
                $stmt->execute([':id_factura' => $id_factura]);
                echo "Factura eliminada correctamente.";
            } else {
                echo "Por favor, proporcione el ID de la factura a eliminar.";
            }
            break;

        default:
            echo "Acción no válida.";
            break;
    }

?>
