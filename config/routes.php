<?php 
return array(
    'view/([0-9]+)' => 'news/view/$1', 
    'news/([0-9]+)' => 'news/page/$1', 
    'news' => 'news/index', // actionIndex in NewsController
);