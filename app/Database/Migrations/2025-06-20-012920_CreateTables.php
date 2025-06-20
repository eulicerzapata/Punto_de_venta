<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTables extends Migration
{
    public function up()
    {
        // Create cajas table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'numero_caja' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'folio' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'activo' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 1,
            ],
            'fecha_alta' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'fecha_modifica' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('cajas');

        // Create categorias table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nombre_corto' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'activo' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 1,
            ],
            'fecha_alta' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'fecha_edit' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('categorias');

        // Create clientes table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'direccion' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'telefono' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'correo' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'activo' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 1,
            ],
            'fecha_alta' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'fecha_edit' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('clientes');

        // Create compras table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'folio' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'total' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'id_usuario' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'activo' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 1,
            ],
            'fecha_alta' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('compras');

        // Create configuracion table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'valor' => [
                'type' => 'TEXT',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('configuracion');

        // Create detalle_compra table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'id_compra' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_producto' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'cantidad' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'precio' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'fecha_alta' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('detalle_compra');

        // Create detalle_venta table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'id_venta' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_producto' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'cantidad' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'precio' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'fecha_alta' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('detalle_venta');

        // Create detalle_roles_permisos table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'id_rol' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_permiso' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'fecha_alta' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('detalle_roles_permisos');

        // Create logs table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'id_usuario' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'evento' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'ip' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'detalles' => [
                'type' => 'TEXT',
            ],
            'fecha' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('logs');

        // Create permisos table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tipo' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('permisos');

        // Create productos table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'codigo' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'precio_venta' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'precio_compra' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'existencias' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'stock_minimo' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'inventariable' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 1,
            ],
            'id_unidad' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_categoria' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'activo' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 1,
            ],
            'fecha_alta' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('productos');

        // Create roles table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'activo' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 1,
            ],
            'fecha_alta' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'fecha_modifica' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('roles');

        // Create unidades table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nombre_corto' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'activo' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 1,
            ],
            'fecha_alta' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'fecha_edit' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('unidades');

        // Create usuarios table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'usuario' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_caja' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_rol' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'activo' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 1,
            ],
            'fecha_alta' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'fecha_modifica' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('usuarios');

        // Create ventas table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'folio' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'total' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'id_usuario' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_caja' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_cliente' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'forma_pago' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'activo' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 1,
            ],
            'fecha_alta' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ventas');
    }

    public function down()
    {
        $this->forge->dropTable('cajas');
        $this->forge->dropTable('categorias');
        $this->forge->dropTable('clientes');
        $this->forge->dropTable('compras');
        $this->forge->dropTable('configuracion');
        $this->forge->dropTable('detalle_compra');
        $this->forge->dropTable('detalle_venta');
        $this->forge->dropTable('detalle_roles_permisos');
        $this->forge->dropTable('logs');
        $this->forge->dropTable('permisos');
        $this->forge->dropTable('productos');
        $this->forge->dropTable('roles');
        $this->forge->dropTable('unidades');
        $this->forge->dropTable('usuarios');
        $this->forge->dropTable('ventas');
    }
}