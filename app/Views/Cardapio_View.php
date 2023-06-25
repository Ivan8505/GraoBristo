<?php $total = 0 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Carrinho de Compras</title>
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo base_url('public/CSS/cabecalho-cardapio.css') ?>" />
        <link rel="stylesheet" href="<?php echo base_url('public/CSS/stylescardapio.css') ?>" />
    </head>
    <body>
        <?php include 'Header.php'; ?>
        <main>
            <div class="page-title">Seu Carrinho</div>
            <div class="content">
                <section>
                    <table>
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <?php
                        $db1 = new App\Models\CardapioModel;
                        $Menu = $db1->a();
                        $db = db_connect();
                        for ($index = 0; $index < count($Menu); $index++) :

                            $id = dot_array_search("$index.ID", $Menu);
                            $Nome = dot_array_search("$index.name", $Menu);
                            $Categoria = dot_array_search("$index.Categoria", $Menu);
                            $valor = dot_array_search("$index.preço", $Menu);
                            $URL = dot_array_search("$index.Imagem", $Menu);
                            $qtn = 0;
                            $preco = 0
                            ?>

                            <tr>
                                <td>
                                    <div class="product">
                                        <img src="<?php echo base_url("public/imagens/$URL") ?>" alt="Error 404" />
                                        <div class="info">
                                            <div class="name"><?php echo $Nome ?></div>
                                            <div class="category"><?php echo $Categoria ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td>R$ <?php echo $valor; ?></td>
                                <?php for ($index1 = 0; $index1 < count($Carrinho); $index1++): ?>
                                    <?php if (dot_array_search("$index1.ID", $Carrinho) == $id): ?>
                                        <?php $qtn = dot_array_search("$index1.qtn", $Carrinho) ?>
                                        <?php $preco = dot_array_search("$index1.preço", $Carrinho) ?>
                                    <?php endif ?>
                                <?php endfor ?>
                            <form action="Adicionar" method="post">
                                <td>
                                    <div class="qty">
                                        <select class="qty" name="qtn" aria-label="Default select example">
                                            <option selected>Selecione a quantidade</option>
                                            <?php for ($index1 = 1; $index1 < 10; $index1++): ?>
                                                <option value="<?php echo $index1 ?>" <?php
                                                if ($qtn == $index1): echo "selected";
                                                endif
                                                ?>><?php echo $index1 ?></option>
                                                    <?php endfor ?>
                                        </select>
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                    </div>
                                </td>
                                <td>R$ <?php echo $qtn * $preco  ?></td>
                                <td>
                                    <button class="remove" type="submit">+</button>
                                </td>
                            </form>
                            </tr>
                        <?php endfor; ?>
                        </td>
                    </table>
                </section>
                <aside>
                    <div class="box">
                        <header>Resumo da compra</header>
                        <div class="info">
                            <?php for ($index1 = 0; $index1 < count($Carrinho); $index1++): ?>
                                <?php if (dot_array_search("$index1.preço", $Carrinho) != null): ?>
                                    <?php $totaladd = intval(dot_array_search("$index1.qtn", $Carrinho)) * intval(dot_array_search("$index1.preço", $Carrinho)) ?>
                                    <?php $total = $total + $totaladd ?>
                                <?php endif ?>
                            <?php endfor ?>
                            <div><span>Sub-total</span><span>R$ <?php echo $total ?></span></div>
                            <div><span>Frete</span><span>Gratuito</span></div>

                        </div>
                        <footer>
                            <span>Total</span>
                            <span>R$ <?php echo $total ?></span>
                        </footer>
                    </div>
                    <form action="Compra" method="Post">
                        <button>Finalizar Compra</button>
                    </form>
                </aside>
            </div>
        </main>

    </body>
</html>