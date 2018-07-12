<?php

function categoryInfo($id)
{
    $id = (int)$id;
    if(!$id) return [];

    return config('category')[$id];
}

function categoryUrlInfo($id)
{
    $id = (int)$id;
    if(!$id) return '';

    $category = categoryInfo($id);

    return '<a href="'.env('APP_URL').'/c/'.$category['id'].'.html">'.$category['name'].'</a>';
}

function articleUrlInfo($aid)
{
    $aid = (int)$aid;
    if(!$aid) return '';

    return env('APP_URL').'/a/'.$aid.'.html';
}

function cutOutString($string, $length, $postfix = '')
{
    $string = trim(strip_tags($string));
    $string = (mb_strlen($string, 'utf-8') <= $length) ? $string : mb_substr($string, 0, $length, 'utf-8');

    return $string . $postfix;
}
