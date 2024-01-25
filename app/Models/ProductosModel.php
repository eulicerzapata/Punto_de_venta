<?php 

namespace App\models;
use CodeIgniter\Model;

class ProductosModel extends Model { //crear modelo Unidades con codeIgniter 4 ?

    protected $table      = 'productos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
         'codigo',
         'nombre',
         'precio_venta',
         'precio_compra',
         'existencias',
         'stock_minimo',
         'inventariable',
         'id_unidad',
         'id_categoria',
         'activo',
        ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = '';
    protected $deletedField  = 'deleted_at';

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

    public function actualizaStock($id_producto, $cantidad, $operador= '+'){
        $this-> set('existencias',"existencias $operador $cantidad", FALSE);
        $this -> where("id",$id_producto);
         $this->update();
    }

    public function totalProductos(){
        return $this->where('activo', 1)->countAllResults(); 
    }

    public function productosMinimo(){
        $where = "stock_minimo >= existencias AND inventariable=1 AND activo=1";
        $this->where($where);
        $sql = $this->countAllResults();
        return $sql;

    }

    public function getProductosMinimo(){
        $where = "stock_minimo >= existencias AND inventariable=1 AND activo=1";
        return $this->where($where)->findAll();
    }

}

?>