<?php

require __DIR__ . '/vendor/autoload.php';

$router = new Framework\Router;

require __DIR__ . '/config/containers.php';
require __DIR__ . '/routes/web.php';

try {
    $result = $router->run();

    $response = new Framework\Response;
    $params = [
        'container' => $container,
        'params' => $result['params']
    ];
    $response($result['action'], $params);
} catch (Framework\Exceptions\HttpException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
