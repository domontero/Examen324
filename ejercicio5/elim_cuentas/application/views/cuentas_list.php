<!DOCTYPE html>
<html>
<head>
    <title>Cuentas Bancarias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="">
<div class="container">
    <hr>
<h1 style="color:peru; text-align: center;"> Cuentas de Personas</h1>
<hr>

<div class="container">
    <div>
        <table class="table" >
            <thead>
                <tr style="text-align: center;">
                    <th>ID_cuenta</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Saldo</th>
                    <th>Tipo de Cuenta</th>
                    <th>CI</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cuentas as $cuenta): ?>
                    <tr>
                        <td style="text-align: center;"><?= $cuenta['id_cuenta'] ?></td>
                        <td style="text-align: center;"> <?= $cuenta['nombre'] ?></td>
                        <td style="text-align: center;"><?= $cuenta['apellido'] ?></td>
                        <td style="text-align: center;"><?= $cuenta['saldo'] ?></td>
                        <td style="text-align: center;"><?= $cuenta['tipo_cuenta'] ?></td>
                        <td style="text-align: center;"><?= $cuenta['ci'] ?></td>
                        
                        <td style="text-align: center;"><a href="<?= site_url('cuentas/borrar/' . $cuenta['id_cuenta']) ?>" class="btn"style="background-color: peru;">Borrar Cuenta</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>
