<?php


class Category
{
    public static function getCategoryList()
    {
        $db = Db::getConnection();

        $categorytList = array();

        $i=0;
        foreach($db->query('SELECT * FROM category WHERE status="1" ORDER BY sort_order ASC') as $row) {
            $categorytList[$i]['id'] = $row['id'];
            $categorytList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categorytList;
    }
}