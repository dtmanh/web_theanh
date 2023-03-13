<!-- box dang chu y -->
<li class="knswli need-get-value-facebook clearfix verticalThumb item-news-cate done-get-type done-get-sticker">
    <?php if (count($news)) {
  $i=0;  foreach ($news as $key => $new) { $i++; ?>
    <div class="knswli-left fl">
        <a href="<?= base_url('new/'.$new->alias.'.html')?>"
           style="background-image: url('<?= base_url($new->image)?>')"
           class="kscliw-ava" rel="newstype"
           title="<?= ($new->title); ?>"
           newsid="<?= ($new->id); ?>" newstype="0"></a>


    </div>
    <?php if($i==1){ break; }  }  } ?>
    <div class="knswli-right">
        <?php if (count($news)) {
        $i=0;  foreach ($news as $key => $new) { $i++; ?>
        <h3 class="knswli-title"><a
                    href="<?= base_url('new/'.$new->alias.'.html')?>"
                    title="<?= ($new->title); ?>"
                    class="event-name-title" newsid="<?=$new->id; ?>"><?=@$new->title;?></a></h3>
        <div class="knswli-meta">

            <a href="<?= base_url('danh-muc-tin/'.$new->category_alias.'.html') ?>" class="knswli-category"><?= ($new->category_name); ?></a> &nbsp;- <i
                    class="knswli-time" title="<?=date("d/m/Y",$new->time);?>"
                    data-second="<?=date("d/m/Y",$new->time);?>"><?=date("d/m/Y",$new->time);?></i>
        </div>

        <span class="knswli-sapo sapo-need-trim"><?= LimitString($new->description, 200, '...'); ?></span>
                <?php if($i==1){ break; }  }   ?>
        <div class="knswli-readmore">
            <span class="readmore-label">Đọc thêm</span>
            <ul class="readmore-list-news">
                <?php
                $i=0;  foreach ($news as $key => $new) { $i++; ?>
                        <?php if($i>=2){?>
                <li class="readmore-news">
                    <a href="<?= base_url('new/'.$new->alias.'.html')?>"
                       title="<?= ($new->title); ?>"
                       newsid="<?=@$new->id;?>" class="readmore-news-link"><?= ($new->title); ?><i class="knswli-time"
                                                   title="<?=date("d/m/Y",$new->time);?>"
                                                   data-second="<?=date("d/m/Y",$new->time);?>"><?=date("d/m/Y",$new->time);?></i>
                    </a>


                </li>
                    <?php  }  }  ?>
            </ul>
        </div>
        <?php  }   ?>
    </div>

</li>
