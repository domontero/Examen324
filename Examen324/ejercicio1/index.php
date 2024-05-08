<!DOCTYPE html>
<html>
<head>
    <title>Tipos de Cuentas Bancarias</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <h1>Tipos de Cuentas Bancarias</h1>
    <div>
        <?php
        $cuentas = array(
            array("tipo" => "Cuenta Corriente", "descripcion" => "Es una cuenta por la cual una persona natural o jurídica denominada cuentacorrentista entrega, por sí o por medio de un tercero, cantidades sucesivas de dinero, pagaderos a su presentación, cuando se realice la solicitud por medio del giro de cheques."),
            array("tipo" => "Cuenta de Ahorro", "descripcion" => "Es un producto de ahorro, que permite al cliente realizar depósitos y retiros de forma ilimitada, los fondos depositados son de disponibilidad inmediata y generan intereses que son capitalizados mensualmente"),
            array("tipo" => "Cuenta de Nómina", "descripcion" => "Es una cuenta dirigida a Personas Naturales que trabajen en Instituciones Públicas, para recibir el salario sin comisiones por manejo.")
        );

        foreach ($cuentas as $cuenta) {
            echo "<div class='cuenta'>";
            echo "<h2>" . $cuenta['tipo'] . "</h2>";
            echo "<p>" . $cuenta['descripcion'] . "</p>";
            echo "</div>";
        }
        ?>
    </div>
    <footer>FLORES HUANCA DORIAN DANIEL</footer>
</body>
</html>
