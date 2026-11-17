<?php

namespace App\Models;

use CodeIgniter\Model;

class ReporteModel extends Model
{
    protected $table = 'reportes';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'usuario_id',
        'estacion_id',
        'tipo',
        'descripcion',
        'estado'
    ];
}