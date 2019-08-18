<?php

class CatalogController
{
    public function actionIndex($category)
    {

        $categories = Category::getCategoryList();
        $productList = Products::getProductByCategory($category);

        include_once (ROOT . '/views/site/index.php');
    }

}