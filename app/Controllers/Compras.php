<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\ComprasModel;
use App\Models\TemporalCompraModel;
use App\Models\DetalleComprasModel;
use App\Models\ProductosModel;



class Compras extends BaseController
{
    protected $compras, $temporal_compra, $detalle_compra, $productos;
    protected $reglas;

   public function __construct()
    {
        $this->compras = new ComprasModel();
        $this->detalle_compra = new DetalleComprasModel();
        helper(['form']);

    
    }
     /*

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

    public function guarda()
    {

        $id_compra= $this-> request-> getPost('id_compra');
        $total= $this-> request-> getPost('total');

        $session = session();
        

        $resultadoId =$this->compras->insertaCompra($id_compra, $total,$session->id_usuario);

        $this->temporal_compra = new TemporalCompraModel();

        if ($resultadoId) {
            $resultadoCompra=$this->temporal_compra-> porCompra($id_compra);
            foreach ($resultadoCompra as $row){
                $this->detalle_compra->save([

                    'id_compra'=>$resultadoId,
                    'id_producto'=>$row['id_producto'],
                    'nombre'=>$row['nombre'],
                    'cantidad'=>$row['cantidad'],
                    'precio'=>$row['precio'],
                    
                ]);
                $this->productos=new ProductosModel();
                $this-> productos-> actualizaStock($row['id_producto'],$row['cantidad']);

            }
            $this->temporal_compra->eliminarCompra($id_compra);
        }
        return redirect()->to(base_url()."/productos");

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
