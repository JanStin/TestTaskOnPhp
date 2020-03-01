<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <title><?= $newsItem['title']; ?></title>
        <link rel="stylesheet" href="/css/style.css" />
    </head>
    <body>
 	    <header>
        </header>
         
 	    <main>
            <h1><?= $newsItem['title']; ?></h1>
            <div class="all-news">               
                <p><?= $newsItem['content']; ?></p>               
            </div>
            <p><a href="/news.php">Все новости >></a><p>
        </main>

        <footer>
        </footer>
  <body>
</html>