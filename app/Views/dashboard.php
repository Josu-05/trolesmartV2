<h1>Dashboard</h1>

<p>
    Bienvenido <?= session()->get('nombre') ?>
</p>

<p>
Rol: <?= session()->get('rol') ?>
</p>

<a href="/logout">
Cerrar sesión
</a>