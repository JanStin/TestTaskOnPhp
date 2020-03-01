<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <title>Новости</title>
        <link rel="stylesheet" href="/css/style.css" />
    </head>
    <body>
 	    <header>
 	    </header>
 	    <main>
            <h1>Новости</h1>

            <div class="all-news">
                <?php foreach ($newsList as $newsItem) :?>
                    <div class="news">
                        <div class="headline">
                            <div class="data"><?php echo date("d.m.Y", $newsItem['idate']); ?></div>                
                            <a href="/view.php?id=<?= $newsItem['id']; ?>"><?= $newsItem['title']; ?></a>
                        </div>
                        <p><?= $newsItem['announce']; ?></p>
                    </div>
                <?php endforeach;?>
            </div>

            
            <h4>Страницы:</h4>
            <div сlass="list-page">
            <?php
            $i = 1;
            do {
                if (isset($page) && $page == $i)
                {
                    echo '<a class="page page-active" href="/news.php?page=' . $i . '">' . $i . '</a>';
                } elseif ($i == 1 && !isset($page)) {
                    echo '<a class="page page-active" href="/news.php?page=' . $i . '">' . $i . '</a>';
                } else {
                    echo '<a class="page" href="/news.php?page=' . $i . '">' . $i . '</a>';
                }
                $countPages--;
                $i++;
            } while ($countPages > 0);
            ?>
            </div>
        </main>
        <footer>
        </footer>
  <body>
</html>