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

    <h3>Resumen de Reportes</h3>

    <p>
        Total Reportes:
        <?= $totalReportes ?>
    </p>

    <p>
        Pendientes:
        <?= $pendientes ?>
    </p>

    <p>
        En Proceso:
        <?= $enProceso ?>
    </p>

    <p>
        Resueltos:
        <?= $resueltos ?>
    </p>

    <hr>

    <h3>Reportes por Estación</h3>

    <table border="1" cellpadding="8">

        <tr>
            <th>Estación</th>
            <th>Total Reportes</th>
            <th>Estado</th>
        </tr>

        <?php foreach($reportesPorEstacion as $estacion): ?>

            <tr>

                <td>
                    <?= $estacion['nombre'] ?>
                </td>

                <td>
                    <?= $estacion['total_reportes'] ?>
                </td>

                <td>

                    <?php

                    if($estacion['total_reportes'] >= 10)
                    {
                        echo '🔴 Crítico';
                    }
                    elseif($estacion['total_reportes'] >= 5)
                    {
                        echo '🟡 Atención';
                    }
                    else
                    {
                        echo '🟢 Normal';
                    }

                    ?>

                </td>

            </tr>

        <?php endforeach; ?>

    </table>

    <hr>

    <h3>Estación Más Crítica</h3>

    <?php if($estacionCritica): ?>

        <p>

            <?php

            if($estacionCritica['total_reportes'] >= 10)
            {
                echo '🔴 Acción recomendada: Asignar unidades adicionales.';
            }
            elseif($estacionCritica['total_reportes'] >= 5)
            {
                echo '🟡 Acción recomendada: Supervisar la estación.';
            }
            else
            {
                echo '🟢 Operación normal.';
            }

            ?>

        </p>

    <?php else: ?>

        <p>
            No existen reportes registrados.
        </p>

    <?php endif; ?>

    <hr>

    <h3>Últimos Reportes</h3>

    <table border="1" cellpadding="8">

        <tr>
            <th>Usuario</th>
            <th>Estación</th>
            <th>Tipo</th>
            <th>Estado</th>
        </tr>

        <?php foreach($ultimosReportes as $reporte): ?>

            <tr>

                <td>
                    <?= $reporte['usuario_nombre'] ?>
                </td>

                <td>
                    <?= $reporte['estacion_nombre'] ?>
                </td>

                <td>
                    <?= $reporte['tipo'] ?>
                </td>

                <td>
                    <?= $reporte['estado'] ?>
                </td>

            </tr>

        <?php endforeach; ?>

    </table>

    <hr>

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