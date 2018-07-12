<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function fpage(&$cpage, $totalNums, $url, $pnum = 20)
    {
        if($totalNums == 0)
        {
            return '';
        }

        $total_page = ceil($totalNums / $pnum);

        if ($cpage < 1)
        {
            $cpage = 1;
        }
        elseif ($cpage > $total_page)
        {
            $cpage = $total_page;
        }

        $page = '<div class="page f_right"><nav aria-label="Page navigation"><ul class="pagination">';

        // 首页
        if ($cpage > 1) {
            $page .= "<li><a href='{$url}.html'>首页</a></li>";
        }

        $pageStyleNum = 3;

        // 输出前N页
        $start_page = $cpage - $pageStyleNum;

        $start_page = ($start_page <= 1) ? 1 : $start_page;

        for ($i = $start_page; $i < $cpage; $i ++) {
            $page .= "<li><a href='{$url}_{$i}.html'>{$i}</a></li>";
        }

        // 输出后N页
        $end_page = $cpage + $pageStyleNum;

        $end_page = ($end_page >= $total_page) ? $total_page : $end_page;

        for ($i = $cpage; $i <= $end_page; $i ++) {
            if ($i == $cpage) {
                $page .= "<li class=\"active\"><a href='javascript:void(0);'>{$i}</a></li>";
            } else {
                $page .= "<li><a href='{$url}_{$i}.html'>{$i}</a></li>";
            }
        }

        // 最后一页
        if ($cpage < $total_page) {
            $page .= "<li><a href=\"{$url}_{$total_page}.html\">尾页</a></li>";
        }

        $page .= '</ul></nav></div><div class="clear"></div>';

        return $page;
    }
}
