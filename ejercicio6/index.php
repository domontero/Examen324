
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejercicio 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
  </head>
  <body>

<div class="container">


<?php
session_start();
include_once "conexion.php";

if(!isset($_SESSION['ci'])) {
    // Si el usuario no está autenticado, redirigir al formulario de inicio de sesión
    header("Location: login.php");
    exit;
}

$rol = $_SESSION['rol'];
$ci = $_SESSION['ci'];

// Mostrar contenido según el rol del usuario
if($rol == "Admin" || $rol == "Director" ) {
    echo "<h1 style='text-align:center;'>Bienvenido $rol </h1>";
    echo "</br>";
    // Obtener el número de cuentas por departamento
    $sql = "SELECT persona.departamento, COUNT(DISTINCT cuenta_bancaria.id_cuenta) AS cuentas_por_departamento
            FROM cuenta_bancaria
            INNER JOIN persona ON cuenta_bancaria.ci = persona.ci
            GROUP BY persona.departamento";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2 style='text-align:center;'>Reporte: Cuentas por Departamento</h2>";
        echo "<table  class='table table-success'>";
        echo "<tr><th>Departamento</th><th>Cantidad de Cuentas</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["departamento"]."</td><td>".$row["cuentas_por_departamento"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron cuentas bancarias.";
    }
echo "<hr>";
 // Obtener todas las personas
 $sql = "SELECT * FROM persona";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     echo "<h2 style='text-align:center;'>Lista de Personas</h2>";
     echo "<table class='table table-primary ' ";
     echo "<tr><th>CI</th><th>Nombre</th><th>Apellido</th><th>Departamento</th><th>Rol</th></tr>";
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>".$row["ci"]."</td><td>".$row["nombre"]."</td><td>".$row["apellido"]."</td><td>".$row["departamento"]."</td><td>".$row["rol"]."</td></tr>";
     }
     echo "</table>";
 } else {
     echo "No se encontraron personas.";
 }

} else {
    // Mostrar cuentas del rol no reconocido
    $sql = "SELECT cb.* FROM cuenta_bancaria AS cb
            INNER JOIN persona AS pe ON cb.ci = pe.ci
            WHERE pe.ci = '$ci'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Lista de cuentas bancarias para el rol $rol: de CI: $ci</h2>";
        echo "<table border='1' class ='table table-primary' >";
        echo "<tr><th>Saldo</th><th>Tipo de Cuenta</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["saldo"]."</td><td>".$row["tipo_cuenta"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron cuentas bancarias para el rol $rol.";
    }

}

$conn->close();
?>
<hr>
<form action="salir.php" method="post">
    <input type="submit"   class=" btn btn-danger"value="Cerrar Sesión">
</form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>