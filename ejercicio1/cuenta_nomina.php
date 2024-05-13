<?php

$conexion = new mysqli('localhost:3310', 'root', '', 'bddorian');


if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}


$sql = "SELECT id_cuenta, saldo FROM cuenta_bancaria WHERE tipo_cuenta = 'Cuenta de Nomina'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while($row = $resultado->fetch_assoc()) {
        echo "<div class='details'>";
        echo "<p>Cuenta: " . $row["id_cuenta"] . "</p>";
        echo "<p>Saldo: $" . $row["saldo"] . "</p>";
        echo "<p>Tipo de Cuenta: Nómina</p>";
        echo "</div>";
    }
} else {
    echo "No se encontraron cuentas de nómina.";
}

$conexion->close();
?>
