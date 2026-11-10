<?php if(session()->getFlashdata('success')): ?>

    <p style="color:green;">
        <?= session()->getFlashdata('success') ?>
    </p>

<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>

    <p style="color:red;">
        <?= session()->getFlashdata('error') ?>
    </p>

<?php endif; ?>

<h1>Listado de Unidades</h1>

<a href="/unidades/create">
    Nueva Unidad
</a>

<br><br>

<table border="1" cellpadding="8">

    <tr>
        <th>ID</th>
        <th>Código</th>
        <th>Placa</th>
        <th>Tipo</th>
        <th>Capacidad</th>
        <th>Estado</th>
        <th>Estación</th>
        <th>Acciones</th>
    </tr>

    <?php foreach($unidades as $unidad): ?>

    <tr>

        <td><?= $unidad['id'] ?></td>

        <td><?= $unidad['codigo'] ?></td>

        <td><?= $unidad['placa'] ?></td>

        <td><?= $unidad['tipo'] ?></td>

        <td><?= $unidad['capacidad'] ?></td>

        <td><?= $unidad['estado'] ?></td>

        <td><?= $unidad['ruta_nombre'] ?></td>

        <td><?= $unidad['estacion_base_nombre'] ?></td>

        <td><?= $unidad['estacion_actual_nombre'] ?></td>

        <td>

            <a href="/unidades/edit/<?= $unidad['id'] ?>">
                Editar
            </a>

            |

            <a href="/unidades/delete/<?= $unidad['id'] ?>"
               onclick="return confirm('¿Eliminar unidad?')">
                Eliminar
            </a>

        </td>

    </tr>

    <?php endforeach; ?>

</table>