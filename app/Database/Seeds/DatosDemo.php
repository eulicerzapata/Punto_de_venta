<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatosDemo extends Seeder
{
    public function run()
    {
        // Unidades
        $this->db->table('unidades')->insert([
            'nombre' => 'Pieza',
            'nombre_corto' => 'pz',
            'activo' => 1,
            'fecha_alta' => date('Y-m-d H:i:s')
        ]);

        // Categorias
        $this->db->table('categorias')->insert([
            'nombre' => 'General',
            'nombre_corto' => 'GEN',
            'activo' => 1,
            'fecha_alta' => date('Y-m-d H:i:s')
        ]);

        // Cajas
        $this->db->table('cajas')->insert([
            'numero_caja' => 1,
            'nombre' => 'Caja Principal',
            'folio' => 1,
            'activo' => 1,
            'fecha_alta' => date('Y-m-d H:i:s')
        ]);

        // Roles
        $this->db->table('roles')->insert([
            'nombre' => 'Administrador',
            'activo' => 1,
            'fecha_alta' => date('Y-m-d H:i:s')
        ]);

        // Permisos
        $this->db->table('permisos')->insert([
            'nombre' => 'ver_dashboard',
            'tipo' => 'visualizar'
        ]);

        // Usuarios
        $this->db->table('usuarios')->insert([
            'usuario' => 'admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'nombre' => 'Administrador',
            'id_caja' => 1,
            'id_rol' => 1,
            'activo' => 1,
            'fecha_alta' => date('Y-m-d H:i:s'),
            'fecha_modifica' => null
        ]);

        // Clientes
        $this->db->table('clientes')->insert([
            'nombre' => 'Publico General',
            'direccion' => 'N/A',
            'telefono' => '0000000000',
            'correo' => 'publico@general.com',
            'activo' => 1,
            'fecha_alta' => date('Y-m-d H:i:s'),
            'fecha_edit' => null
        ]);

        // Productos
        $this->db->table('productos')->insert([
            'codigo' => '0001',
            'nombre' => 'Producto Demo',
            'precio_venta' => 10.00,
            'precio_compra' => 7.00,
            'existencias' => 100,
            'stock_minimo' => 5,
            'inventariable' => 1,
            'id_unidad' => 1,
            'id_categoria' => 1,
            'activo' => 1,
            'fecha_alta' => date('Y-m-d H:i:s')
        ]);

        // Configuracion
        $this->db->table('configuracion')->insertBatch([
    ['nombre' => 'tienda_nombre', 'valor' => 'Mi Tienda'],
    ['nombre' => 'tienda_direccion', 'valor' => 'Calle Falsa 123'],
    ['nombre' => 'ticket_leyenda', 'valor' => '¡Gracias por su compra!'],
]);

        // Ventas
        $this->db->table('ventas')->insert([
            'folio' => 'V0001',
            'total' => 100.00,
            'id_usuario' => 1,
            'id_caja' => 1,
            'id_cliente' => 1,
            'forma_pago' => 'Efectivo',
            'activo' => 1,
            'fecha_alta' => date('Y-m-d H:i:s')
        ]);

        // Compras
        $this->db->table('compras')->insert([
            'folio' => 'C0001',
            'total' => 70.00,
            'id_usuario' => 1,
            'activo' => 1,
            'fecha_alta' => date('Y-m-d H:i:s')
        ]);

        // DetalleVenta
        $this->db->table('detalle_venta')->insert([
            'id_venta' => 1,
            'id_producto' => 1,
            'nombre' => 'Producto Demo',
            'cantidad' => 2,
            'precio' => 10.00,
            'fecha_alta' => date('Y-m-d H:i:s')
        ]);

        // DetalleCompra
        $this->db->table('detalle_compra')->insert([
            'id_compra' => 1,
            'id_producto' => 1,
            'nombre' => 'Producto Demo',
            'cantidad' => 10,
            'precio' => 7.00,
            'fecha_alta' => date('Y-m-d H:i:s')
        ]);

        // DetalleRolesPermisos
        $this->db->table('detalle_roles_permisos')->insert([
            'id_rol' => 1,
            'id_permiso' => 1
        ]);

        // Logs
        $this->db->table('logs')->insert([
            'id_usuario' => 1,
            'evento' => 'login',
            'ip' => '127.0.0.1',
            'detalles' => 'Primer acceso',
            'fecha' => date('Y-m-d H:i:s')
        ]);
    }
}