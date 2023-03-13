<?/*=@$lists;*/?>
<?php if(count($lists)) : ?>
    <ol class="commentlist">
        <?php foreach($lists as $list) : ?>
            <li id="comment-<?=@$list->id;?>" class="clearfix">
                <div class="comment even thread-even depth-1 comment-wrap">
                    <div class="comment-avatar"><img src="<?=base_url()?>/img/avata.png" width="85" height="85" alt="" class="avatar avatar-65wp-user-avatar wp-user-avatar-65 alignnone photo avatar-default tie-appear"></div>

                    <div class="comment-content">
                        <div class="author-comment">
                            <cite class="fn"><?=@$list->user_name;?></cite>
                            <div class="comment-meta commentmetadata">
                                <?=date('M d,Y',@$list->time);?>
                            </div><!-- .comment-meta .commentmetadata -->
                            <div class="clear"></div>
                        </div>
                        <p>
                            <?=@$list->comment;?>
                        </p>
                    </div>
                    <div id="rep-quest-<?=@$list->id?>" class="reply">
                        <a rel="nofollow" class="comment-reply-link" href="javascript:void(0)" onclick="return addQuestionForm(<?=@$list->id?>,<?=@$list->id_sanpham?>)" aria-label="<?=@$list->user_name;?>">Trả lời</a>
                    </div><!-- .reply -->
                </div>
                <?php echo buildArrayQuestion(@$subs,$list->id);?>
            </li>
        <?php endforeach;?>
    </ol>
<?php endif;?>
<div class="col-xs-12 text-center">
    <?=@$phantrang;?>
</div>