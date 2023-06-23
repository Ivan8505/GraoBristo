<?php namespace App\Controllers;

Class Cardapio_Control extends BaseController{
    public function index(){
        
    }
    
    public function Menu(){
        $data['Titulo'] = 'Cardapio';
        $data['Tipo'] = 'Cardapio';
        return view('Cardapio_View', $data);
    }
}