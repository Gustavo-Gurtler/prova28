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

};
