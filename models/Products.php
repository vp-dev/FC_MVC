<?php


class Products
{
    //получить ВСЕ товары
    public static function getProductList()
    {
        $db = Db::getConnection();

        $productList = array();

        $i=0;
        foreach($db->query('SELECT * FROM product WHERE availability="1" ORDER BY price DESC LIMIT 12') as $row) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['category_id'] = $row['category_id'];
            $productList[$i]['code'] = $row['code'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['brand'] = $row['brand'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['is_discount'] = $row['is_discount'];
            $i++;
        }
        return $productList;
    }

    public static function getProductById($id)
    {
        $id = intval($id);

        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM product WHERE id = ' . $id);

        return $result->fetch();
    }

    public static function getProductByCategory($category)
       {
           $category = intval($category);

           $db = Db::getConnection();

           $productList = array();

           $i=0;
           foreach($db->query('SELECT * FROM product WHERE availability="1" and category_id='. $category .' ORDER BY price DESC LIMIT 12') as $row) {
               $productList[$i]['id'] = $row['id'];
               $productList[$i]['name'] = $row['name'];
               $productList[$i]['category_id'] = $row['category_id'];
               $productList[$i]['code'] = $row['code'];
               $productList[$i]['price'] = $row['price'];
               $productList[$i]['brand'] = $row['brand'];
               $productList[$i]['description'] = $row['description'];
               $productList[$i]['image'] = $row['image'];
               $productList[$i]['is_new'] = $row['is_new'];
               $productList[$i]['is_discount'] = $row['is_discount'];
               $i++;
           }
           return $productList;
       }


}