<?php

include_once ROOT . '\models\News.php';

class NewsController
{
    // Выводит новости в зависимости от страницы.
    public function actionPage($page)
    {
        if ($page) {
            $newsList = array();
            $newsList = News::getNewsByPage($page);
            $countPages = News::getCountPageWithNews();
            require_once(ROOT . '\views\news\index.php');
        }
    }

    // Выводи новости с первой страницы. 
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();
        $countPages = News::getCountPageWithNews();
        require_once(ROOT . '\views\news\index.php');

        return true;
    }

    // Выводит страницу новости. 
    public function actionView($id)
    {
        if ($id) {
            $newsItem = News::getNewsItemById($id);
            require_once(ROOT . '\views\news\view.php');
        }
        return true;
    }
}