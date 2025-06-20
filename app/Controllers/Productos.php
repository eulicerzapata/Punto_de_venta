<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\models\ProductosModel;
use App\Models\UnidadesModel;
use App\Models\CategoriasModel;
use App\Models\DetallesRolesPermisosModel;


class Productos extends BaseController
{
    protected $productos;
    protected $unidades;
    protected $categorias;
    protected $reglas;
    protected $detallesRoles, $session;
    

    public function __construct()
    {
        $this->productos = new ProductosModel();
        $this->unidades = new UnidadesModel();
        $this->categorias = new CategoriasModel();
        $this->detallesRoles = new DetallesRolesPermisosModel();
        $this->session = Session();



        helper(['form']);
        $this->reglas = [
            'codigo' => [
                'rules' => 'required|is_unique[productos.codigo]',
                'errors' => [
                    'required' => 'el campo {field} es obligatorio',
                    'is_unique' => 'el campo {field} debe ser unico: el codigo ingresado ya existe'
                ]
            ],
            'nombre' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ]
        ];
    }



    public function index($activo = 1)
    {

        //$permiso= $this->detallesRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');

       // if(!$permiso){
        //   // echo 'no tiene permiso';
         //  echo view('header');
         //   echo view('error_403');
         //   echo view('footer');
         //   exit;
       // }

        $productos = $this->productos->where('activo', $activo)->findAll();
        $data = ['titulo' => 'productos', 'datos' => $productos];
        echo view('header');
        echo view('productos/productos', $data);
        echo view('footer');
    }

    public function nuevo()
    {
       

        $unidades = $this->unidades->where('activo', 1)->findAll();
        $categorias = $this->categorias->where('activo', 1)->findAll();
        $data = ['titulo' => 'Agregar Producto', 'unidades' => $unidades, 'categorias' => $categorias];

        echo view('header');
        echo view('productos/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {

        if (
            $this->request->getMethod() == "post"
            && $this->validate($this->reglas)
        ) {



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
                //$id=$this->productos->insertID();

           /* $validacion = $this->validate([
                'img_producto' =>[
                    'uploaded[img_producto]',
                    'mime_in[img_producto,image/jpg, image/jpeg]',
                    'max_size[img_producto, 4096]'
                    ]]);
    
                    if ($validacion) {
                        $ruta_logo = "images/productos".$id.".jpg";

                        if (file_exists($ruta_logo)) {
                           unlink($ruta_logo);
                        }
                        $img =$this->request->getFile('img_producto');
                        $img->move('./images/productos'.$id.'.jpg'); 
                    }else{
                        
                    } */

            return redirect()->to(base_url() . 'productos')->with('mensaje', 'Producto agregada con exito');
        } else {

            $unidades = $this->unidades->where('activo', 1)->findAll();
            $categorias = $this->categorias->where('activo', 1)->findAll();
            $data = [
                'titulo' => 'Agregar Producto', 'unidades' => $unidades, 'categorias' => $categorias,
                'validation' => $this->validator
            ];
            echo view('header');
            echo view('productos/nuevo', $data);
            echo view('footer');
        }
    }


    public function editar($id)
    {
        $unidades = $this->unidades->where('activo', 1)->findAll();
        $categorias = $this->categorias->where('activo', 1)->findAll();
        $producto = $this->productos->where('id', $id)->first();
        $data = [
            'titulo' => 'Editar Producto', 'unidades' => $unidades, 'categorias' => $categorias,
            'producto' => $producto
        ];

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

    public function buscarPorCodigo($codigo)
    {
        $this->productos->select('*');
        $this->productos->where('codigo', $codigo);
        $this->productos->where('activo', 1);
        $datos = $this->productos->get()->getRow();

        $res['existe'] = false;
        $res['datos'] = '';
        $res['error'] = '';

        if ($datos) {
            $res['datos'] = $datos;
            $res['existe'] = true;
        } else {
            $res['error'] = 'No existe el producto';
            $res['existe'] = false;
        }

        echo json_encode($res);
    }

    public function autocompleteData()
    {

        $returnData = array();

        $valor = $this->request->getGet("term");

        $productos = $this->productos->like('codigo', $valor)->where('activo', 1)->findall();

        if (!empty($productos)) {
            foreach ($productos as $row) {
                $data['id'] = $row['id'];
                $data['value'] = $row['codigo'];
                $data['label'] = $row['codigo'] . ' - ' . $row['nombre'];
                array_push($returnData, $data);
            }
        }
        echo json_encode($returnData);
    }
    public function generaBarras(){

        $pdf = new \FPDF('P','mm','letter');
        $pdf->AddPage();
        $pdf->SetMargins(10,10,10);
        $pdf->SetTitle("codigos de barras");

        $productos = $this->productos->where('activo', 1)->findAll();
        foreach ($productos as $producto) {
            $codigo= $producto['codigo'];

            $generaBarcode = new \barcode_genera();
        $generaBarcode -> barcode("images/barcode/".$codigo .".png",$codigo,20,"horizontal","code128",true);

        $pdf->Image("images/barcode/".$codigo .".png");
        //unlink("images/barcode/".$codigo."png");
        }

        $this->response->setHeader('Content-type', 'application/pdf');
        $pdf->Output('Codigos.pdf', 'I');
        
        
    }
    function muestraCodigos(){
        
        echo view('header');
        echo view('productos/ver_codigos', );
        echo view('footer');

    }

    public function generaMinimosPdf(){

        $pdf = new \FPDF('P','mm','letter');
        $pdf->AddPage();
        $pdf->SetMargins(10,10,10);
        $pdf->SetTitle("productos con stock minimo");
        $pdf->SetFont("Arial", 'B', 10);
        $pdf->Image("images/logotipo.png",10,5,20);
        $pdf->Cell(0,5,utf8_decode("reporte de productos con stock minimo"), 0,1,'C');
        $pdf->Ln(10);

        $pdf->Cell(40,5, utf8_decode("codigo"),1,0,"C");
        $pdf->Cell(70,5, utf8_decode("Nombre"),1,0,"C");
        $pdf->Cell(40,5, utf8_decode("Existencias"),1,0,"C");
        $pdf->Cell(40,5, utf8_decode("Stock Minimo"),1,1,"C");
        
        $datosProductos = $this->productos->getProductosMinimo();
        foreach($datosProductos as $producto){
            $pdf->Cell(40,5, $producto['codigo'],1,0,"C");
        $pdf->Cell(70,5, $producto['nombre'],1,0,"C");
        $pdf->Cell(40,5, $producto['existencias'],1,0,"C");
        $pdf->Cell(40,5, $producto['stock_minimo'],1,1,"C");
        
        }

        $this->response->setHeader('Content-type', 'application/pdf');
        $pdf->Output('ProductoMinimo.pdf', 'I');
        
        
    }
    function mostrarMinimos(){
        
        echo view('header');
        echo view('productos/ver_minimos', );
        echo view('footer');

    }
}
