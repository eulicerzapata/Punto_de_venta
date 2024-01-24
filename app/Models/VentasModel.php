<?php

namespace App\models;

use CodeIgniter\Model;

class VentasModel extends Model
{ //crear modelo Unidades con codeIgniter 4 ?

    protected $table      = 'ventas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'folio',
        'total',
        'id_usuario',
        'id_caja',
        'id_cliente',
        'forma_pago',
        'activo',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = '';
    protected $deletedField  = '';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function insertaVenta($id_venta, $total, $id_usuario,$id_caja, $id_cliente,
     $forma_pago){
        $this->insert([
            'folio'=>$id_venta,
            'total'=> $total,
            'id_usuario'=>$id_usuario,
            'id_caja'=>$id_caja,
            'id_cliente'=>$id_cliente,
            'forma_pago'=>$forma_pago,

        ]);

        return $this-> insertID();
    }
}
