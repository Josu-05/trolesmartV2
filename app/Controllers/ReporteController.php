<?php

namespace App\Controllers;

use App\Models\ReporteModel;
use App\Models\EstacionModel;

class ReporteController extends BaseController{
    public function index()
    {
        $reporteModel = new ReporteModel();

        $data['reportes'] = $reporteModel
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
            ->findAll();

        return view('reportes/index', $data);
    }

    public function create(){
        $estacionModel = new EstacionModel();
        $data['estaciones']= $estacionModel-> findAll();
        return view('reportes/create', $data);
    }

    public function store(){
        $reporteModel = new ReporteModel();
        
        $reporteModel-> save([
          
            'usuario_id' => session()->get('id'),
            'estacion_id' => $this->request->getPost('estacion_id'),
            'tipo' => $this->request->getPost('tipo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'estado' => 'Pendiente'
        ]);

        return redirect()->to('/mis-reportes')
                 ->with(
                     'success',
                     'Reporte enviado correctamente'
                 );
    }
    
    public function misReportes()
    {
        $reporteModel = new ReporteModel();

            $data['reportes'] = $reporteModel
            ->select('
                reportes.*,
                estaciones.nombre AS estacion_nombre
            ')
            ->join(
                'estaciones',
                'estaciones.id = reportes.estacion_id'
            )
            ->where(
                'usuario_id',
                session()->get('id')
            )
            ->findAll();

        return view('reportes/mis_reportes', $data);
    }

    public function cambiarEstado($id)
    {
        $reporteModel = new ReporteModel();

        $estado = $this->request->getPost('estado');

        $reporteModel->update($id, [
            'estado' => $estado
        ]);

        return redirect()->to('/reportes')
                        ->with(
                            'success',
                            'Estado actualizado correctamente'
                        );
    }
}                  