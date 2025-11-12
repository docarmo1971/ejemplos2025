<?php
// Encabezado para indicar que la respuesta es JSON
header('Content-Type: application/json; charset=utf-8');

// Incluir el archivo de conexión
include 'conexion.php'; // o require 'conexion.php';

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Error de conexión: " . $conn->connect_error]));
}

// Consulta SQL
$sql = "SELECT * FROM alumnos";
$resultado = $conn->query($sql);

echo "<table><tr><th>Codigo</th><th>Nombre</th><th>Apellidos</th></tr>";
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['codigo'] . "</td>";
            echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
            echo "<td>" . $fila['apellidos'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No hay registros en la tabla alumnos.</td></tr>";
    }

    $conn->close();
echo "</table>";
    ?>
