<?php

namespace App\Models;

use CodeIgniter\Model;

class EstacionModel extends Model
{
    protected $table = 'estaciones';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre',
        'ubicacion'
    ];
}