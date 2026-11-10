<?php

namespace App\Controllers;

use App\Models\UnidadModel;
use App\Models\EstacionModel;
use App\Models\RutaModel;

class UnidadController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('unidades');

        $builder->select(
            'unidades.*,
            rutas.nombre as ruta_nombre,
            eb.nombre as estacion_base_nombre,
            ea.nombre as estacion_actual_nombre'
        );

        $builder->join(
            'rutas',
            'rutas.id = unidades.ruta_id'
        );

        $builder->join(
            'estaciones eb',
            'eb.id = unidades.estacion_base_id'
        );

        $builder->join(
            'estaciones ea',
            'ea.id = unidades.estacion_actual_id'
        );

        $data['unidades'] = $builder->get()->getResultArray();

        return view('unidades/index', $data);
    }

    public function create()
    {
        $estacionModel = new EstacionModel();
        $rutaModel = new RutaModel();

        $data['estaciones'] = $estacionModel->findAll();
        $data['rutas'] = $rutaModel->findAll();

        return view('unidades/create', $data);
    }

    public function store()
    {
        $rules = [
            'codigo' => 'required|is_unique[unidades.codigo]',
            'placa' => 'required|is_unique[unidades.placa]',
            'capacidad' => 'required|integer|greater_than[0]',
            'ruta_id' => 'required',
            'estacion_base_id' => 'required',
            'estacion_actual_id' => 'required',
            'estado' => 'required'
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Verifique los datos ingresados.'
                );
        }

        $unidadModel = new UnidadModel();

        $unidadModel->save([
            'codigo' => $this->request->getPost('codigo'),
            'placa' => $this->request->getPost('placa'),
            'tipo' => $this->request->getPost('tipo'),
            'capacidad' => $this->request->getPost('capacidad'),
            'estado' => $this->request->getPost('estado'),
            'ruta_id' => $this->request->getPost('ruta_id'),
            'estacion_base_id' => $this->request->getPost('estacion_base_id'),
            'estacion_actual_id' => $this->request->getPost('estacion_actual_id')
        ]);

        return redirect()->to('/unidades')
            ->with(
                'success',
                'Unidad registrada correctamente.'
            );
    }

    public function edit($id)
    {
        $unidadModel = new UnidadModel();
        $estacionModel = new EstacionModel();
        $rutaModel = new RutaModel();

        $data['unidad'] = $unidadModel->find($id);

        $data['estaciones'] = $estacionModel->findAll();
        $data['rutas'] = $rutaModel->findAll();

        return view('unidades/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'capacidad' => 'required|integer|greater_than[0]',
            'ruta_id' => 'required',
            'estacion_base_id' => 'required',
            'estacion_actual_id' => 'required',
            'estado' => 'required'
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Verifique los datos ingresados.'
                );
        }

        $unidadModel = new UnidadModel();

        $unidadModel->update($id, [
            'codigo' => $this->request->getPost('codigo'),
            'placa' => $this->request->getPost('placa'),
            'tipo' => $this->request->getPost('tipo'),
            'capacidad' => $this->request->getPost('capacidad'),
            'estado' => $this->request->getPost('estado'),
            'ruta_id' => $this->request->getPost('ruta_id'),
            'estacion_base_id' => $this->request->getPost('estacion_base_id'),
            'estacion_actual_id' => $this->request->getPost('estacion_actual_id')
        ]);

        return redirect()->to('/unidades')
            ->with(
                'success',
                'Unidad actualizada correctamente.'
            );
    }

    public function delete($id)
    {
        try {

            $unidadModel = new UnidadModel();

            $unidadModel->delete($id);

            return redirect()->to('/unidades')
                ->with(
                    'success',
                    'Unidad eliminada correctamente.'
                );

        } catch (\Exception $e) {

            return redirect()->to('/unidades')
                ->with(
                    'error',
                    'No fue posible eliminar la unidad.'
                );
        }
    }
}