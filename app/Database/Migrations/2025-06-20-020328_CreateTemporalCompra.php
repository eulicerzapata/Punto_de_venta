<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTemporalCompra extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'folio'      => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'id_producto'=> [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'codigo'     => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'nombre'     => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'cantidad'   => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'precio'     => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'subtotal'   => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('temporal_compra');
    }

    public function down()
    {
        $this->forge->dropTable('temporal_compra');
    }
}