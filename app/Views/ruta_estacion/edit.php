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

<h1>Editar Asignación</h1>

<form action="/ruta-estacion/update/<?= $asignacion['id'] ?>" method="post">

    <label>Ruta</label>
    <br>

    <select name="ruta_id">

        <?php foreach($rutas as $ruta): ?>

            <option
                value="<?= $ruta['id'] ?>"
                <?= ($ruta['id'] == $asignacion['ruta_id']) ? 'selected' : '' ?>>

                <?= $ruta['nombre'] ?>

            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <label>Estación</label>
    <br>

    <select name="estacion_id">

        <?php foreach($estaciones as $estacion): ?>

            <option
                value="<?= $estacion['id'] ?>"
                <?= ($estacion['id'] == $asignacion['estacion_id']) ? 'selected' : '' ?>>

                <?= $estacion['nombre'] ?>

            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <label>Orden de Parada</label>
    <br>

    <input
        type="number"
        name="orden"
        value="<?= $asignacion['orden'] ?>">

    <br><br>

    <button type="submit">
        Actualizar
    </button>

</form>