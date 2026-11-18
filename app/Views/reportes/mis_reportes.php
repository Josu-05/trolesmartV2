<h1>Mis Reportes</h1>

<table border="1" cellpadding="8">

    <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Descripción</th>
        <th>Estado</th>
    </tr>

    <?php foreach($reportes as $reporte): ?>

        <tr>

            <td><?= $reporte['id'] ?></td>

            <td><?= $reporte['tipo'] ?></td>

            <td><?= $reporte['descripcion'] ?></td>

            <td><?= $reporte['estado'] ?></td>

        </tr>

    <?php endforeach; ?>

</table>

<br>

<a href="/">
    Volver al Dashboard
</a>