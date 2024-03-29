<?php
$container = $app->getContainer();

// View with twig, initialisation de twig
$container['view'] = function($container)
{
    $view = new \Slim\Views\Twig('../views');

    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};


// data base
$container['db'] = function($container){
    $db = $container['settings']['db'];
    
    $pdo = new PDO('mysql:host='.$db['host'].';dbname='.$db['name'].';psw='.$db['pass'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
};

$container['notFoundHandler'] = function($container)
{
    return function($request, $response) use ($container)
    {
      $error=[];

      $error['style'] = "404.css";
      return $container['view']->render($response->withStatus(404), 'pages/404.twig', $error);
    };
};
