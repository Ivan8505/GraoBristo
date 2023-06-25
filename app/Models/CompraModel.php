<?php

namespace App\Models;

use CodeIgniter\Model;

class CompraModel extends Model {

    protected $table = 'CarrinhoCompras';
    protected $primaryKey = 'ID';
    protected $returnType = 'object';
    protected $allowedFields = ['ItemCardapio', 'Cliente', 'Conta', 'ID_Cliente'];

}
