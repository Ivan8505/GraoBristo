<?php namespace App\Controllers;

Class Home extends BaseController {
    
    public function index(){
        $data['script'] = "<Script>alert('Obrigado pela preferencia');</Script>";
        return view('Home', $data);
    }
}
