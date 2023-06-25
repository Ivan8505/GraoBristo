<?php

namespace App\Controllers;

Class Comanda_Control extends BaseController {

    public function index() {
        $session = session();
        $Comanda = $session->get('Comanda');
        $data['preco'] = dot_array_search("0.preço", $Comanda);
        $data['data'] = date('d-m-Y');
        $data['name'] = dot_array_search("0.name", $Comanda);
        return view("Comanda_View", $data);
    }

}
