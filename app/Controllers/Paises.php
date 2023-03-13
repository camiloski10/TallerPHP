<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaisesModel;

class Paises extends BaseController
{
    protected $paises;
    public function __construct()
    {
        $this->paises = new PaisesModel();
    }
    public function index()
    {
        $paises = $this->paises->obtenerPaises();

        $data = ['titulo' => 'Administrar Paises', 'nombre' => 'Camilo', 'datos' => $paises];
        echo view('/principal/header', $data);
        echo view('/paises/paises', $data);
    }
    public function insertar()
        {
            if ($this->request->getMethod() == "post" ) {
                
                $this->paises->save([    
                    'Codigo' => $this->request->getPost('Codigo'),          
                    'nombre' => $this->request->getPost('nombre')
                ]);
                return redirect()->to(base_url('/paises'));
            } 
        }
    }