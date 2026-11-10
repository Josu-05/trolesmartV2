<?php

namespace App\Models;

use CodeIgniter\Model;

class UnidadModel extends Model
{
    protected $table = 'unidades';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'codigo',
        'placa',
        'tipo',
        'capacidad',
        'estado',
        'ruta_id',
        'estacion_base_id',
        'estacion_actual_id'
    ];
}