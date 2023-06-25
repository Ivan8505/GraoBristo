<?php $total = 0 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Carrinho de Compras</title>
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo base_url('public/CSS/stylescardapio.css') ?>" />
        <link rel="stylesheet" href="<?php echo base_url('public/CSS/cabecalho-cardapio.css') ?>" />
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
                        $db = db_connect();
                        $query = $db->query("SELECT DISTINCT Categoria FROM item;");
                        foreach ($query->getResult() as $row):
                            $query1 = $db->query("SELECT ID, Nome_Item, Valor_Item, URL FROM item WHERE Categoria = '$row->Categoria';");
                            foreach ($query1->getResult() as $row1):
                                $id = $row1->ID;
                                $Nome = $row1->Nome_Item;
                                $Categoria = $row->Categoria;
                                $valor = $row1->Valor_Item;
                                $qtn = 0;
                                $preco = 0
                                ?>

                                <tr>
                                    <td>
                                        <div class="product">
                                            <img src="<?php echo base_url("public/imagens/$row1->URL") ?>" alt="Error 404" />
                                            <div class="info">
                                                <div class="name"><?php echo $Nome ?></div>
                                                <div class="category"><?php echo $Categoria ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>R$ <?php echo $valor; ?></td>
                                    <?php for ($index = 0; $index < count($Carrinho); $index++): ?>
                                        <?php if (dot_array_search("$index.ID", $Carrinho) == $id): ?>
                                            <?php $qtn = dot_array_search("$index.qtn", $Carrinho) ?>
                                            <?php $preco = dot_array_search("$index.preço", $Carrinho) ?>
                                        <?php endif ?>
                                    <?php endfor ?>
                                <form action="Adicionar" method="post">
                                    <td>
                                        <div class="qty">
                                            <select class="qty" name="qtn" aria-label="Default select example">
                                                <option selected>Selecione a quantidade</option>
                                                <?php for ($index = 1; $index < 10; $index++): ?>
                                                    <option value="<?php echo $index ?>" <?php if($qtn == $index): echo "selected"; endif?>><?php echo $index ?></option>
                                                <?php endfor ?>
                                            </select>
                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                        </div>
                                    </td>
                                    <td>R$ <?php echo $qtn * $preco?></td>
                                    <td>
                                        <button class="remove" type="submit">+</button>
                                    </td>
                                </form>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        </td>
                    </table>
                </section>
                <aside>
                    <div class="box">
                        <header>Resumo da compra</header>
                        <div class="info">
                            <?php for ($index = 0; $index < count($Carrinho); $index++): ?>
                                <?php if (dot_array_search("$index.preço", $Carrinho) != null): ?>
                                    <?php $totaladd = intval(dot_array_search("$index.qtn", $Carrinho)) * intval(dot_array_search("$index.preço", $Carrinho)) ?>
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
                        <input type="hidden" value="<?php echo $total ?>" name="valorTotal">
                        <button>Finalizar Compra</button>
                    </form>
                </aside>
            </div>
        </main>

    </body>
</html>