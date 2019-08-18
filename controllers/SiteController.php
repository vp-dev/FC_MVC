<?php



class SiteController
{

    public function actionIndex()
    {
        $categories = Category::getCategoryList();
        $productList = Products::getProductList();

        include_once (ROOT . '/views/site/index.php');
    }

    public function actionDetail($id)
    {
        $categories = Category::getCategoryList();
        $product = Products::getProductById($id);

        include_once (ROOT . '/views/site/detail.php');
    }

}