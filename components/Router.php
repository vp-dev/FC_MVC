<?php

class Router
{
    public function getUri()
    {
        if(isset($_SERVER['REQUEST_URI'])){
            return substr(trim($_SERVER['REQUEST_URI']),1);
        }
    }
    public function run()
    {
        $request = $this->getUri();

        $routes = include_once (ROOT . '/config/routes.php');

        //перебираем массив роутов
        foreach ($routes as $pattern => $route){
            //если совпадение найдено,...
            if(preg_match("~$pattern~", $request)){
                //...получаем внутренний путь
                $internalRoute = preg_replace("~$pattern~", $route, $request);
                    if($pattern == ""){
                        $internalRoute = 'site/index';
                    }

                    //Начинаем определять контроллер и метод
                    $segments = explode('/', $internalRoute);

                    $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                    $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                    $method = 'action' . ucfirst(array_shift($segments));

                    if(file_exists($controllerFile)){
                        include_once ($controllerFile);
                    }

                    $controllerObj = new $controllerName;
                    //У объекта $controllerObj вызываем метод $method и передаём массив параметров $segments
                    $result = call_user_func_array(array($controllerObj, $method), $segments);

                //нужно только одно вхождение в совпадение
                //if( $result != null) {
                    break;
                //}
            }
        }

    }
}