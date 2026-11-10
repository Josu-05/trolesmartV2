<?php

namespace App\Models;

use CodeIgniter\Model;

class RutaEstacionModel extends Model
{
    protected $table = 'ruta_estacion';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'ruta_id',
        'estacion_id',
        'orden'
    ];
}