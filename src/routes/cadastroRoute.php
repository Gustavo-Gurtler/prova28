<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/cadastroVeiculo/', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/cadastroVeiulo/' route");

        $conection=$container->get("pdo");
        
        $sql="SELECT * FROM tipo_veiculo";
        
        $args["tipo"]= $conection->query($sql)->fetchAll();

        

    


        // Render index view
        return $container->get('renderer')->render($response, 'cadastro.phtml', $args);


    });
    
    // conecta post
    $app->post('/cadastroVeiculo/', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/cadastroVeiulo/' route");

        $conection=$container->get("pdo");
        $params=$request->getParsedBody(); 
        
        $sql='INSERT INTO veiculo_patio (placa, marca_veiculo, modelo_veiculo) VALUES("'.$params['placa'].'", "'.$params['marca_veiculo'].'","'.$params['modelo_veiculo'].'") ';
        
        
        $conection->query($sql)->fetchAll();

        
    


        // Render index view
        return $response->withRedirect('/');

    });

};
