<?php
define('ROOT', dirname(__FILE__));

require_once(ROOT.'\components\RouterW.php');

$uri = $_SERVER['REQUEST_URI'];
$result = preg_match('/page/',$uri);
$page = $_GET['page'];

$router = new RouterW();

if (!empty($result) && !empty($page)) {
    $router->run('actionPage', $page);
} else {
    $router->run('actionIndex', '');
}