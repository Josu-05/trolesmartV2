<?php

namespace App\Controllers;

use App\Models\EstacionModel;

class EstacionController extends BaseController
{
    public function index()
    {
        $estacionModel = new EstacionModel();

        $data['estaciones'] = $estacionModel->findAll();

        return view('estaciones/index', $data);
    }

    public function create()
    {
        return view('estaciones/create');
    }

    public function store()
    {
        $rules = [
            'nombre' => 'required|min_length[3]|max_length[100]',
            'ubicacion' => 'required|min_length[3]|max_length[255]'
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Verifique los datos ingresados.'
                );
        }

        $estacionModel = new EstacionModel();

        $estacionModel->save([
            'nombre' => $this->request->getPost('nombre'),
            'ubicacion' => $this->request->getPost('ubicacion')
        ]);

        return redirect()->to('/estaciones')
            ->with(
                'success',
                'Estación registrada correctamente.'
            );
    }

    public function edit($id)
    {
        $estacionModel = new EstacionModel();

        $data['estacion'] = $estacionModel->find($id);

        return view('estaciones/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nombre' => 'required|min_length[3]|max_length[100]',
            'ubicacion' => 'required|min_length[3]|max_length[255]'
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Verifique los datos ingresados.'
                );
        }

        $estacionModel = new EstacionModel();

        $estacionModel->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'ubicacion' => $this->request->getPost('ubicacion')
        ]);

        return redirect()->to('/estaciones')
            ->with(
                'success',
                'Estación actualizada correctamente.'
            );
    }

    public function delete($id)
    {
        try {

            $estacionModel = new EstacionModel();

            $estacionModel->delete($id);

            return redirect()->to('/estaciones')
                ->with('success', 'Estación eliminada correctamente.');

        } catch (\Exception $e) {

            return redirect()->to('/estaciones')
                ->with(
                    'error',
                    'No se puede eliminar la estación porque tiene registros relacionados.'
                );
        }
    }
}