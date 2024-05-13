<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo Total por Departamento</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        
<?php
// Conectar a la base de datos
include 'conexion.php';
echo "<h1 style='text-align:center;'>CASE-WHEN</h1>";
// Consulta SQL para obtener el monto total por departamento
$SQL = "SELECT
            SUM(CASE WHEN p.departamento = 'Chuquisaca' THEN cb.Saldo  END) AS Chuquisaca,
            SUM(CASE WHEN p.departamento = 'La Paz' THEN cb.Saldo  END) AS LaPaz,
            SUM(CASE WHEN p.departamento = 'Cochabamba' THEN cb.Saldo  END) AS Cochabamba,
            SUM(CASE WHEN p.departamento = 'Oruro' THEN cb.Saldo  END) AS Oruro,
            SUM(CASE WHEN p.departamento = 'Potosi' THEN cb.Saldo END) AS Potosi,
            SUM(CASE WHEN p.departamento = 'Tarija' THEN cb.Saldo  END) AS Tarija,
            SUM(CASE WHEN p.departamento = 'Santa Cruz' THEN cb.Saldo END) AS SantaCruz,
            SUM(CASE WHEN p.departamento = 'Beni' THEN cb.Saldo END) AS Beni,
            SUM(CASE WHEN p.departamento = 'Pando' THEN cb.Saldo END) AS Pando
        FROM persona p
        LEFT JOIN cuenta_bancaria cb ON p.ci = cb.ci";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $SQL);

// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    // Mostrar encabezados de tabla
    echo "<table table-success>";
    echo "<tr><th>Chuquisaca</th><th>La Paz</th><th>Cochabamba</th><th>Oruro</th><th>Potosi</th><th>Tarija</th><th>Santa Cruz</th><th>Beni</th><th>Pando</th></tr>";
    
    // Mostrar los resultados
    $fila = mysqli_fetch_assoc($resultado);
    echo "<tr>";
    echo "<td>" . $fila['Chuquisaca'] . "</td>";
    echo "<td>" . $fila['LaPaz'] . "</td>";
    echo "<td>" . $fila['Cochabamba'] . "</td>";
    echo "<td>" . $fila['Oruro'] . "</td>";
    echo "<td>" . $fila['Potosi'] . "</td>";
    echo "<td>" . $fila['Tarija'] . "</td>";
    echo "<td>" . $fila['SantaCruz'] . "</td>";
    echo "<td>" . $fila['Beni'] . "</td>";
    echo "<td>" . $fila['Pando'] . "</td>";
    echo "</tr>";

    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>

    </div>
</body>
</html>
