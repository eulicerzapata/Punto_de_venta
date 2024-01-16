<?php

namespace App\Controllers;
use App\Models\UnidadesModel;
class Home extends BaseController
{
    protected $unidades;

    public function __construct(){
        $this->unidades = new UnidadesModel();
        }
    public function index($activo=1){
        $unidades= $this->unidades-> where('activo',$activo)->findAll();
        $data=['titulo'=> 'unidades','datos'=>$unidades];
        echo view('header');
        echo view('unidades/unidades',$data);
        echo view('footer');
    }
}
