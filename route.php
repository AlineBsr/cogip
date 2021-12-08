<?php

// var_dump($_GET);

define('ROOT', str_replace('route.php', '', $_SERVER['SCRIPT_FILENAME']));
$parameters = explode('/', $_GET['u']);

// var_dump($parameters);

if ($parameters[0] != "") {

    $controller = ucfirst($parameters[0]);
    $action = isset($parameters[1]) ? $parameters[1] : 'route';

    require_once(ROOT . 'controllers/' . $controller . '.php');


    $controller = new $controller();

    if (method_exists($controller, $action)) {
        isset($parameters[2]) ? call_user_func([$controller, $action], $parameters[2]) : $controller->$action();
    } else {
        http_response_code(404);
        echo "Impossible de trouver l'action demandée.";
    }
} else {
    http_response_code(404);
    echo "Impossible de trouver la page demandée.";
}
// phpinfo();
// var_dump(PHP_OS);
// var_dump($parameters[0]);
// var_dump($parameters[1]);
