<?php


class News
{
    public static function getNewsList($url)
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $html = curl_exec($ch);

        curl_close($ch);

        $newPrice = preg_match_all('#<div class="cell-list__item m-no-image">(.+?)<div class="cell-list__item m-no-image">#is', $html, $arr);

        foreach ($arr as $item) {
            foreach ($item as $it) {
                echo $it;
                echo '<br>';
            }
        }
    }
}

