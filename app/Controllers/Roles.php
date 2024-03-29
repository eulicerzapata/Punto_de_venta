<?php
namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\RolesModel;
use App\Models\PermisosModel;
use App\Models\DetallesRolesPermisosModel;


class Roles extends BaseController{
    protected $roles, $permisos, $detallesRoles;

    public function __construct(){
        $this->roles = new RolesModel();
        $this->permisos = new PermisosModel();
        $this->detallesRoles = new DetallesRolesPermisosModel();
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

    public function detalles($idRol){

        $permisos = $this->permisos->findAll();

       $permisosAsignados= $this->detallesRoles->where('id_rol', $idRol)->findAll();
        $datos=array();

       



        foreach($permisosAsignados as $permisoAsignado){
            $datos[$permisoAsignado['id_permiso']]=true;
        }

        $data= ['titulo'=>'Asignar permisos', 'permisos' => $permisos, 'id_rol'=>$idRol,
         'asignado'=>$datos ];
        echo view('header');
        echo view('roles/detalles', $data);
        echo view('footer');
    }

    public function guardaPermisos(){
        if($this->request->getMethod()=="post"){
            
            $idRol=$this->request->getPost('id_rol');
            $permisos=$this->request->getPost('permisos');

            $this->detallesRoles->where('id_rol', $idRol)->delete();

            foreach($permisos as $permiso){
                $this-> detallesRoles->save(['id_rol'=>$idRol,'id_permiso'=>$permiso]);
            } 

            return redirect()->to(base_url() . 'roles');
        }
    }




}