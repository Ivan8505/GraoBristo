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
  </style>
</head>
<body>
  <table>
    <tr>
      <th>Dia do Pedido</th>
      <th>Nome do Produto</th>
      <th>Valor</th>
    </tr>
    <?php if(true):?>
    <tr>
      <td><?php echo $data?></td>
      <td><?php echo $name?></td>
      <td>R$ <?php echo $preco?></td>
    </tr>
    <?php endif?>
  </table>
</body>
</html>
