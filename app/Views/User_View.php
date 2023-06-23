<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $Titulo ?></title>
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"rel="stylesheet"/>
        <?php if ($Tipo == 'Login'): ?>
            <link rel="stylesheet" href="<?php echo base_url('public/CSS/style.css') ?>" />
        <?php elseif ($Tipo == 'Cadastrar'): ?>
            <link rel="stylesheet" href="<?php echo base_url('public/CSS/estilo.css') ?>" />
        <?php endif ?>
    </head>
    <body>
        <?php if ($Tipo == 'Login'): ?>
            <div class="container">
                <div class="card">

                    <form method="post" action="Logar">
                        <h1>Entrar</h1>

                        <div class="label-float">
                            <input type="text" id="usuario" name="usuario" paceholder="required" > 
                            <label for="usuario">Usuario</label>
                        </div>

                        <div class="label-float">
                            <input type="password" id="senha" name="pass" paceholder="required" > 
                            <label for="senha">Senha</label>
                        </div>

                        <div class="justify-center" >
                            <button type="submit">Entrar</button>
                        </div>
                    </form>

                    <div>
                        <hr>
                    </div>

                    <p>Não tem uma conta ?</p>
                    <a href="<?php echo base_url('public/Cadastrar') ?>">Cadastre-se</a>
                </div>
            </div>
        <?php elseif ($Tipo == 'Cadastrar'): ?>
            <div class='container'>
                <div class='card'>

                    <h1> Cadastrar </h1>

                    <div id='msgError'></div>
                    <div id='msgSuccess'></div>

                    <form method="post" action="<?php echo base_url("public/Cadastrar/usuario")?>">
                        <div class="label-float">
                            <input type="text" id="nome" name="name" placeholder=" " required>
                            <label id="labelNome" for="nome">Nome</label>
                        </div>

                        <div class="label-float">
                            <input type="text" id="Email" name="Email" placeholder=" " required>
                            <label id="labelUsuario" for="usuario">Email</label>
                        </div>

                        <div class="label-float">
                            <input type="password" id="senha" name="pass" placeholder=" " required>
                            <label id="labelSenha" for="senha">Senha</label>
                            <i id="verSenha" class="fa fa-eye" aria-hidden="true"></i>

                        </div>

                        <div class="label-float">
                            <input type="password" id="confirmSenha" name="confirm" placeholder=" " required>
                            <label id="labelConfirmSenha" for="confirmSenha">Confirmar Senha</label>
                            <i id="verConfirmSenha" class="fa fa-eye" aria-hidden="true"></i>
                        </div>

                        <div class="label-float">
                            <input type="type" id="celular" name="cel" placeholder="" required>
                            <label id="number" for="celular">Celular</label>

                        </div>  

                        <div class="label-float">
                            <input type="text" id="cpf" name="cpf" placeholder="" required>
                            <label id="labelcpf" for="cpf">CPF</label>
                        </div>  

                        <div class="label-float">
                            <input type="text" id="endereco" name="endereco" placeholder="" required>
                            <label id="labelendereco" for="endereco">Endereço</label>
                        </div>  

                        <div class='justify-center'>
                            <button onclick='cadastrar()'>Cadastrar</button>
                        </div>
                </div>
            </form>
        </div>
    <?php endif ?>
</body>
</html>