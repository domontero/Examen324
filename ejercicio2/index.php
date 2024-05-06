<?php
$conexion = new mysqli('localhost', 'root', '', 'bddorian');

// Borrar persona
if (isset($_GET['borrar'])) {
    $ci = $_GET['borrar'];
    $sql = "DELETE FROM Persona WHERE ci = '$ci'";
    $conexion->query($sql);
}

// Añadir persona
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $sql = "INSERT INTO Persona (ci, nombre, apellido) VALUES ('$ci', '$nombre', '$apellido')";
    $conexion->query($sql);
}

// Mostrar personas
$resultado = $conexion->query("SELECT * FROM Persona");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personas</title>
</head>
<body>
    <h1>Lista de Personas</h1>
    <table border="1">
        <tr>
            <th>Borrar</th>
            <th>Ci</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cuentas</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><a href="?borrar=<?php echo $fila['ci']; ?>">Borrar</a></td>
                <td><?php echo $fila['ci']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['apellido']; ?></td>
                <td><a href="cuentas.php?ci=<?php echo $fila['ci']; ?>">Ver Cuentas</a></td>
            </tr>
        <?php } ?>
    </table>
    <h2>Agregar Persona</h2>
    <form action="personas.php" method="post">
        Cédula: <input type="text" name="ci"><br>
        Nombre: <input type="text" name="nombre"><br>
        Apellido: <input type="text" name="apellido"><br>
        <button type="submit">Agregar</button>
    </form>
</body>
</html>
