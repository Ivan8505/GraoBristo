<?php

namespace App\Models;

use CodeIgniter\Model;

class CompraModel extends Model {

    protected $table = 'CarrinhoCompras';
    protected $primaryKey = 'ID';
    protected $returnType = 'object';
    protected $allowedFields = ['ItemCardapio', 'Cliente', 'Conta', 'ID_Cliente'];

    public function a() {
        $Comanda = [
            "" => [
                'Id' => '',
                'name' => '',
                'Item' => '',
                'date' => '',
                'Total' => ''
            ]
        ];
        $ItensCardapio = "";
        $index = 0;
        $ModelCliente = new \App\Models\ClientesModel;
        $ModelItem = new \App\Models\ItemModel;
        $db = db_connect();
        $query = $db->query("SELECT ID, ID_Cliente, DataHora, ItemCardapio, Conta FROM `carrinhocompras` WHERE DataHora LIKE '%" . date('Y-m-d') . "%' && qtn = 1 ORDER BY DataHora Desc");
        foreach ($query->getResult() as $row) {
            $IdCliente = $row->ID_Cliente;
            $Id = $row->ID;
            $ItemCardapio = $row->ItemCardapio;
            $date = $row->DataHora;
            $total = $row->Conta;
            $a = "";
            $b = "";
            $qtn = "";
            $name = $ModelCliente->Name($IdCliente);
            $array = $ModelItem->a($ItemCardapio);
            $ItensCardapio = "";
            for ($index1 = 0; $index1 < count($array); $index1++) {
                if ($b != dot_array_search("$index1.qtn", $array) && '' != dot_array_search("$index1.qtn", $array) ) {
                    $b = dot_array_search("$index1.qtn", $array);
                    $qtn = dot_array_search("$index1.qtn", $array) . ", " . $qtn;
                }
                if ($a != dot_array_search("$index1.name", $array) && '' != dot_array_search("$index1.name", $array)) {
                    $a = dot_array_search("$index1.name", $array);
                    $ItensCardapio = dot_array_search("$index1.name", $array) . ", " . $ItensCardapio;
                }
            }
            $ComandaAdd = [
                "$index" => [
                    'Id' => $Id,
                    'name' => $name,
                    'Item' => $ItensCardapio,
                    'date' => $date,
                    'qtn' => $qtn,
                    'Total' => $total
                ]
            ];
            if ($index == 0) {
                $Comanda = $ComandaAdd;
            } else {
                array_push($Comanda, $ComandaAdd[$index]);
            }
            $index++;
        }
        return $Comanda;
    }
    
    public function alt($Id) {
        $db = db_connect();
        $db->query("UPDATE `carrinhocompras` SET `qtn`='2' WHERE ID = $Id");
    }

}
