<?php

namespace App\Controllers;

use App\Models\RutaEstacionModel;
use App\Models\RutaModel;
use App\Models\EstacionModel;

class RutaEstacionController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('ruta_estacion');

        $builder->select(
            'ruta_estacion.id,
            ruta_estacion.orden,
            rutas.nombre as ruta_nombre,
            estaciones.nombre as estacion_nombre'
        );

        $builder->join(
            'rutas',
            'rutas.id = ruta_estacion.ruta_id'
        );

        $builder->join(
            'estaciones',
            'estaciones.id = ruta_estacion.estacion_id'
        );

        $builder->orderBy('ruta_estacion.ruta_id', 'ASC');
        $builder->orderBy('ruta_estacion.orden', 'ASC');

        $data['asignaciones'] =
            $builder->get()->getResultArray();
            
            $builder2 = $db->table('ruta_estacion');

            $builder2->select(
                'rutas.nombre as ruta_nombre,
                estaciones.nombre as estacion_nombre,
                ruta_estacion.orden'
            );

            $builder2->join(
                'rutas',
                'rutas.id = ruta_estacion.ruta_id'
            );

            $builder2->join(
                'estaciones',
                'estaciones.id = ruta_estacion.estacion_id'
            );

            $builder2->orderBy('ruta_estacion.ruta_id', 'ASC');
            $builder2->orderBy('ruta_estacion.orden', 'ASC');

            $data['rutaCompleta'] =
                $builder2->get()->getResultArray();

        return view('ruta_estacion/index', $data);
    }

    public function create()
    {
        $rutaModel = new RutaModel();
        $estacionModel = new EstacionModel();

        $data['rutas'] = $rutaModel->findAll();
        $data['estaciones'] = $estacionModel->findAll();

        return view('ruta_estacion/create', $data);
    }

    public function store()
    {
        $rutaEstacionModel = new RutaEstacionModel();

        $existe = $rutaEstacionModel
            ->where('ruta_id', $this->request->getPost('ruta_id'))
            ->where('estacion_id', $this->request->getPost('estacion_id'))
            ->first();

        if ($existe) {

            return redirect()->back()
                ->with('error', 'La estación ya pertenece a esa ruta.');
        }

        if ($this->request->getPost('orden') <= 0) {

            return redirect()->back()
                ->with('error', 'El orden debe ser mayor a cero.');
        }

        $rutaEstacionModel->save([
            'ruta_id' => $this->request->getPost('ruta_id'),
            'estacion_id' => $this->request->getPost('estacion_id'),
            'orden' => $this->request->getPost('orden')
        ]);

        return redirect()->to('/ruta-estacion')
            ->with('success', 'Asignación registrada correctamente.');
    }

    public function delete($id)
    {
        try {

            $rutaEstacionModel = new RutaEstacionModel();

            $rutaEstacionModel->delete($id);

            return redirect()->to('/ruta-estacion')
                ->with('success', 'Asignación eliminada correctamente.');

        } catch (\Exception $e) {

            return redirect()->to('/ruta-estacion')
                ->with(
                    'error',
                    'No fue posible eliminar la asignación.'
                );
        }
    }

    public function edit($id)
    {
        $rutaEstacionModel = new RutaEstacionModel();
        $rutaModel = new RutaModel();
        $estacionModel = new EstacionModel();

        $data['asignacion'] = $rutaEstacionModel->find($id);

        $data['rutas'] = $rutaModel->findAll();
        $data['estaciones'] = $estacionModel->findAll();

        return view('ruta_estacion/edit', $data);
    }

    public function update($id)
    {
        $rutaEstacionModel = new RutaEstacionModel();

        if ($this->request->getPost('orden') <= 0) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'El orden debe ser mayor a cero.'
                );
        }

        $rutaEstacionModel->update($id, [
            'ruta_id' => $this->request->getPost('ruta_id'),
            'estacion_id' => $this->request->getPost('estacion_id'),
            'orden' => $this->request->getPost('orden')
        ]);

        return redirect()->to('/ruta-estacion')
            ->with(
                'success',
                'Asignación actualizada correctamente.'
            );
    }
}
