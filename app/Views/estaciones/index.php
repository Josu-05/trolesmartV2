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

<h1>Listado de Estaciones</h1>

<a href="/estaciones/create">
    Nueva Estación
</a>

<br><br>

<table border="1" cellpadding="8">

    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Ubicación</th>
        <th>Acciones</th>
    </tr>

    <?php foreach($estaciones as $estacion): ?>

    <tr>

        <td><?= $estacion['id'] ?></td>

        <td><?= $estacion['nombre'] ?></td>

        <td><?= $estacion['ubicacion'] ?></td>

        <td>

            <a href="/estaciones/edit/<?= $estacion['id'] ?>">
                Editar
            </a>

            |

            <a href="/estaciones/delete/<?= $estacion['id'] ?>"
               onclick="return confirm('¿Eliminar estación?')">
                Eliminar
            </a>

        </td>

    </tr>

    <?php endforeach; ?>

</table>