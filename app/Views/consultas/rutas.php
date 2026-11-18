<h1>Rutas Disponibles</h1>

<table border="1" cellpadding="8">

    <tr>
        <th>Nombre</th>
        <th>Tiempo Estimado</th>
        <th>Acción</th>
    </tr>

    <?php foreach($rutas as $ruta): ?>

        <tr>

            <td>
                <?= $ruta['nombre'] ?>
            </td>

            <td>
                <?= $ruta['tiempo_estimado'] ?>
                minutos
            </td>

            <td>

                <a href="/ruta-recorrido/<?= $ruta['id'] ?>">
                    Ver Recorrido
                </a>

            </td>

        </tr>

    <?php endforeach; ?>

</table>

<br>

<a href="/">
    Volver al Dashboard
</a>
