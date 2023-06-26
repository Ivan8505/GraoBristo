<?php

namespace App\Controllers;

Class Comanda_Control extends BaseController {

    public function index() {
        $bd = new \App\Models\CompraModel();
        $Comanda['Comanda'] = $bd->a();
        return view("Comanda_View", $Comanda);
    }

    public function rem() {
        $bd = new \App\Models\CompraModel();
        $bd->alt($this->request->getGet('Id'));
        return redirect()->to('Comanda');
    }

}
