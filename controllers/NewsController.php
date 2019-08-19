<?php


class NewsController
{
    public function actionIndex()
    {
        $newsList = News::getNewsList( "https://ria.ru");
        include_once (ROOT . '/views/news/index.php');
    }
}