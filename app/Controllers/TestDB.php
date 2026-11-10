<?php

namespace App\Controllers;

class TestDB extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        if ($db) {
            echo "Conexion exitosa 🚀";
        } else {
            echo "Error de conexion";
        }
    }
}