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

foreach($results['data']['results'] as $client){
    echo $client['nome'] . '<br>';
    echo $client['e-mail'] . '<br>';
    echo $client['telefone'] . '<br>';
    echo $client['created_at'] . '<br>';
    echo $client['upload_at'] . '<br>' . '<br>';
}

$results = api_request('get_all_products', 'GET');
//print_r($results);

foreach($results['data']['results'] as $product){
    echo $product['nome'] . '<br>';
    echo $product['quantidade'] . '<br>';
    echo $product['created_at'] . '<br>';
    echo $product['upload_at'] . '<br>' . '<br>';
}