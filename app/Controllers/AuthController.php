<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class AuthController extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $correo = $this->request->getPost('correo');
        $password = $this->request->getPost('password');
        
        $usuarioModel = new UsuarioModel();

        $usuario = $usuarioModel
            ->where('correo', $correo)
            ->first();

        if(!$usuario){
            return redirect()->back()->with('error', 'Contraseña Incorrecta');
        }

        if(!password_verify($password, $usuario['password'])) {
            return redirect()-> back()->with('error', 'Contraseña incorrecta');
        }

        session()->set([
            'id' => $usuario['id'],
            'nombre' => $usuario['nombre'],
            'correo' => $usuario['correo'],
            'rol' => $usuario['rol'],
            'logged_in' => true
        ]);

        return redirect()->to('/');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}