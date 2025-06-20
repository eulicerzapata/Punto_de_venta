<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCortesCaja extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_caja'       => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_usuario'    => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'fecha_inicio'  => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'fecha_fin'     => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'monto_inicial' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
            ],
            'monto_final'   => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => true,
            ],
            'total_Ventas'  => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => true,
            ],
            'estatus'       => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('arqueo_caja');
    }

    public function down()
    {
        $this->forge->dropTable('arqueo_caja');
    }
}