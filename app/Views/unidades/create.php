<h1>Nueva Unidad</h1>

<?php if(session()->getFlashdata('error')): ?>

    <p style="color:red;">
        <?= session()->getFlashdata('error') ?>
    </p>

<?php endif; ?>

<form action="/unidades/store" method="post">

    <label>Código</label>
    <br>
    <input type="text" name="codigo">
    <br><br>

    <label>Placa</label>
    <br>
    <input type="text" name="placa">
    <br><br>

    <label>Tipo</label>
    <br>

    <select name="tipo">
        <option value="Regular">Regular</option>
        <option value="Expreso">Expreso</option>
    </select>

    <br><br>

    <label>Capacidad</label>
    <br>
    <input type="number" name="capacidad">
    <br><br>

    <label>Estado</label>
    <br>

    <select name="estado">
        <option value="Disponible">Disponible</option>
        <option value="En servicio">En servicio</option>
        <option value="Mantenimiento">Mantenimiento</option>
        <option value="Dañada">Dañada</option>
        <option value="Fuera de servicio">Fuera de servicio</option>
    </select>

    <br><br>

    <label>Ruta Asignada</label>
    <br>

    <select name="ruta_id" required>

        <?php foreach($rutas as $ruta): ?>

            <option value="<?= $ruta['id'] ?>">
                <?= $ruta['nombre'] ?>
            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <label>Estación Base</label>
    <br>

    <select name="estacion_base_id" required>

        <?php foreach($estaciones as $estacion): ?>

            <option value="<?= $estacion['id'] ?>">
                <?= $estacion['nombre'] ?>
            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <label>Estación Actual</label>
    <br>

    <select name="estacion_actual_id" required>

        <?php foreach($estaciones as $estacion): ?>

            <option value="<?= $estacion['id'] ?>">
                <?= $estacion['nombre'] ?>
            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <button type="submit">
        Guardar
    </button>

</form>