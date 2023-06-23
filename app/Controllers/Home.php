<?php namespace App\Controllers;

Class Home extends BaseController {
    
    public function index(){
        return view('welcome_message');
    }
}
