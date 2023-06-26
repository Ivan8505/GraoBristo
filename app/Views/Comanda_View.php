<!DOCTYPE html>
<html>
    <head>
        <title>Tabela de Pedidos</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #f2f2f2;
                color: #333;
            }

            tr:hover {
                background-color: #f5f5f5;
            }
            .remove {
                background: #eee;
                border: 0;
                width: 30px;
                height: 30px;
                border-radius: 100%;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                font-size: 20px;
            }
            .remove:hover {
                background: #ddd;
            }
        </style>
    </head>
    <body>
        <?php if (dot_array_search('0.name', $Comanda) != ''): ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Dia do Pedido</th>
                    <th>Nome do Produto</th>
                    <th>Quantidade</th>
                    <th>Valor Total</th>
                    <th>X</th>
                </tr>
                <?php for ($index = 0; $index < count($Comanda); $index++): ?>
                    <tr>
                        <td><?php echo dot_array_search("$index.name", $Comanda) ?></td>
                        <td><?php echo dot_array_search("$index.date", $Comanda) ?></td>
                        <td><?php echo dot_array_search("$index.Item", $Comanda) ?></td>
                        <td><?php echo dot_array_search("$index.qtn", $Comanda) ?></td>
                        <td>R$ <?php echo dot_array_search("$index.Total", $Comanda) ?></td>
                        <td>
                            <form action="Remove">
                                <input type="hidden" name="Id" value="<?php echo dot_array_search("$index.Id", $Comanda) ?>">
                                <button class="remove" type="submit">X</button>
                            </form>
                        </td>
                    </tr>
                <?php endfor; ?>
            </table>
        <?php else: ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Dia do Pedido</th>
                    <th>Nome do Produto</th>
                    <th>Quantidade</th>
                    <th>Valor Total</th>
                    <th>X</th>
                </tr>
            </table>
        <?php endif; ?>
    </body>
</html>
