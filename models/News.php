<?php

class News
{   
    
    // Получение одной статьи по id.
    public static function getNewsItemById($id)
    {
        $id = intval($id);
        if ($id) {
            $connect = Connect::getConnection();

            $result = $connect->query("SELECT * FROM news WHERE id='$id'");
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }

    // Получение кол-ва страниц с новостями.
    public static function getCountPageWithNews()
    {

        $connect = Connect::getConnection();

        $result = $connect->query("SELECT COUNT(*) FROM news");
        $result->setFetchMode(PDO::FETCH_NUM);
        $countNews = $result->fetch();
        
       
        $countNewsOnPage = (int) $countNews[0];
        $countNewsOnPage = ceil($countNewsOnPage / 5);

        return $countNewsOnPage;
    }

    // Получение первых пяти новостей при uri - news.php.
    public static function getNewsList()
    {
        $newsList = array();

        $connect = Connect::getConnection();

        $result = $connect->query(
            'SELECT id, idate, title, announce '
            . 'FROM news '
            . 'ORDER BY idate DESC '
            . 'LIMIT 5'
        );

        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['idate'] = $row['idate'];
            $newsList[$i]['title'] = $row['title'];            
            $newsList[$i]['announce'] = $row['announce'];
            $i++;
        }

        
        return $newsList;
    }

    // Получение пяти новостей при uri - news.php?page=n.
    public static function getNewsByPage($page)
    {
        $newsList = array();
        $page = $page * 5 - 5;

        $connect = Connect::getConnection();
        
        $result = $connect->query(
            'SELECT id, idate, title, announce '
            . 'FROM news '
            . 'ORDER BY idate DESC '
            . 'LIMIT ' . $page . ', 5' 
        );
        
        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['idate'] = $row['idate'];
            $newsList[$i]['title'] = $row['title'];            
            $newsList[$i]['announce'] = $row['announce'];
            $i++;
        }

        
        return $newsList;
    }
}