<?php
//FRONT CONTROLLER + MVC

//отображения ошибок на время написания сайта
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

//ПОДКЛЮЧЕНИЕ ФАЙЛОВ СИСТЕМЫ
define('ROOT', dirname(__FILE__));

//autoload для примера НЕ АНОНИМНАЯ функция
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    if(file_exists(ROOT.'/models/'.$className.'.php')){
        require_once ROOT.'/models/'.$className.'.php';
    }
    if(file_exists(ROOT.'/components/'.$className.'.php')){
        require_once ROOT.'/components/'.$className.'.php';
    }
}

//старт роутинга
$router = new Router();
$router->run();

