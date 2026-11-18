<h1>Dashboard</h1>

<p>
    Bienvenido <?= session()->get('nombre') ?>
</p>

<p>
    Rol: <?= session()->get('rol') ?>
</p>

<hr>

<?php if(esAdmin()): ?>

    <h2>Panel Administrativo</h2>

    <ul>
        <li>
            <a href="/rutas">
                Gestionar Rutas
            </a>
        </li>

        <li>
            <a href="/estaciones">
                Gestionar Estaciones
            </a>
        </li>

        <li>
            <a href="/unidades">
                Gestionar Unidades
            </a>
        </li>

        <li>
            <a href="/ruta-estacion">
                Gestionar Asignaciones
            </a>
        </li>

        <li>
            <a href="/reportes">
                Gestionar Reportes
            </a>
        </li>

    </ul>

<?php else: ?>

    <h2>Servicios para Usuarios</h2>

    <ul>

        <li>
            Consultar Rutas
        </li>

        <li>
            Consultar Estaciones
        </li>

        <li>
            <a href="/reportes/create">
                Crear Reporte
            </a>
        </li>

        <li>
            <a href="/mis-reportes">
                Mis Reportes
            </a>
        </li>

    </ul>

<?php endif; ?>

<hr>

<a href="/logout">
    Cerrar Sesión
</a>