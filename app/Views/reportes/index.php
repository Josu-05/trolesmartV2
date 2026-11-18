<h1>Listado de Reportes</h1>

<?php if(session()->getFlashdata('success')): ?>

    <p style="color:green;">
        <?= session()->getFlashdata('success') ?>
    </p>

<?php endif; ?>

<table border="1" cellpadding="8">

    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Estación</th>
        <th>Tipo</th>
        <th>Descripción</th>
        <th>Estado</th>
    </tr>

    <?php foreach($reportes as $reporte): ?>

        <tr>

            <td><?= $reporte['id'] ?></td>

            <td><?= $reporte['usuario_id'] ?></td>

            <td><?= $reporte['estacion_id'] ?></td>

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