<?php

namespace App\Models;

use CodeIgniter\Model;

class CardapioModel extends Model {

    protected $table = 'Cardapio';
    protected $primaryKey = 'Cod_Card';
    protected $returnType = 'object';
    protected $allowedFields = ['ID_Item'];

    public function a() {
        $db = new \App\Models\ItemModel();
        $Db = db_connect();
        $query = $Db->query("SELECT ID_Item FROM Cardapio");
        $i = 0;
        $IDs = [''=>['ID'=>'']];
        foreach ($query->getResult() as $row) {
            $IDsAdd = [
                $i => [
                    'ID' => $row->ID_Item,
                ]
            ];
            array_push($IDs, $IDsAdd[$i]);
            $i++;
        }
        return $db->Card($IDs);
    }

}
