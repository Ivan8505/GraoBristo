<?php

namespace App\Controllers;

Class Cardapio_Control extends BaseController {

    public function index() {
        $session = session();
        $data['Titulo'] = "";
        $data['Carrinho'] = $session->get('Carrinho');
        if ($session->get('Carrinho') == null) {
            $data['Carrinho'] = ["" => [
                    'ID' => '',
                    'name' => '',
                    'qtn' => '',
                    'preço' => ''
                ]
            ];
        }
        $db = new \App\Models\CardapioModel();
        $data['Menu'] = $db->a();
        return view('Cardapio_View', $data);
    }

    public function Adicionar() {
        $qtn = $this->request->getPost('qtn');
        $Id = $this->request->getPost('id');
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
                print_r($carrinho);
                $boo = false;
                $carrinho[$index]["qtn"] = $qtn;
            }
        }
        if ($boo) {
            if ($qtn == 'Selecione a quantidade') {
                return redirect()->to('Menu');
            }
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

    public function Compra() {
        $session = session();
        $Carrinho = $session->get('Carrinho');
        if ($Carrinho == null) {
            return redirect()->to('Menu');
        }
        $boo = true;
        for ($index = 0; $index < count($Carrinho); $index++) {
            if (dot_array_search("$index.ID", $Carrinho) != null) {
                $boo = false;
            }
        }
        if ($boo) {
            return redirect()->to('Menu');
        }
        $boo = false;
        $user = $session->get('Usuario');
        $ItemCardapio = "";
        $total = 0;
        $itemadd = "2";
        for ($index = 0; $index < count($Carrinho); $index++) {
            if (dot_array_search("$index.ID", $Carrinho) != null) {
                $itemAdd = dot_array_search("$index.ID", $Carrinho);
                $qtnAdd = dot_array_search("$index.qtn", $Carrinho);
                $ItemCardapio = $itemAdd . ", " . $qtnAdd . ", " . $ItemCardapio;
                $totaladd = intval(dot_array_search("$index.qtn", $Carrinho)) * intval(dot_array_search("$index.preço", $Carrinho));
                $total = $total + $totaladd;
            }
        }

        $ModelUser = new \App\Models\ClientesModel();
        $idUser = $ModelUser->Id($user);

        $dados['ItemCardapio'] = $ItemCardapio;
        $dados['Cliente'] = $idUser;
        $dados['Conta'] = $total;
        $dados['ID_Cliente'] = $idUser;
        $ModelCompra = new \App\Models\CompraModel();
        if ($ModelCompra->insert($dados)) {
            for ($index = 0; $index < count($Carrinho); $index++) {
                if (dot_array_search("$index.ID", $Carrinho) != null) {
                    unset($Carrinho[$index]);
                    $boo = true;
                }
                $session->set('Carrinho', $Carrinho);
            }
        }
        if ($boo) {
            return redirect()->to('Home');
        }
        return redirect()->to('Menu');
    }

}
