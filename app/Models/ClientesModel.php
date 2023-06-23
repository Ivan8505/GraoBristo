<?php namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model{
    protected $table = 'Cliente';
    protected $primaryKey = 'ID_Cliente';
    protected $returnType = 'object';
    protected $allowedFields = ['Nome','CPF', 'Rua', 'Numero', 'Bairro', 'CEP', 'Cidade', 'Senha'];
}