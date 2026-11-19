<?php

namespace App\Controllers;

use App\Models\ReporteModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $reporteModel = new ReporteModel();

        $data['totalReportes'] =
            $reporteModel->countAll();

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

        $data['reportesPorEstacion'] = $reporteModel
            ->select('
                estaciones.nombre,
                COUNT(reportes.id) AS total_reportes
            ')
            ->join(
                'estaciones',
                'estaciones.id = reportes.estacion_id'
            )
            ->groupBy('estaciones.id')
            ->findAll();
        
        $data['estacionCritica'] = $reporteModel
            ->select('
                estaciones.nombre,
                COUNT(reportes.id) AS total_reportes
            ')
            ->join(
                'estaciones',
                'estaciones.id = reportes.estacion_id'
            )
            ->groupBy('estaciones.id')
            ->orderBy('total_reportes', 'DESC')
            ->first();

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
    
        return view('dashboard', $data);
    }
}