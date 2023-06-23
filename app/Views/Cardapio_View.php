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
                                ?>
                                <form action="Adicionar" method="post">
                                    <tr>
                                        <td>
                                            <div class="product">
                                                <img src="<?php echo base_url("public/imagens/$row1->URL") ?>" alt="" />
                                                <div class="info">
                                                    <div class="name"><?php echo $Nome ?></div>
                                                    <div class="category"><?php echo $Categoria ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>R$ <?php echo $valor ?></td>
                                        <td>
                                            <div class="qty">
                                                <select class="qty" name="qtn" aria-label="Default select example">
                                                    <option selected>Selecione a quantidade</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                </select>
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                            </div>
                                        </td>
                                        <?php if ($Carrinho == null): ?>
                                            <?php
                                            for ($index = 0; $index < count($session->get('Carrinho')); $index++) :
                                                $qnt = dot_array_search("$index.qtn", $session->get('Carrinho'));
                                                $valor = dot_array_search("$index.preço", $session->get('Carrinho'));
                                                echo $valor;
                                                ?>
                                            <?php endfor ?>
                                        <?php else : $qtn = 0 ?>
                                        <?php endif ?>
                                        <td>R$ <?php echo $valor * $qtn ?></td>
                                        <td>
                                            <button class="remove" type="submit">+</button>
                                        </td>
                                    </tr>
                                </form>
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
                                    <div><span>Item</span><span><?php echo dot_array_search("0.name", $Carrinho) ?></span></div>
                                    <div><span>Quantidade</span><span><?php if ($Carrinho) {echo dot_array_search("$index.qtn", $Carrinho);} else {echo "0";}?></span></div>
                                    <div><span>Sub-total</span><span>R$ <?php echo dot_array_search("$index.qtn", $Carrinho) * dot_array_search("$index.preço", $Carrinho) ?></span></div>
                                <?php endif ?>
                            <?php endfor ?>
                            <div><span>Frete</span><span>Gratuito</span></div>

                        </div>
                        <footer>
                            <span>Total</span>
                            <span>R$ 418</span>
                        </footer>
                    </div>
                    <button>Finalizar Compra</button>
                </aside>
            </div>
        </main>

    </body>
</html>
