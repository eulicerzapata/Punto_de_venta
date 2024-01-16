<?php
namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\RolesModel;


class Roles extends BaseController{
    protected $roles;

    public function __construct(){
        $this->roles = new RolesModel();
        }

    public function index($activo=1){
        $roles= $this->roles-> where('activo',$activo)->findAll();
        $data=['titulo'=> 'Roles','datos'=>$roles];
        echo view('header');
        echo view('roles/roles',$data);
        echo view('footer');
    }

    public function nuevo (){
        $data=['titulo'=> 'Agregar rol'];

        echo view('header');
        echo view('roles/nuevo',$data);
        echo view('footer');
    }

    public function insertar()
{
    $this->roles->save([
        'nombre' => $this->request->getPost('nombre')
        // Elimina la línea siguiente para no incluir 'nombre_corto'
        // 'nombre_corto' => $this->request->getPost('nombre_corto')
    ]);
    return redirect()->to(base_url() . 'roles')->with('mensaje', 'rol agregada con exito');
}


    public function editar ($id){
        $unidad= $this->roles-> where('id',$id)->first();
        $data=['titulo'=> 'Editar rol', 'datos'=>$unidad];

        echo view('header');
        echo view('roles/editar',$data);
        echo view('footer');
    }

    public function actualizar (){
        $this-> roles->update($this->request->getPost('id'),['nombre'=>
        $this->request->getPost('nombre')]);
        return redirect()->to(base_url().'roles')->with('mensaje','rol agregada con exito');
    }

    public function eliminar ($id){
        $this->roles->update($id, ['activo'=>0]);
        return redirect()->to(base_url().'roles')->with('mensaje','rol agregada con exito');
    }

    public function eliminados($activo=0){
        $roles= $this->roles-> where('activo',$activo)->findAll();
        $data=['titulo'=> 'roles eliminadas','datos'=>$roles];
        echo view('header');
        echo view('roles/eliminados',$data);
        echo view('footer');
    }

    public function reingresar ($id){
        $this->roles->update($id, ['activo'=>1]);
        return redirect()->to(base_url().'roles')->with('mensaje','rol agregada con exito');
    }




}