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

<h1>Asignar Estación a Ruta</h1>

<form action="/ruta-estacion/store" method="post">

    <label>Ruta</label>
    <br>

    <select name="ruta_id">

        <?php foreach($rutas as $ruta): ?>

            <option value="<?= $ruta['id'] ?>">

                <?= $ruta['nombre'] ?>

            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <label>Estación</label>
    <br>

    <select name="estacion_id">

        <?php foreach($estaciones as $estacion): ?>

            <option value="<?= $estacion['id'] ?>">

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
        min="1">

    <br><br>

    <button type="submit">
        Guardar
    </button>

</form>