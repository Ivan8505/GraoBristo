<!DOCTYPE html>
<html lang="Pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Home Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('public/CSS/cabecalho-cardapio.css') ?>">
        <style>
            footer {
                background-color: #EDF2F6;
                color: black;
                padding: 20px;
                text-align: center;
            }

            .footer-section {
                display: inline-block;
                margin: 0 20px;
            }

            .footer-section h1 {
                margin: 0;
                text-align: left;
            }
        </style>
        <style>
            .div-separator {
                margin-bottom: 40px;
            }

        </style>
        <?php echo $script?>
    </head>
    <body>
        <?php include 'Header.php'; ?>
        <main>
            <section class="home">
                <div class="home-text col-md-5">
                    <h4 class="text-h4"><strong>Bem vindo ao Bistrô Chef</strong></h4>
                    <h1 class="text-h1">Experiência única</h1>
                    <p>
                        Sabores excepcionais, técnicas
                        inovadoras e pratos memoráveis
                    </p>
                    <a href="<?php echo base_url('public/Menu')?>" class="home-btn">Fazer pedido</a>
                </div>
                <div class="home-img col-md-7">
                    <img src="<?php echo base_url('public/imagens/')?>img-index.jpg" alt="" />
                </div>
            </section>
        </main>

        <h2 class="text-center mb-4 ">Conheça um pouco da nossa história</h2>

        <div class="container div-separator">
            <section id="sec1" class="row d-flex align-items-center sec">
                <article class="col-md-6">
                    <p class="text-center">Bem-vindo ao Bistro Chef, um pedacinho da França em cada prato. Nossa missão é proporcionar aos nossos clientes uma experiência gastronômica autêntica, em um ambiente acolhedor e charmoso. Nossa equipe apaixonada pela culinária francesa se dedica a criar pratos que são verdadeiras obras de arte. Entre e sinta-se em casa em nosso bistrô, onde cada detalhe é cuidadosamente pensado para transportá-lo para as ruelas pitorescas de Paris. Descubra sabores únicos, ingredientes frescos e um atendimento impecável. Aqui, cada refeição é uma celebração.</p>
                </article>
                <article class="col-md-6">
                    <img src="<?php echo base_url('public/imagens/img-historia1.jpg')?>" alt="Imagem" class="img-fluid" style="width: 1600px; height: 600px;">
                </article>
            </section>
        </div>

        <div class="container div-separator">
            <section id="sec2" class="row d-flex align-items-center sec">
                <article class="col-md-6">
                    <img src="<?php echo base_url('public/imagens/img-historia2.jpg')?>" alt="Imagem" class="img-fluid" style="width: 800px; height: 600px;">
                </article>
                <article class="col-md-6">
                    <p class="text-center">No Bistro Chef, a gastronomia francesa ganha vida em cada prato. Nossa cozinha é comandada por chefs talentosos e apaixonados, que transformam ingredientes selecionados em verdadeiras delícias para o paladar. Aqui, você encontrará clássicos como o Boeuf Bourguignon, Coq au Vin e Escargots, preparados com maestria e apresentados de forma sofisticada. Nossas sobremesas são verdadeiras tentações, desde o sabor inigualável do Crème Brûlée até a leveza do Macaron. Além disso, nossa carta de vinhos oferece uma seleção cuidadosa de rótulos franceses, perfeitos para harmonizar com cada prato. Deleite-se com uma experiência gastronômica inesquecível no Bistro Chef, onde a tradição e o sabor se encontram."

                        Sinta-se à vontade para adaptar esses textos conforme sua necessidade e também adicionar mais detalhes sobre o restaurante, como localização, horário de funcionamento ou qualquer outra informação relevante. Espero que isso possa ajudar a criar uma história envolvente para o Bistro Chef!</p>
                </article>
            </section>
        </div>




        <footer>
            <div class="footer-section col-md-2">
                <h1><a href="<?php echo base_url('public')?>" class="logo"> <strong> Bi<span>st</span>rô<span>Ch</span>ef</a> </strong> </h1>
            </div>
            <div class="footer-section col-md-2 ">
                <p>Horário de Funcionamento:</p>
                <p>Seg-Sex: 9h às 18h</p>
                <p>Sáb: 9h às 16h</p>
                <p>Sáb: 9h às 12h</p>
            </div>
            <div class="footer-section col-md-2 ">
                <p>E-mail:</p>
                <p>BistrôChef@gmail.com</p>
                <p>Instagram:</p>
                <p>@BistrôChef</p>
                <div class="row">
                    <p>@Bistrô Chef 2023. TODOS OS DIREITOS RESERVADOS</p>
                </div>
            </div>
        </footer>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('public/js/script.js') ?>"></script>
    </body>
</html>
