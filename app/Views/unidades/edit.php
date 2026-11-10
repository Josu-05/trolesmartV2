<h1>Editar Unidad</h1>

<form action="/unidades/update/<?= $unidad['id'] ?>" method="post">

    <label>Código</label>
    <br>
    <input
        type="text"
        name="codigo"
        value="<?= $unidad['codigo'] ?>">
    <br><br>

    <label>Placa</label>
    <br>
    <input
        type="text"
        name="placa"
        value="<?= $unidad['placa'] ?>">
    <br><br>

    <label>Tipo</label>
    <br>

    <select name="tipo">

        <option value="Regular"
            <?= ($unidad['tipo'] == 'Regular') ? 'selected' : '' ?>>
            Regular
        </option>

        <option value="Expreso"
            <?= ($unidad['tipo'] == 'Expreso') ? 'selected' : '' ?>>
            Expreso
        </option>

    </select>

    <br><br>

    <label>Capacidad</label>
    <br>
    <input
        type="number"
        name="capacidad"
        value="<?= $unidad['capacidad'] ?>">
    <br><br>

    <label>Estado</label>
    <br>

    <select name="estado">

        <option value="Disponible"
            <?= ($unidad['estado'] == 'Disponible') ? 'selected' : '' ?>>
            Disponible
        </option>

        <option value="En servicio"
            <?= ($unidad['estado'] == 'En servicio') ? 'selected' : '' ?>>
            En servicio
        </option>

        <option value="Mantenimiento"
            <?= ($unidad['estado'] == 'Mantenimiento') ? 'selected' : '' ?>>
            Mantenimiento
        </option>

        <option value="Dañada"
            <?= ($unidad['estado'] == 'Dañada') ? 'selected' : '' ?>>
            Dañada
        </option>

        <option value="Fuera de servicio"
            <?= ($unidad['estado'] == 'Fuera de servicio') ? 'selected' : '' ?>>
            Fuera de servicio
        </option>

    </select>

    <br><br>

    <label>Ruta Asignada</label>
    <br>

    <select name="ruta_id">

        <?php foreach($rutas as $ruta): ?>

            <option
                value="<?= $ruta['id'] ?>"
                <?= ($ruta['id'] == $unidad['ruta_id']) ? 'selected' : '' ?>>

                <?= $ruta['nombre'] ?>

            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <label>Estación Base</label>
    <br>

    <select name="estacion_base_id">

        <?php foreach($estaciones as $estacion): ?>

            <option
                value="<?= $estacion['id'] ?>"
                <?= ($estacion['id'] == $unidad['estacion_base_id']) ? 'selected' : '' ?>>

                <?= $estacion['nombre'] ?>

            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <label>Estación Actual</label>
    <br>

    <select name="estacion_actual_id">

        <?php foreach($estaciones as $estacion): ?>

            <option
                value="<?= $estacion['id'] ?>"
                <?= ($estacion['id'] == $unidad['estacion_actual_id']) ? 'selected' : '' ?>>

                <?= $estacion['nombre'] ?>

            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <button type="submit">
        Actualizar
    </button>

</form>