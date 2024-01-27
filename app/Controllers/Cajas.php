<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\models\CajasModel;
use App\models\ArqueoCajaModel;
use App\models\VentasModel;




class Cajas extends BaseController
{
    protected $cajas, $arqueoModel, $ventasModel;
    protected $reglas;

    public function __construct()
    {
        $this->cajas = new CajasModel();
        $this->arqueoModel = new ArqueoCajaModel();
        $this->ventasModel = new VentasModel();


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

    public function arqueo($id_caja)
    {
        $arqueos = $this->arqueoModel->getDatos($id_caja);

        $data = ['titulo' => 'Cierres de caja', 'datos' => $arqueos];
        echo view('header');
        echo view('cajas/arqueos', $data);
        echo view('footer');
    }

    public function nuevo_arqueo()
    {
        $session = session();
        

        $existe=$this->arqueoModel->where(['id_caja'=>$session->id_caja, 'estatus'=>1])
            ->countAllResults();
            $existe=0;
            if($existe >0){
                echo 'la caja ya esta abierta';
                exit;
            }



        if ($this->request->getMethod() == "post") {

            $fecha = date('y-m-d h:i:s');
            

            $this->arqueoModel->save([
            'id_caja'=> $session->id_caja, 
            'id_usuario'=> $session->id_usuario,
            'fecha_inicio'=>$fecha,
            'monto_inicial'=> $this->request->getPost('monto_inicial'),
            'estatus' =>1
        ]);
        return redirect()->to(base_url().'cajas');


        } else {
            $caja = $this->cajas->where('id', $session->id_caja)->first();
            $data = ['titulo' => 'Apertura de caja', 'caja' => $caja, 'session'=>$session];
            echo view('header');
            echo view('cajas/nuevo_arqueo', $data);
            echo view('footer');
        }
    }
    public function cerrar()
    {
        $session = session();

        if ($this->request->getMethod() == "post") {

            $fecha = date('y-m-d h:i:s');
            

            $this->arqueoModel->update($this->request->getPost('id_arqueo'),
                [
            'fecha_fin'=>$fecha,
            'monto_final'=> $this->request->getPost('monto_final'),
            'total_ventas'=> $this->request->getPost('total_ventas'),
            'estatus' =>0
        ]);
        return redirect()->to(base_url().'cajas');


        } else {
            $montoTotal = $this->ventasModel->totalDia(date('Y-m-d'));
            $arqueo =$this->arqueoModel->where(['id_caja'=>$session->id_caja, 'estatus'=>1])->first();

            $caja = $this->cajas->where('id', $session->id_caja)->first();
            $data = ['titulo' => 'cierre de caja', 'caja' => $caja,
             'session'=>$session, 'arqueo'=> $arqueo, 'monto'=>$montoTotal ];
            echo view('header');
            echo view('cajas/cerrar', $data);
            echo view('footer');
        }
    }
}
