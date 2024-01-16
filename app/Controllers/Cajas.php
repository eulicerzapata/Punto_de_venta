<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\models\CajasModel;



class Cajas extends BaseController
{
    protected $cajas;
    protected $reglas;

    public function __construct()
    {
        $this->cajas = new CajasModel();
        helper(['form']);
        $this->reglas = [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'el campo {field} es obligatorio',

                ]
            ],

            'numero_caja' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],

            'folio' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'el campo folio es obligatorio',
                    
                ]
            ],

        ];
    }

    public function index($activo = 1)
    {
        $cajas = $this->cajas->where('activo', $activo)->findAll();
        $data = ['titulo' => 'cajas', 'datos' => $cajas];
        echo view('header');
        echo view('cajas/cajas', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        $data = ['titulo' => 'Agregar Cajas'];

        echo view('header');
        echo view('cajas/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {



            $this->cajas->save([
                'numero_caja' => $this->request->getPost('numero_caja'),
                'nombre' => $this->request->getPost('nombre'),
                'folio' => $this->request->getPost('folio'),

            ]);
            return redirect()->to(base_url() . 'cajas')->with('mensaje', 'caja agregada con exito');
        } else {
            $data = ['titulo' => 'Agregar Caja', 'validation' => $this->validator];
            echo view('header');
            echo view('cajas/nuevo', $data);
            echo view('footer');
        }
    }


    public function editar($id)
    {
        $caja = $this->cajas->where('id', $id)->first();
        $data = ['titulo' => 'editar Unidad', 'datos' => $caja];

        echo view('header');
        echo view('cajas/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        $this->cajas->update(
            $this->request->getPost('id'),
            [
                'numero_caja' => $this->request->getPost('numero_caja'),
                'nombre' => $this->request->getPost('nombre'),
                'folio' => $this->request->getPost('folio')
            ]
        );
        return redirect()->to(base_url() . 'cajas')->with('mensaje', 'caja agregada con exito');
    }

    public function eliminar($id)
    {
        $this->cajas->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . 'cajas')->with('mensaje', 'caja agregada con exito');
    }

    public function eliminados($activo = 0)
    {
        $cajas = $this->cajas->where('activo', $activo)->findAll();
        $data = ['titulo' => 'cajas eliminadas', 'datos' => $cajas];
        echo view('header');
        echo view('cajas/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        $this->cajas->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . 'cajas')->with('mensaje', 'caja agregada con exito');
    }
}
