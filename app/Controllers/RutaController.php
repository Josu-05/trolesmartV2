<?php

namespace App\Controllers;

use App\Models\RutaModel;

class RutaController extends BaseController
{
    public function index()
    {
        $rutaModel = new RutaModel();

        $data['rutas'] = $rutaModel->findAll();

        return view('rutas/index', $data);
    }

    public function create()
    {
        return view('rutas/create');
    }

    public function store()
    {
        $rules = [
            'nombre' => 'required|min_length[3]|max_length[100]',
            'tiempo_estimado' => 'required|integer|greater_than[0]'
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Verifique los datos ingresados.'
                );
        }

        $rutaModel = new RutaModel();

        $rutaModel->save([
            'nombre' => $this->request->getPost('nombre'),
            'tiempo_estimado' => $this->request->getPost('tiempo_estimado')
        ]);

        return redirect()->to('/rutas')
            ->with(
                'success',
                'Ruta registrada correctamente.'
            );
    }

    public function edit($id)
    {
        $rutaModel = new RutaModel();

        $data['ruta'] = $rutaModel->find($id);

        return view('rutas/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nombre' => 'required|min_length[3]|max_length[100]',
            'tiempo_estimado' => 'required|integer|greater_than[0]'
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Verifique los datos ingresados.'
                );
        }

        $rutaModel = new RutaModel();

        $rutaModel->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'tiempo_estimado' => $this->request->getPost('tiempo_estimado')
        ]);

        return redirect()->to('/rutas')
            ->with(
                'success',
                'Ruta actualizada correctamente.'
            );
    }


    public function delete($id)
    {
        try {

            $rutaModel = new RutaModel();

            $rutaModel->delete($id);

            return redirect()->to('/rutas')
                ->with('success', 'Ruta eliminada correctamente.');

        } catch (\Exception $e) {

            return redirect()->to('/rutas')
                ->with(
                    'error',
                    'No se puede eliminar la ruta porque tiene registros relacionados.'
                );
        }
    }
}