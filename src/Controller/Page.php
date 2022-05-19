<?php

namespace src\Controller;

class Page{
    function firstPage(){
        Page::render(1);
    }

    function endPage(){
        $endPage =  fetch("SELECT max(`idx`)idxs FROM store");
        Page::render(ceil($endPage->idxs/6));
    }

    function move($parms){
        $idx = $parms[1];
        Page::render($idx);
    }

    function render($idx){
        $items = fetchAll("SELECT * FROM store");
        $itemCnt = fetch("SELECT count(*) as `cnt` FROM `store`");
        
        $AllPageCnt = ceil($itemCnt->cnt/6);
        $pageCnt = ceil(count($items)/6);
        $copyIdx = $idx;
        // $page
        if($copyIdx % 10 == 0){
            $copyIdx = ceil($copyIdx/10) * 10 + 1;
        }else if($copyIdx%10 == 1){
            $copyIdx = ceil($copyIdx/10) * 10 - 10;
        }
        $pageIng = $copyIdx < 10 ? 10 : ceil($copyIdx/10) * 10;

        
        $itemStart = $idx * 6 -6;
        $itemEnd = $idx * 6 ;

        $pageItem = fetchAll("SELECT * FROM `store` WHERE `idx` <= ? and `idx` > ? ", [$itemEnd, $itemStart]);
        view("store", ['pageItem'=>$pageItem, 'page' => $idx, "pageingCnt" => $copyIdx,'pagesCnt' => $pageCnt, 'cnt' => $itemCnt->cnt, 'AllPageCnt' => $AllPageCnt, "pageIng" => $pageIng]);
        
    }
}