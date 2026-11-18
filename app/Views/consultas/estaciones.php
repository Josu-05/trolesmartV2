<h1>Estaciones Disponibles</h1>

<table border="1" cellpadding="8">

    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Ubicación</th>
    </tr>

    <?php foreach($estaciones as $estacion): ?>

        <tr>

            <td>
                <?= $estacion['id'] ?>
            </td>

            <td>
                <?= $estacion['nombre'] ?>
            </td>

            <td>
                <?= $estacion['ubicacion'] ?>
            </td>

        </tr>

    <?php endforeach; ?>

</table>

<br>

<a href="/">
    Volver al Dashboard
</a>