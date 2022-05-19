<!-- <div class="modal_wrap">
    <div class="modal">
        <form action="/store/insert" method="post" name="insert_form">
            <div class="top_menu">
                <h2 class="title">주변정보 관리</h2>
                <div class="exit">X</div>
            </div>
            <div class="flex item">
                <p class="sub_title">상호명</p>
                <input type="text" name="name" >
            </div>

        </form>
    </div>
</div> -->
<section>
    <div class="container">
        <div class="top_info flex">
            <h2>주변정보 - 관공서</h2>
            <p>아파트 주변정보를 확인하세요.</p>
        </div>
        <div class="flex pageInfo">
            <div class="flex">
                <h2>총 <?=$cnt?>건</h2>
                <h2><?=$page?>p/</h2>
                <h2><?=$AllPageCnt?>p</h2>
            </div>
            <div class="addBtn">
                <div class="btn flex">등록</div>
            </div>
        </div>
        <div class="contetns grid">
            <?php foreach($pageItem as $item): ?>
            <div class="item">
                <div class="flex content">
                    <div class="right">
                        <div><?=$item->type?></div>

                    </div>

                    <div>
                        <div class="top_item flex">
                            <h2><?=$item->name?></h2>
                            <div><?=$item->address?></div>
                        </div>
                        <div><?=$item->rm?></div>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="pageN flex">
            <div class="item"><a href="/store/prev"><<</a></div> 

            <?php for($i = 10 * ($pageIng/10) - 9; $i <= $pageIng ; $i++):?> 
                <?php if($AllPageCnt >= $i): ?>
                    <div class="item"><a href="/store/<?=$i?>"><?=$i?></a></div>
                <?php endif;?>
            <?php endfor;?>
            
            <div class="item"><a href="/store/next">>></a></div>
        </div>
    </div>
</section>