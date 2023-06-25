<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model {

    protected $table = 'Cliente';
    protected $primaryKey = 'ID_Cliente';
    protected $returnType = 'object';
    protected $allowedFields = ['Nome', 'CPF', 'Rua', 'Numero', 'Bairro', 'CEP', 'Cidade', 'Senha', 'Email', 'Endereco'];

    public function Id($User) {
        $db = db_connect();
        $query = $db->query("SELECT ID_Cliente FROM Cliente WHERE Email = '$User'");
        foreach ($query->getResult() as $row) {
            return $row->ID_Cliente;
        }
    }

}
