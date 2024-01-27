<?php

namespace App\Controllers;

use App\models\ProductosModel;
use App\models\VentasModel;


class Inicio extends BaseController
{
    protected $productosModel,$session;
    protected $ventasModel;

    public function __construct()
    {
        $this->ventasModel = new VentasModel();
        $this->productosModel = new ProductosModel();
        $this->session = session();
    }

    public function index()
    {
        if(!isset($this->session->id_usuario)){
            return redirect()->to(base_url());
        }
        $total = $this->productosModel->totalProductos();
        $minimos = $this->productosModel->productosMinimo();
        $totalVentas = $this->ventasModel->totalDia(date('y-m-d'));

        $datos = ['total' => $total, 'totalVentas' => $totalVentas, 'minimos'=> $minimos ];
        echo view('header');
        echo view('inicio', $datos);
        echo view('footer');
    }
}
