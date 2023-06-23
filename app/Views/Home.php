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
    <?php include 'Header.php';?>
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
