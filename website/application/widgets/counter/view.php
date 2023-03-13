<div class="clearfix clearfix-30"></div>
<div class="danhmuc5">
    <div class="sidebar"> 
        <div class="block_title">
           <h2 class="title_sidebar">THỐNG KÊ TRUY CẬP</h2>
        </div>
        <div class="box_sp_news">
            <div class="text_connect">
                <div><span><img src="<?=base_url('assets/css/img/icon_count_1.png')?>" alt=""> đang online: <?=@online();?></span></div>
                <div><span><img src="<?=base_url('assets/css/img/icon_count_2.png')?>" alt=""> Hôm qua: </span><span class="number_count"><?php if(@$this->yesterday){ echo @$this->yesterday->today; }else{echo '0'; }  ?></span></div>
                <div><span><img src="<?=base_url('assets/css/img/icon_count_4.png')?>" alt=""> Tổng lượt truy cập: </span><span class="number_count"><?php if(@$this->total_view){ echo @$this->total_view->today; }else{echo '0'; } ?></span></div>
            </div>
        </div>
    </div>
</div>