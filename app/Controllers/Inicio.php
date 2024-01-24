<?php

namespace App\Controllers;

use App\models\ProductosModel;
use App\models\VentasModel;


class Inicio extends BaseController
{
    protected $productosModel;
    protected $ventasModel;

    public function __construct()
    {
        $this->ventasModel = new VentasModel();
        $this->productosModel = new ProductosModel();
    }

    public function index()
    {

        $total = $this->productosModel->totalProductos();
        $minimos = $this->productosModel->productosMinimo();
        $totalVentas = $this->ventasModel->totalDia(date('y-m-d'));

        $datos = ['total' => $total, 'totalVentas' => $totalVentas, 'minimos'=> $minimos ];
        echo view('header');
        echo view('inicio', $datos);
        echo view('footer');
    }
}
