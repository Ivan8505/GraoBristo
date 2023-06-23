<?php namespace App\Models;

use CodeIgniter\Model;

class ItensModel extends Model{
    protected $table = 'item';
    protected $primaryKey = 'ID';
    protected $returnType = 'object';
    protected $allowedFields = ['Nome_Item','Valor_Item', 'URL', 'Tipo'];
}