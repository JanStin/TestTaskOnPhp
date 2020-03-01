<?php 
class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath); // Присвоение переменной массива. 
    }

    public function run()
    {
        // Получение строки запроса.        
        $uri = $this->getURI();
        
        // Проверка наличия такого запроса в routes.php.
        foreach ($this->routes as $uriPattern => $path) {
            // Сравниваем $uriPattern и $uri.
            if (preg_match("~$uriPattern~", $uri)) {
                
                // Получаем внутренний путь. 
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                

                // Определение какой контролер 
                // и action обрабатывают запрос.
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);
                
                $actionName = 'action'.ucfirst(array_shift($segments));

                $paramenters = $segments;

                // Подключение файла класса-контроллера.
                $controllerFile = ROOT . '\controllers\\' . $controllerName . '.php';
                

                // Проверка на наличие файла. 
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                

                // Создаем объект, вызываем метод (т.е. action).
                $controllerObject = new $controllerName;

                
                $result = call_user_func_array(array($controllerObject, $actionName), $paramenters);

                if ($result != null) {
                    break;
                }
            }
        }
    }

     // Получение строки запроса. Возвращает строку.
     private function getURI() 
     {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
     }
}