<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\ComprasModel;


class Compras extends BaseController
{
    protected $compras;
    protected $reglas;

   /* public function __construct()
    {
        $this->unidades = new ComprasModel();
        helper(['form']);

    
    }

    public function index($activo = 1)
    {
        $unidades = $this->unidades->where('activo', $activo)->findAll();
        $data = ['titulo' => 'unidades', 'datos' => $unidades];
        echo view('header');
        echo view('unidades/unidades', $data);
        echo view('footer');
    } */

    public function nuevo()
    {
        echo view('header');
        echo view('compras/nuevo',);
        echo view('footer');
    }

    /*public function insertar()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {



            $this->unidades->save([
                'nombre' => $this->request->getPost('nombre'),
                'nombre_corto' => $this->request->getPost('nombre_corto')
            ]);
            return redirect()->to(base_url() . 'unidades')->with('mensaje', 'unidad agregada con exito');
        } else {
            $data = ['titulo' => 'Agregar Unidad', 'validation' => $this->validator];
            echo view('header');
            echo view('unidades/nuevo', $data);
            echo view('footer');
        }
    }


    public function editar($id)
    {
        $unidad = $this->unidades->where('id', $id)->first();
        $data = ['titulo' => 'editar Unidad', 'datos' => $unidad];

        echo view('header');
        echo view('unidades/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        $this->unidades->update($this->request->getPost('id'), [
            'nombre' => $this->request->getPost('nombre'),
            'nombre_corto' => $this->request->getPost('nombre_corto')
        ]);
        
        return redirect()->to(base_url() . 'unidades')->with('mensaje', 'unidad agregada con exito');
    }

    public function eliminar($id)
    {
        $this->unidades->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . 'unidades')->with('mensaje', 'unidad agregada con exito');
    }

    public function eliminados($activo = 0)
    {
        $unidades = $this->unidades->where('activo', $activo)->findAll();
        $data = ['titulo' => 'unidades eliminadas', 'datos' => $unidades];
        echo view('header');
        echo view('unidades/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        $this->unidades->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . 'unidades')->with('mensaje', 'unidad agregada con exito');
    } */
}
