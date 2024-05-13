<?php
$conexion = new mysqli('localhost:3310', 'root', '', 'bddorian');
$ci = $_GET['ci'] ?? '';

// Borrar cuenta
if (isset($_GET['borrar'])) {
    $id_cuenta = $_GET['borrar'];
    $sql = "DELETE FROM Cuenta_Bancaria WHERE id_cuenta = '$id_cuenta'";
    $conexion->query($sql);
}

// Añadir cuenta
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cuenta = $_POST['id_cuenta'];
    $tipo_cuenta = $_POST['tipo_cuenta'];
    $saldo = $_POST['saldo'];
    $sql = "INSERT INTO Cuenta_Bancaria (id_cuenta, ci, tipo_cuenta, saldo) VALUES ('$id_cuenta', '$ci', '$tipo_cuenta', '$saldo')";
    $conexion->query($sql);
}

// Mostrar cuentas
$resultado = $conexion->query("SELECT * FROM Cuenta_Bancaria WHERE ci = '$ci'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cuentas Bancarias</title>
</head>
<body>
    <h1>Cuentas de <?php echo $ci; ?></h1>
    <table border="1">
        <tr>
            <th>Borrar</th>
            <th>ID Cuenta</th>
            <th>Tipo de Cuenta</th>
            <th>Saldo</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><a href="?ci=<?php echo $ci; ?>&borrar=<?php echo $fila['id_cuenta']; ?>">Borrar</a></td>
                <td><?php echo $fila['id_cuenta']; ?></td>
                <td><?php echo $fila['tipo_cuenta']; ?></td>
                <td><?php echo $fila['saldo']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <h2>Agregar Cuenta Bancaria</h2>
    <form action="?ci=<?php echo $ci; ?>" method="post">
        ID Cuenta: <input type="text" name="id_cuenta" required><br>
        Tipo de Cuenta: <input type="text" name="tipo_cuenta" required><br>
        Saldo: <input type="number" name="saldo" required><br>
        <button type="submit">Agregar</button>
    </form>
    <br>
    <a href="index.php">Volver a Personas</a>
</body>
</html>
