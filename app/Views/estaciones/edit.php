<h1>Editar Estación</h1>

<form action="/estaciones/update/<?= $estacion['id'] ?>" method="post">

    <label>Nombre</label>
    <br>

    <input
        type="text"
        name="nombre"
        value="<?= $estacion['nombre'] ?>">

    <br><br>

    <label>Ubicaci<br>

    <input
        type="text"
        name="ubicacion"
        value="<?= $estacion['ubicacion'] ?>">

    <br><br>

    <button type="submit">
        Actualizar
    </button>

</form>