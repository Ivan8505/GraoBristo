<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'funcionario';
    protected $primaryKey = 'ID_Funcionario';
    protected $returnType = 'object';
    protected $allowedFields = ['Nome','Senha'];
}
