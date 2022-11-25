<?php

use App\Fakex\Controller\ControllerError;
use App\Fakex\Lib\Psr4AutoloaderClass;

require_once __DIR__ . '/../src/Lib/Psr4AutoloaderClass.php';

// Instanciate the loader
$loader = new Psr4AutoloaderClass();

// Register the base Directories for the name prefix

$loader ->addNamespace('App\Fakex', __DIR__.'/../src/');

// register the autoloader
$loader->register();


//On recupere l'action passée sur l'URL
if (isset($_GET['action'])){
    if (isset($_GET['controller'])){
        $action = $_GET['action'];
        $controller = $_GET['controller'];
        $controllerClassName = 'App\Covoiturage\Controller\Controller'.ucfirst($controller);
        if (!class_exists($controllerClassName)){
            $action = 'error';
            ControllerError::$action();
        }
    }
}
else{
    $action = 'default';
    ControllerError::$action();
    $action = 'error';
    $controller = 'error';
    $controllerClassName = 'App\Covoiturage\Controller\Controller'.ucfirst($controller);
    echo 'caca';
}

$controller = $_GET['controller'] ?? 'standard';
$controllerClassName = "App\Fakex\Controller\Controller".ucfirst($controller);

if(class_exists($controllerClassName)){
    $action = $_GET['action'] ?? 'readAll';
    $controllerClassName::$action();
}