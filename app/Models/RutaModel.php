<?php

namespace App\Models;

use CodeIgniter\Model;

class RutaModel extends Model
{
    protected $table = 'rutas';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre',
        'tiempo_estimado'
    ];
}