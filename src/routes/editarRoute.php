<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/editar-veiculo/[{action}]', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/editar-veiculo/' route");

        $conection = $container->get('pdo');

        $sql = "SELECT * FROM tipo_veiculo";

        $args["tipo"] = $conection->query($sql)->fetchAll();

        if (isset($_GET['id'])) {


            $sql = 'SELECT  placa, modelo_veiculo, marca_veiculo, tipo_veiculo.tipo, tipo_veiculo.id FROM veiculo_patio INNER JOIN tipo_veiculo WHERE veiculo_patio.tipo = tipo_veiculo.id AND veiculo_patio.id = ' . $_GET['id'];

            $args['veiculo'] = $conection->query($sql)->fetchAll();

            $args['id_veiculo'] = $_GET['id'];
        }


        // Render index view
        return $container->get('renderer')->render($response, 'editar.phtml', $args);
    });

    $app->post('/editar-veiculo/', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/editar-veiculo/' route");

        $conection = $container->get('pdo');
         
        $params = $request->getParsedBody();

        $sql = 'UPDATE veiculo_patio SET placa = '.$params['placa'].', modelo_veiculo = '.$params['modelo_veiculo'].', marca_veiculo = '.$params['marca_veiculo'].',tipo= '.$params['tipo'].' WHERE id = '.$params['veiculo'];

        $conection->query($sql)->fetchAll();



        // Render index view
        return $response->withRedirect('/editar-veiculo/');
    });
};
