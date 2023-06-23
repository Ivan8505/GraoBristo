<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo base_url('public/CSS/cabecalho-cardapio.css')?>">
    <title>Home Page</title>
</head>
<body>
    <header>
        <nav class="navigation">
            <a href="#" class="logo">Bi<span>st</span>rô<span>Ch</span>ef</a>
            <ul class="nav-menu">
                <li class="nav-item"><a href="#">Home</a></li>
                <li class="nav-item"><a href="#">Sobre</a></li>
                <li class="nav-item"><a href="<?php echo base_url('public/Menu')?>">Faça seu pedido</a></li>
                <i class='bx bx-cart'></i>
            </ul>
            <div class="menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <main>
        <section class="home">
            <div class="home-text">
                <h4 class="text-h4">Bem vindo ao Bistrô Chef</h4>
                <h1 class="text-h1">Não perca tempo e faça seu pedido</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod error veniam in voluptatem magni quisquam</p>
                <a href="<?php echo base_url('public/Menu')?>" class="home-btn">Faça seu pedido</a>
            </div>
            <div class="home-img">
                <img src="<?php echo base_url('public/imagens/home-img.webp')?>" alt="">
            </div>
        </section>
    </main>
    <script src="<?php echo base_url('public/js/script.js')?>"></script>
</body>
</html>
