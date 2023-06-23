<?php

namespace App\Controllers;

Class Cardapio_Control extends BaseController {

    public function index() {
        $session = session();
        $data['Titulo'] = "";
        $data['Carrinho'] = $session->get('Carrinho');
        return view('Cardapio_View', $data);
    }

    public function Adicionar() {
        $qtn = $this->request->getPost('qtn');
        $Id = $this->request->getPost('id');
        echo $Id;
        $sesion = session();
        $db = db_connect();
        $i = 0;
        $carrinho = $sesion->get('Carrinho');
        if ($sesion->get('Carrinho') == null) {
            $carrinho = ["" => [
                    'ID' => '',
                    'name' => '',
                    'qtn' => '',
                    'preço' => ''
                ]
            ];
        }
        $boo = true;
        if ($qtn == 'Selecione a quantidade') :
            for ($index = 0; $index < count($carrinho); $index++) :
                if ($Id == dot_array_search("$index.ID", $carrinho)) {
                    $boo = false;
                    unset($carrinho[$index]);
                }
            endfor;
        endif;
            for ($index = 0; $index < count($carrinho); $index++) {
                if ($Id == dot_array_search("$index.ID", $carrinho)) {
                    $boo = false;
                    $qtn = $qtn + dot_array_search("$index.qtn", $carrinho);
                    $carrinho[$index]["qtn"] = $qtn;
                }
            }
        echo "SELECT Nome_Item, Valor_Item FROM item WHERE ID = $Id";
        if ($boo) {
            $query1 = $db->query("SELECT Nome_Item, Valor_Item FROM item WHERE ID = $Id");
            foreach ($query1->getResult() as $row1) {
                $carrinhoadd = [
                    $i => [
                        'ID' => "$Id",
                        'name' => "$row1->Nome_Item",
                        'qtn' => $qtn,
                        'preço' => $row1->Valor_Item
                    ]
                ];
                array_push($carrinho, $carrinhoadd[$i]);
                $i++;
            }
        }

        $sesion->set('Carrinho', $carrinho);
        return redirect()->to('Menu');
    }

}
