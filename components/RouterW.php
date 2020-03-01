<?php 
class RouterW
{

    public function run($actionName, $paramenters)
    {   
        require_once(ROOT.'\components\Connect.php');
        // Подключение контроллера.
        $controllerFile = ROOT . '\controllers\\NewsController.php';
        // Проверка на наличие файла. 
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }
                

        // Создаем объект, вызываем метод (т.е. action).
        $controllerObject = new NewsController();


        $result = call_user_func(array($controllerObject, $actionName), $paramenters);
    }
}