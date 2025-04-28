<?php

// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');
//echo '<pre>';

//$results = api_request('status', 'GET');
//print_r($results);

//$results = api_request('statusx', 'GET');
//print_r($results);

$results = api_request('get_all_clients', 'GET');
//print_r($results);

//foreach($results['data']['results'] as $client){
//    echo $client['nome'] . '<br>';
//    echo $client['e-mail'] . '<br>';
//    echo $client['telefone'] . '<br>' . '<br>';
//
//}

$results = api_request('get_all_products', 'GET');
//print_r($results);

//foreach($results['data']['results'] as $product){
//    echo $product['nome'] . '<br>';
//    echo $product['quantidade'] . '<br>';
//    echo $product['created_at'] . '<br>' . '<br>';
//
//}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos dos Clientes</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        h2 {
            color: #555;
            border-bottom: 2px solid #ccc;
            padding-bottom: 5px;
            margin-top: 20px;
        }
        .client-info {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .product-info {
            background-color: #e9f5db; /* Um tom de verde claro */
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .info-label {
            font-weight: bold;
            color: #777;
        }
    </style>
</head>
<body>

    <h2>Informações dos Clientes</h2>
    <?php

    $results_clients = api_request('get_all_clients', 'GET');

    if (isset($results_clients['data']['results']) && is_array($results_clients['data']['results'])) {
        foreach($results_clients['data']['results'] as $client){
            echo '<div class="client-info">';
            echo '<p><span class="info-label">Nome:</span> ' . htmlspecialchars($client['nome']) . '</p>';
            echo '<p><span class="info-label">E-mail:</span> ' . htmlspecialchars($client['e-mail']) . '</p>';
            echo '<p><span class="info-label">Telefone:</span> ' . htmlspecialchars($client['telefone']) . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>Não foram encontrados clientes.</p>';
    }
    ?>

    <h2>Pedidos dos Produtos</h2>
    <?php
    $results_products = api_request('get_all_products', 'GET');

    if (isset($results_products['data']['results']) && is_array($results_products['data']['results'])) {
        foreach($results_products['data']['results'] as $product){
            echo '<div class="product-info">';
            echo '<p><span class="info-label">Produto:</span> ' . htmlspecialchars($product['nome']) . '</p>';
            echo '<p><span class="info-label">Quantidade:</span> ' . htmlspecialchars($product['quantidade']) . '</p>';
            echo '<p><span class="info-label">Pedido em:</span> ' . htmlspecialchars($product['created_at']) . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>Não foram encontrados pedidos de produtos.</p>';
    }
    ?>

</body>
</html>