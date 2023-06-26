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

    public function a($a) {
        $db = db_connect();
        $b = explode(", ", $a);
        $index = 0;
        $index1 = 0;
        $i = 0;
        foreach ($b as $b) {
            if ($index1 % 2 == 0) {
                if ($b != "") {
                    $query = $db->query("SELECT Nome_Item FROM `item` WHERE ID = $b");
                }
            }
            foreach ($query->getResult() as $row) {
                $ComandaAdd = [
                    "$index" => [
                        'name' => $row->Nome_Item,
                    ]
                ];
                $index++;
            }
            if ($index1 == 0) {
                $Comanda = $ComandaAdd;
            } else {
                array_push($Comanda, $ComandaAdd[$index1]);
            }
            $index1++;
            if ($index1 % 2 == 0) {

                if ($b != "") {
                    $Comanda[$index - 1]['qtn'] = $b;
                }
            }
        }
        return $Comanda;
    }

}
