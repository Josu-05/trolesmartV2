<h1>Nuevo Reporte</h1>

<?php if(session()->getFlashdata('success')): ?>

    <p style="color:green;">
        <?= session()->getFlashdata('success') ?>
    </p>

<?php endif; ?>

<form action="/reportes/store" method="post">

    <label>Estación</label>
    <br>

    <select name="estacion_id" required>

        <?php foreach($estaciones as $estacion): ?>

            <option value="<?= $estacion['id'] ?>">
                <?= $estacion['nombre'] ?>
            </option>

        <?php endforeach; ?>

    </select>

    <br><br>

    <label>Tipo de Reporte</label>
    <br>

    <select name="tipo" required>

        <option value="Congestión">
            Congestión
        </option>

        <option value="Retraso">
            Retraso
        </option>

        <option value="Daño en estación">
            Daño en estación
        </option>

        <option value="Daño en unidad">
            Daño en unidad
        </option>

        <option value="Inseguridad">
            Inseguridad
        </option>

        <option value="Limpieza">
            Limpieza
        </option>

        <option value="Otro">
            Otro
        </option>

    </select>

    <br><br>

    <label>Descripción</label>
    <br>

    <textarea
        name="descripcion"
        rows="5"
        cols="50"
        required></textarea>

    <br><br>

    <button type="submit">
        Enviar Reporte
    </button>

</form>

<br>

<a href="/">
    Volver al Dashboard
</a>