<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model {

    protected $table = 'Item';
    protected $primaryKey = 'ID';
    protected $returnType = 'object';
    protected $allowedFields = ['Nome_Item', 'Valor_Item', 'URL', 'Categoria'];

    public function Card($IDs) {
        $db = db_connect();
        for ($index = 0; $index < count($IDs); $index++) {
            if (dot_array_search("$index.ID", $IDs)) {
                $query = $db->query("SELECT *FROM Item WHERE ID = " . dot_array_search("$index.ID", $IDs) . "");
                foreach ($query->getResult() as $row) {
                    $MenuAdd = [
                        $index => [
                            'ID' => $row->ID,
                            'name' => $row->Nome_Item,
                            'preço' => $row->Valor_Item,
                            'Categoria' => $row->Categoria,
                            'Imagem' => $row->URL
                        ]
                    ];
                    if ($index == 0) {
                        $Menu = $MenuAdd;
                    } else {
                        array_push($Menu, $MenuAdd[$index]);
                    }
                }
            }
        }
        return $Menu;
    }
    
        

}
