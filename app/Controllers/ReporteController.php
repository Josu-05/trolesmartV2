<?php

namespace App\Controllers;

use App\Models\ReporteModel;
use App\Models\EstacionModel;

class ReporteController extends BaseController{
    public function index(){
        $reporteModel = new ReporteModel();
        $data['reportes'] = $reporteModel-> findAll();
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

        return redirect()->to('/reportes')
                         ->with('success','Reporte enviado correctamente');
    }      
}                  