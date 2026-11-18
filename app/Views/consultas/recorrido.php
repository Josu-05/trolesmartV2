<h1>Recorrido de la Ruta</h1>

<ol>

<?php foreach($paradas as $parada): ?>

    <li>
        <?= $parada['estacion_nombre'] ?>
    </li>

<?php endforeach; ?>

</ol>

<br>

<a href="/consultar-rutas">
    Volver a Rutas
</a>