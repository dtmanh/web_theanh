<?/*=@$lists;*/?>
<?php if(count($lists)) : ?>
<ol class="commentlist">
    <?php foreach($lists as $list) : ?>
        <li id="comment-<?=@$list->id;?>">
            <div class="comment even thread-even depth-1 comment-wrap">
                <div class="comment-avatar"><img src="http://2.gravatar.com/avatar/ef8f866a47b2714e4aac0c2a546ed3cc?s=65&amp;d=mm&amp;r=g" width="65" height="65" alt="" class="avatar avatar-65wp-user-avatar wp-user-avatar-65 alignnone photo avatar-default tie-appear"></div>

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
                <div id="reply-<?=@$list->id?>" class="reply">
                    <a rel="nofollow" class="comment-reply-link seoquake-nofollow MSI_ext_nofollow" href="javascript:void(0)" onclick="return addCommentForm(<?=@$list->id?>,<?=@$list->id_sanpham?>)" aria-label="<?=@$list->user_name;?>">Trả lời</a>
                </div><!-- .reply -->
            </div>
            <?php echo buildArray(@$subs,$list->id);?>
        </li>
    <?php endforeach;?>
</ol>
<?php endif;?>
<div class="col-xs-12 text-center">
    <?=@$phantrang;?>
</div>