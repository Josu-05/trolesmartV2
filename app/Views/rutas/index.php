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

<h1>Listado de Rutas</h1>

<a href="/rutas/create">
    Nueva Ruta
</a>

<br><br>

<table border="1" cellpadding="8">

    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Tiempo Estimado</th>
        <th>Acciones</th>
    </tr>

    <?php foreach($rutas as $ruta): ?>

    <tr>

        <td><?= $ruta['id'] ?></td>

        <td><?= $ruta['nombre'] ?></td>

        <td><?= $ruta['tiempo_estimado'] ?> min</td>

        <td>

            <a href="/rutas/edit/<?= $ruta['id'] ?>">
                Editar
            </a>

            |

            <a href="/rutas/delete/<?= $ruta['id'] ?>"
               onclick="return confirm('¿Eliminar ruta?')">
                Eliminar
            </a>

        </td>

    </tr>

    <?php endforeach; ?>

</table>