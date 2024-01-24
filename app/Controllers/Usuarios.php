<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\CajasModel;
use App\Models\RolesModel;


class Usuarios extends BaseController
{
    protected $usuarios, $cajas, $roles;
    protected $reglas, $reglaslogin, $reglascambia;

    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->cajas = new CajasModel();
        $this->roles = new RolesModel();

        helper(['form']);
        $this->reglas = [
            'usuario' => [
                'rules' => 'required|is_unique[usuarios.usuario]',
                'errors' => [
                    'required' => 'el campo {field} es obligatorio',
                    'is_unique' => 'el campo {field} debe ser unico: el usuario ingresado ya existe'
                ]
            ],

            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],

            'repassword' => [
                'rules'  => 'required|matches[password]',
                'errors' => [
                    'required' => 'las constraseñas no coinciden',
                    'matches' => 'las contraseñas no coinciden.'
                ]
            ],

            'nombre' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],

            'id_caja' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],

            'id_rol' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ]



        ];

        helper(['form']);
        $this->reglaslogin = [
            'usuario' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'el campo {field} es obligatorio',

                ]
            ],

            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
        ];

        $this->reglascambia = [
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'el campo {field} es obligatorio',

                ]
            ],

            'repassword' => [
                'rules'  => 'required|matches[password]',
                'errors' => [
                    'required' => 'las constraseñas no coinciden',
                    'matches' => 'las contraseñas no coinciden.'
                ]
            ],
        ];
    }

    public function index($activo = 1)
    {
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();
        $data = ['titulo' => 'usuarios', 'datos' => $usuarios];
        echo view('header');
        echo view('usuarios/usuarios', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        $cajas = $this->cajas->where('activo', 1)->findAll();
        $roles = $this->roles->where('activo', 1)->findAll();
        $data = ['titulo' => 'Agregar Usuario', 'cajas' => $cajas, 'roles' => $roles];

        echo view('header');
        echo view('usuarios/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            //$hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->usuarios->save([
                'usuario' => $this->request->getPost('usuario'),
                'password' => $this->request->getPost('password'),
                'nombre' => $this->request->getPost('nombre'),
                'id_caja' => $this->request->getPost('id_caja'),
                'id_rol' => $this->request->getPost('id_rol'),
                'activo' => 1
            ]);
            return redirect()->to(base_url() . 'usuarios')->with('mensaje', 'unidad agregada con exito');
        } else {

            $cajas = $this->cajas->where('activo', 1)->findAll();
            $roles = $this->roles->where('activo', 1)->findAll();
            $data = [
                'titulo' => 'Agregar Usuario',
                'cajas' => $cajas,
                'roles' => $roles,
                'validation' => $this->validator
            ];

            echo view('header');
            echo view('usuarios/nuevo', $data);
            echo view('footer');
        }
    }


    public function editar($id)
    {
        $roles = $this->roles->where('activo', 1)->findAll();
        $cajas = $this->cajas->where('activo', 1)->findAll();
        $usuario = $this->usuarios->where('id', $id)->first();
        $data = ['titulo' => 'editar Unidad',
         'roles' => $roles, 
         'cajas'=>$cajas,
         'usuario'=>$usuario
        ];

        echo view('header');
        echo view('usuarios/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        $this->usuarios->update($this->request->getPost('id'), [
            'usuario' => $this->request->getPost('usuario'),
                'password' => $this->request->getPost('password'),
                'nombre' => $this->request->getPost('nombre'),
                'id_caja' => $this->request->getPost('id_caja'),
                'id_rol' => $this->request->getPost('id_rol'),
                
        ]);
        return redirect()->to(base_url() . 'usuarios')->with('mensaje', 'unidad agregada con exito');
    }

    public function eliminar($id)
    {
        $this->usuarios->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . 'usuarios')->with('mensaje', 'unidad agregada con exito');
    }

    public function eliminados($activo = 0)
    {
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();
        $data = ['titulo' => 'usuarios eliminadas', 'datos' => $usuarios];
        echo view('header');
        echo view('usuarios/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        $this->usuarios->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . 'usuarios')->with('mensaje', 'unidad agregada con exito');
    }

    public function login()
    {
        echo view('login');
    }

    public function valida()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglaslogin)) {

            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');
            $datosusuario = $this->usuarios->where('usuario', $usuario)->first();

            if ($datosusuario != null) {
                if ($password === $datosusuario['password']) {
                    $datosSesion = [
                        'id_usuario' => $datosusuario['id'],
                        'nombre' => $datosusuario['nombre'],
                        'id_caja' => $datosusuario['id_caja'],
                        'id_rol' => $datosusuario['id_rol'],
                    ];

                    $session = session();
                    $session->set($datosSesion);

                    return redirect()->to(base_url() . 'inicio');
                } else {
                    $data['error'] = "las contraseñas no coinciden ";
                    echo view("login", $data);
                }
            } else {
                $data['error'] = "el usuario no existe";
                echo view("login", $data);
            }
        } else {
            $data = ['validation' => $this->validator];
            echo view("login", $data);
        }
    }


    public function logout()
    {

        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }

    public function cambia_password()
    {

        $session = session();
        $usuario = $this->usuarios->where('id', $session->id_usuario)->first();
        $data = ['titulo' => 'cambiar contraseña', 'usuario' => $usuario];

        echo view('header');
        echo view('usuarios/cambia_password', $data);
        echo view('footer');
    }

    public function actualiza_password()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglascambia)) {

            //$hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $session = session();
            $id_usuario = $session->id_usuario;

            $this->usuarios->update($id_usuario, ['password' => $this->request->getPost('password')]);

            $usuario = $this->usuarios->where('id', $session->id_usuario)->first();
            $data = [
                'titulo' => 'cambiar contraseña',
                'usuario' => $usuario,
                'mensaje' => 'contraseña actulizada'
            ];

            echo view('header');
            echo view('usuarios/cambia_password', $data);
            echo view('footer');
        } else {

            $session = session();
            $usuario = $this->usuarios->where('id', $session->id_usuario)->first();
            $data = [
                'titulo' => 'cambiar contraseña',
                'usuario' => $usuario,
                'validation' => $this->validator
            ];

            echo view('header');
            echo view('usuarios/cambia_password', $data);
            echo view('footer');
        }
    }
}
