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

        $args['id_veiculo'] = '';

        $args['placa'] = '';

        $args['marca_veiculo'] = '';

        $args['modelo_veiculo'] = '';
        
       
        if (isset($_GET['id'])) {


            $sql = 'SELECT  placa, modelo_veiculo, marca_veiculo, tipo_veiculo.id FROM veiculo_patio INNER JOIN tipo_veiculo WHERE veiculo_patio.tipo = tipo_veiculo.id AND veiculo_patio.id = ' . $_GET['id'];

            $resultSet = $conection->query($sql)->fetchAll();

            $args['id_veiculo'] = $_GET['id'];

            $args['placa'] = $resultSet[0]['placa'];

            $args['marca_veiculo'] = $resultSet[0]['marca_veiculo'];

            $args['modelo_veiculo'] = $resultSet[0]['modelo_veiculo'];
            
            $args['tipoID'] = $resultSet[0]['id'];


        }


        // Render index view
        return $container->get('renderer')->render($response, 'editar.phtml', $args);
    });

    $app->post('/editar-veiculo/', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/editar-veiculo/' route");

        $conection = $container->get('pdo');

        $params = $request->getParsedBody();

        $sql = 'UPDATE veiculo_patio SET placa = "' . $params['placa'] . '", modelo_veiculo = "' . $params['modelo_veiculo'] . '", marca_veiculo = "' . $params['marca_veiculo'] . '",tipo= ' . $params['tipo'] . ' WHERE id = ' . $params['veiculo'];

        $conection->query($sql)->fetchAll();



        // Render index view
        return $response->withRedirect('/editar-veiculo/');
    });

    $app->delete('/editar-veiculo/[{action}]', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/editar-veiculo/' route");

        $conection = $container->get('pdo');

      

        $sql = 'DELETE FROM veiculo_patio WHERE id = '.$_GET['deletar'];

        $conection->query($sql)->fetchAll();



        // Render index view
        return $response->withRedirect('/editar-veiculo/');
    });
};
