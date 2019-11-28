<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/consulta-veiculo/', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/consulta-veiculo/' route");

        $conection=$container->get('pdo');

        $sql = 'SELECT placa, modelo_veiculo, marca_veiculo, tipo_veiculo.tipo FROM veiculo_patio INNER JOIN tipo_veiculo WHERE veiculo_patio.tipo = tipo_veiculo.id';

        $args['veiculos']=$conection->query($sql)->fetchAll();

        print_r($args['veiculos']);

        exit;

        // Render index view
        return $container->get('renderer')->render($response, 'consulta.phtml', $args);


    });

};
