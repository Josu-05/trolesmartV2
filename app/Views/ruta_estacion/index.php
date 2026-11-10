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

<h1>Asignaciones Ruta - Estación</h1>

<a href="/ruta-estacion/create">
    Nueva Asignación
</a>

<br><br>

<table border="1" cellpadding="8">

    <tr>
        <th>ID</th>
        <th>Ruta</th>
        <th>Estación</th>
        <th>Orden</th>
        <th>Acciones</th>
    </tr>

    <?php foreach($asignaciones as $asignacion): ?>

    <tr>

        <td><?= $asignacion['id'] ?></td>

        <td><?= $asignacion['ruta_nombre'] ?></td>

        <td><?= $asignacion['estacion_nombre'] ?></td>

        <td><?= $asignacion['orden'] ?></td>

        <td>

            <a href="/ruta-estacion/edit/<?= $asignacion['id'] ?>">
                Editar
            </a>

            |

            <a href="/ruta-estacion/delete/<?= $asignacion['id'] ?>"
               onclick="return confirm('¿Eliminar asignación?')">

                Eliminar

            </a>

        </td>

    </tr>

    <?php endforeach; ?>

</table>

<hr>

<h2>Resumen de Rutas</h2>

<?php

$rutaActual = '';

foreach($rutaCompleta as $parada):

    if($rutaActual != $parada['ruta_nombre']):

        if($rutaActual != ''):
            echo "<br><br>";
        endif;

        $rutaActual = $parada['ruta_nombre'];

?>

<h3><?= $rutaActual ?></h3>

<?php endif; ?>

→ <?= $parada['orden'] ?>.
<?= $parada['estacion_nombre'] ?>

<br>

<?php endforeach; ?>