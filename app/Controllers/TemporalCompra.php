<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\TemporalCompraModel;
use App\Models\ProductosModel;


class TemporalCompra extends BaseController
{
    protected $temporal_compra, $productos;
    

    public function __construct()
    {
        $this->temporal_compra = new TemporalCompraModel();
        $this->productos = new ProductosModel();
    }
    

    public function insertar($id_producto, $cantidad, $id_compra )
    {
       
    
        $error = '';

        $producto = $this->productos->where('id', $id_producto)->first();

        if ($producto) {
            $datosExiste = $this->temporal_compra->porIdProductoCompra($id_producto, $id_compra);
            if ($datosExiste) {
                $cantidad = $datosExiste->cantidad + $cantidad;
                $subtotal = $cantidad * $datosExiste->precio;
            } else {
                $subtotal = $cantidad * $producto['precio_compra'];

                $this->temporal_compra->save([
                    'folio' => $id_compra,
                    'id_producto' => $id_producto,  
                    'codigo'=> $producto['codigo'],
                    'nombre' => $producto['nombre'] ,
                    'precio' => $producto['precio_compra'],
                    'cantidad' => $cantidad,
                    'subtotal' => $subtotal

                ]);

            }
        }else{
            $error= 'no existe el producto';

        }

        $res['error']=$error;
        echo json_encode($res);
        

    }
   

    
}
