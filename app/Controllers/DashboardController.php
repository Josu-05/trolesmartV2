<?php

namespace App\Controllers;

use App\Models\ReporteModel;
use App\Models\UnidadModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $reporteModel = new ReporteModel();
        $unidadModel = new UnidadModel();

        // KPIs

        $data['totalReportes'] =
            $reporteModel->countAll();

        $data['reportesActivos'] =
            $reporteModel
                ->whereIn('estado', [
                    'Pendiente',
                    'En Proceso'
                ])
                ->countAllResults();

        $data['pendientes'] =
            $reporteModel
                ->where('estado', 'Pendiente')
                ->countAllResults();

        $data['enProceso'] =
            $reporteModel
                ->where('estado', 'En Proceso')
                ->countAllResults();

        $data['resueltos'] =
            $reporteModel
                ->where('estado', 'Resuelto')
                ->countAllResults();

        // Reportes activos por estación

        $data['reportesPorEstacion'] = $reporteModel
            ->select('
                estaciones.nombre,
                COUNT(reportes.id) AS total_reportes
            ')
            ->join(
                'estaciones',
                'estaciones.id = reportes.estacion_id'
            )
            ->whereIn('reportes.estado', [
                'Pendiente',
                'En Proceso'
            ])
            ->groupBy('estaciones.id')
            ->findAll();

        // Estación crítica (solo reportes activos)

        $data['estacionCritica'] = $reporteModel
            ->select('
                estaciones.nombre,
                COUNT(reportes.id) AS total_reportes
            ')
            ->join(
                'estaciones',
                'estaciones.id = reportes.estacion_id'
            )
            ->whereIn('reportes.estado', [
                'Pendiente',
                'En Proceso'
            ])
            ->groupBy('estaciones.id')
            ->orderBy('total_reportes', 'DESC')
            ->first();

        // Últimos reportes

        $data['ultimosReportes'] = $reporteModel
            ->select('
                reportes.*,
                usuarios.nombre AS usuario_nombre,
                estaciones.nombre AS estacion_nombre
            ')
            ->join(
                'usuarios',
                'usuarios.id = reportes.usuario_id'
            )
            ->join(
                'estaciones',
                'estaciones.id = reportes.estacion_id'
            )
            ->orderBy('reportes.id', 'DESC')
            ->limit(5)
            ->findAll();

        // Congestión activa

        $data['congestionCritica'] = $reporteModel
            ->select('
                estaciones.nombre,
                COUNT(reportes.id) AS total_congestion
            ')
            ->join(
                'estaciones',
                'estaciones.id = reportes.estacion_id'
            )
            ->where('tipo', 'Congestión')
            ->whereIn('reportes.estado', [
                'Pendiente',
                'En Proceso'
            ])
            ->groupBy('estaciones.id')
            ->orderBy('total_congestion', 'DESC')
            ->first();

        // Expresos disponibles

        $data['expresosDisponibles'] = $unidadModel
            ->where('tipo', 'Expreso')
            ->where('estado', 'Disponible')
            ->findAll();

        return view('dashboard', $data);
    }

    public function activarExpreso($id)
    {
        $unidadModel = new UnidadModel();

        $unidadModel->update($id, [
            'estado' => 'Activo'
        ]);

        return redirect()->to('/')
            ->with(
                'success',
                'Expreso activado correctamente'
            );
    }

    public function testTiDB()
    {
        $db = \Config\Database::connect('tidb');

        $query = $db->query("
            SELECT nombre
            FROM usuarios
        ");

        echo '<pre>';
        print_r($query->getResultArray());
        echo '</pre>';
    }
}