<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\models\ClientesModel;



class Clientes extends BaseController
{
    protected $clientes;
    
    protected $reglas;

    public function __construct()
    {
        $this->clientes = new ClientesModel();
        

        

        helper(['form']);
        $this->reglas=[
            
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
        $clientes = $this->clientes->where('activo', $activo)->findAll();
        $data = ['titulo' => 'clientes', 'datos' => $clientes];
        echo view('header');
        echo view('clientes/clientes', $data);
        echo view('footer');
    }

    public function nuevo()
    {   
        
        $data = ['titulo' => 'Agregar Cliente'];

        echo view('header');
        echo view('clientes/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {

        if ($this->request->getMethod() == "post" 
        && $this->validate($this->reglas)
       ) 
        {



            $this->clientes->save([
                'id' => $this->request->getPost('id'),
                'nombre' => $this->request->getPost('nombre'),
                'direccion' => $this->request->getPost('direccion'),
                'telefono' => $this->request->getPost('telefono'),
                'correo' => $this->request->getPost('correo'),
                
                
            ]);
            return redirect()->to(base_url() . 'clientes')->with('mensaje', 'Cliente agregada con exito');
        } else {
            
           
            $data = ['titulo' => 'Agregar Cliente',
            'validation'=> $this->validator];
            echo view('header');
            echo view('clientes/nuevo', $data);
            echo view('footer');
        }
    }


    public function editar($id)
    {
        
        $cliente = $this->clientes->where('id',$id)->first();
        $data = ['titulo' => 'Editar Cliente',
        'cliente' => $cliente];

        echo view('header');
        echo view('clientes/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        
        $this->clientes->update($this->request->getPost('id'), [
            'id ' => $this->request->getPost('id '),
            'nombre' => $this->request->getPost('nombre'),
            'direccion' => $this->request->getPost('direccion'),
            'telefono' => $this->request->getPost('telefono'),
            'correo' => $this->request->getPost('correo'),
            
            
        ]);
        return redirect()->to(base_url() . 'clientes')->with('mensaje', 'Cliente agregada con exito');

    }

    public function eliminar($id)
    {
        $this->clientes->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . 'clientes')->with('mensaje', 'clientes agregada con exito');
    }

    public function eliminados($activo = 0)
    {
        $clientes = $this->clientes->where('activo', $activo)->findAll();
        $data = ['titulo' => 'clientes eliminadas', 'datos' => $clientes];
        echo view('header');
        echo view('clientes/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        $this->clientes->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . 'clientes')->with('mensaje', 'Cliente agregada con exito');
    }

    public function autocompleteData(){

        $returnData = array();

        $valor=$this->request->getGet("term");
        
        $clientes=$this->clientes->like("nombre",$valor)->where
        ('activo',1)->findall();

        if (!empty($clientes)) {
           foreach($clientes as $row){
            $data['id']=$row['id'];
            $data['value']=$row['nombre'];
            array_push($returnData, $data);

           }
        }
        echo json_encode($returnData);
    }
}
