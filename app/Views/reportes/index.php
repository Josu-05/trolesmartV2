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
        <th>Cambiar Estado</th>
    </tr>

    <?php foreach($reportes as $reporte): ?>

        <tr>

            <td><?= $reporte['id'] ?></td>

            <td><?= $reporte['usuario_id'] ?></td>

            <td><?= $reporte['estacion_id'] ?></td>

            <td><?= $reporte['tipo'] ?></td>

            <td><?= $reporte['descripcion'] ?></td>

            <td><?= $reporte['estado'] ?></td>

            <td>

                <form
                    action="/reportes/cambiar-estado/<?= $reporte['id'] ?>"
                    method="post">

                    <select name="estado">

                        <option value="Pendiente"
                            <?= ($reporte['estado'] == 'Pendiente') ? 'selected' : '' ?>>
                            Pendiente
                        </option>

                        <option value="En Proceso"
                            <?= ($reporte['estado'] == 'En Proceso') ? 'selected' : '' ?>>
                            En Proceso
                        </option>

                        <option value="Resuelto"
                            <?= ($reporte['estado'] == 'Resuelto') ? 'selected' : '' ?>>
                            Resuelto
                        </option>

                    </select>

                    <button type="submit">
                        Actualizar
                    </button>

                </form>

            </td>

        </tr>

    <?php endforeach; ?>

</table>

<br>

<a href="/">
    Volver al Dashboard
</a>