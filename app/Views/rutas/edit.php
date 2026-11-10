<h1>Editar Ruta</h1>

<form action="/rutas/update/<?= $ruta['id'] ?>" method="post">

    <label>Nombre</label>
    <br>

    <input
        type="text"
        name="nombre"
        value="<?= $ruta['nombre'] ?>">

    <br><br>

    <label>Tiempo Estimado</label>
    <br>

    <input
        type="number"
        name="tiempo_estimado"
        value="<?= $ruta['tiempo_estimado'] ?>">

    <br><br>

    <button type="submit">
        Actualizar
    </button>

</form>