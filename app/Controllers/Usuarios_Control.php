<?php

namespace App\Controllers;

Class Usuarios_Control extends BaseController {

    public function index() {
        $session = session();
        if ($session->get('Usuario') == null) {
            return redirect()->to('Login');
        }
        //return view('Home', $data);
    }

    public function Login() {
        $data['Tipo'] = 'Login';
        $data['Titulo'] = 'Login';
        return view('User_View', $data);
    }

    public function Logar() {
        $rules = [
            'usuario' => 'required',
            'pass' => 'required'
        ];

        if ($this->validate($rules)) {
            $user = $this->request->getPost('usuario');
            $passe = $this->request->getPost('pass');

            $db = db_connect();
            $query = $db->query("SELECT 'Cliente' AS Origem, Senha FROM Cliente WHERE nome = '$user'
                                     UNION
                                     SELECT 'Funcionario' AS Origem, Senha FROM Funcionario WHERE nome = '$user';");
            foreach ($query->getResult() as $row) {
                if (password_verify($passe, $row->Senha)) {
                    $session = session();
                    $session->set('Tipo', $row->Origem);
                    $session->set('Usuario', $user);
                    return redirect()->to('Home');
                }
            }
        }
        return redirect()->to('Login');
    }

    public function CadastrarCliente() {
        $data['Titulo'] = 'Cadastrar';
        $data['Tipo'] = 'Cliente';
        return view('User_View', $data);
    }

    public function CadastrarClientes() {
        $rules = [//Regras do campo
            'name' => 'required',
            //'Email' => 'required|is_unique[]',
            'pass' => 'required',
            'confirm' => 'required',
            'cel' => 'required',
            'cpf' => 'required|is_unique[Cliente.CPF]',
            'endereco' => 'required'
        ];
        $error = [//Return das regras
            'name' => ['required' => 'O campo Nome é obrigatório'],
            'Email' => ['required' => 'O campo Email é obrigatório'],
            'pass' => ['required' => 'O campo Senha é obrigatório'],
            'confirm' => ['required' => 'O campo Confirmação de Senha é obrigatório'],
            'cel' => ['required' => 'O campo Celular é obrigatório'],
            'cpf' => ['required' => 'O campo CPF é obrigatório'],
            'endereco' => ['required' => 'O campo Endereço é obrigatório'],
        ];
        if ($this->validate($rules, $error)) {
            $name = $this->request->getPost('name');
            $user = $this->request->getPost('Email');
            $passe = $this->request->getPost('pass');
            $confirm = $this->request->getPost('confirm');
            $number = $this->request->getPost('cel');
            $cpf = $this->request->getPost('cpf');
            $endereco = $this->request->getPost('endereco');

            if ($passe != $confirm) {return redirect()->to('Cadastrar');}//Se as senhas Forem diferentes Retorna Para a tela cadastro

            $dados['Nome'] = $name;
            $dados['Senha'] = password_hash($passe, PASSWORD_DEFAULT);
            $dados['CPF'] = $cpf;
            
            $db = new \App\Models\ClientesModel;
            
            if ($db->insert($dados)) {
                $session = session();
                $session->set('Usuario', $user);
                $session->set('Tipo', "Cliente");
            }
            return redirect()->to('Home');
        }
        return redirect()->to('Cadastrar');
    }

}
