<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\models\ProductosModel;
use App\Models\UnidadesModel;
use App\Models\CategoriasModel;


class Productos extends BaseController
{
    protected $productos;
    protected $unidades;
    protected $categorias;
    protected $reglas;

    public function __construct()
    {
        $this->productos = new ProductosModel();
        $this->unidades = new UnidadesModel();
        $this->categorias = new CategoriasModel();

        

        helper(['form']);
        $this->reglas=[
            'codigo'=>[
                'rules' => 'required|is_unique[productos.codigo]',
                'errors' => [
                    'required'=>'el campo {field} es obligatorio',
                    'is_unique'=>'el campo {field} debe ser unico: el codigo ingresado ya existe'
            ]
                ],
                'nombre'=> [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                ]
                ]
                ];
                
                }
   


    public function index($activo = 1)
    {
        $productos = $this->productos->where('activo', $activo)->findAll();
        $data = ['titulo' => 'productos', 'datos' => $productos];
        echo view('header');
        echo view('productos/productos', $data);
        echo view('footer');
    }

    public function nuevo()
    {   
        $unidades = $this->unidades->where('activo',1)->findAll();
        $categorias = $this->categorias->where('activo', 1)->findAll();
        $data = ['titulo' => 'Agregar Producto','unidades'=> $unidades, 'categorias'=> $categorias];

        echo view('header');
        echo view('productos/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {

        if ($this->request->getMethod() == "post" 
        && $this->validate($this->reglas)
       ) 
        {



            $this->productos->save([
                'codigo' => $this->request->getPost('codigo'),
                'nombre' => $this->request->getPost('nombre'),
                'existencias' => $this->request->getPost('existencias'),
                'precio_venta' => $this->request->getPost('precio_venta'),
                'precio_compra' => $this->request->getPost('precio_compra'),
                'stock_minimo' => $this->request->getPost('stock_minimo'),
                'inventariable' => $this->request->getPost('inventariable'),
                'id_unidad' => $this->request->getPost('id_unidad'),
                'id_categoria' => $this->request->getPost('id_categoria'),
            ]);
            return redirect()->to(base_url() . 'productos')->with('mensaje', 'Producto agregada con exito');
        } else {
            
            $unidades = $this->unidades->where('activo',1)->findAll();
            $categorias = $this->categorias->where('activo', 1)->findAll();
            $data = ['titulo' => 'Agregar Producto','unidades'=> $unidades, 'categorias'=> $categorias,
            'validation'=> $this->validator];
            echo view('header');
            echo view('productos/nuevo', $data);
            echo view('footer');
        }
    }


    public function editar($id)
    {
        $unidades = $this->unidades->where('activo',1)->findAll();
        $categorias = $this->categorias->where('activo', 1)->findAll();
        $producto = $this->productos->where('id',$id)->first();
        $data = ['titulo' => 'Editar Producto','unidades'=> $unidades, 'categorias'=> $categorias,
        'producto' => $producto];

        echo view('header');
        echo view('productos/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        
        $this->productos->update($this->request->getPost('id'), [
            'codigo' => $this->request->getPost('codigo'),
            'nombre' => $this->request->getPost('nombre'),
            'existencias' => $this->request->getPost('existencias'),
            'precio_venta' => $this->request->getPost('precio_venta'),
            'precio_compra' => $this->request->getPost('precio_compra'),
            'stock_minimo' => $this->request->getPost('stock_minimo'),
            'inventariable' => $this->request->getPost('inventariable'),
            'id_unidad' => $this->request->getPost('id_unidad'),
            'id_categoria' => $this->request->getPost('id_categoria'),
        ]);
        return redirect()->to(base_url() . 'productos')->with('mensaje', 'Producto agregada con exito');

    }

    public function eliminar($id)
    {
        $this->productos->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . 'productos')->with('mensaje', 'Producto agregada con exito');
    }

    public function eliminados($activo = 0)
    {
        $productos = $this->productos->where('activo', $activo)->findAll();
        $data = ['titulo' => 'productos eliminadas', 'datos' => $productos];
        echo view('header');
        echo view('productos/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        $this->productos->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . 'productos')->with('mensaje', 'Producto agregada con exito');
    }

    public function buscarPorCodigo($codigo){
        $this->productos->select('*');
        $this->productos->where('codigo', $codigo);
        $this->productos->where('activo', 1);
        $datos= $this-> productos->get()->getRow();

        $res['existe'] =false;
        $res['datos']='';
        $res['error']='';

        if ($datos) {
            $res['datos']= $datos;
            $res['existe'] = true;

        }else {
            $res['error'] ='No existe el producto';
            $res['existe']= false;
        }

        echo json_encode($res);

        

    }
}