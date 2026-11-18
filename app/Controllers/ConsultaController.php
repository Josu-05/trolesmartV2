<?php

namespace App\Controllers;

use App\Models\RutaModel;
use App\Models\RutaEstacionModel;
use App\Models\EstacionModel;

class ConsultaController extends BaseController
{
    public function rutas()
    {
        $rutaModel = new RutaModel();

        $data['rutas'] = $rutaModel->findAll();

        return view('consultas/rutas', $data);
    }

    public function recorrido($rutaId)
    {
        $rutaEstacionModel = new RutaEstacionModel();

        $data['paradas'] = $rutaEstacionModel
            ->select('ruta_estacion.*, estaciones.nombre as estacion_nombre')
            ->join(
                'estaciones',
                'estaciones.id = ruta_estacion.estacion_id'
            )
            ->where('ruta_id', $rutaId)
            ->orderBy('orden', 'ASC')
            ->findAll();

        return view(
            'consultas/recorrido',
            $data
        );
    }

    public function estaciones()
    {
        $estacionModel = new EstacionModel();

        $data['estaciones'] = $estacionModel->findAll();

        return view(
            'consultas/estaciones',
            $data
        );
    }
}