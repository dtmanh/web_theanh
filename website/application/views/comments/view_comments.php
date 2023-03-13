<?/*=@$lists;*/?>
<?php if(count($lists)) : ?>
<ol class="commentlist">
    <?php foreach($lists as $list) : ?>
        <li id="comment-<?=@$list->id;?>" class="clearfix">
            <div class="comment even thread-even depth-1 comment-wrap">
                <div class="comment-avatar"><img src="<?=base_url()?>/img/avata.png" width="85" height="85" alt="" class="avatar avatar-65wp-user-avatar wp-user-avatar-65 alignnone photo avatar-default tie-appear"></div>

                <div class="comment-content">
                    <div class="author-comment">
                        <cite class="fn"><?=@$list->user_name;?></cite><span class="block-rate"><input disabled id="input-21b" value="<?php echo $list->giatri;?>" type="number" class="rating" min=0 max=5 step=1 data-size="lg">  </span>
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
                    <a rel="nofollow" class="comment-reply-link" href="javascript:void(0)" onclick="return addCommentForm(<?=@$list->id?>,<?=@$list->id_sanpham?>)" aria-label="<?=@$list->user_name;?>">Trả lời</a>
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
<style>
    .block-rate .star-rating{display: inline-block}
    .block-rate .glyphicon{display: none}
</style>
<link href="<?= base_url('assets/css/star-rating.css') ?>" rel="stylesheet" media="all"/>
<script  src="<?= base_url('assets/js/star-rating.js') ?>" type="text/javascript"></script>
<script  src="<?= base_url('assets/js/pro_detail.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#input-21f").rating({
            starCaptions: function(val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function(val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });
        $('#rating-input').rating({
            min: 0,
            max: 5,
            step: 1,
            size: 'lg',
            showClear: false
        });

        $('#btn-rating-input').on('click', function() {
            $('#rating-input').rating('refresh', {
                showClear:true,
                disabled:true
            });
        });


        $('.btn-danger').on('click', function() {
            $("#kartik").rating('destroy');
        });

        $('.btn-success').on('click', function() {
            $("#kartik").rating('create');
        });

        $('#input-21b').on('rating.change', function() {
            //alert($('#input-21b').val());
        });


        $('.rb-rating').rating({'showCaption':true, 'stars':'3', 'min':'0', 'max':'3', 'step':'1', 'size':'xs', 'starCaptions': {0:'status:nix', 1:'status:wackelt', 2:'status:geht', 3:'status:laeuft'}});
    });
</script>
<style>
.comment span.label {
    color: #fff !important;
    font-style: italic;
}
.nopadding{padding:0px;}
   #form{padding:15px 0;background-color: #f5f5f5}
   .rating-lg{font-size:25px !important;}
   .tbl-post-comment {
   width: 100%;
   background: #f5f5f5;
   padding: 10px;
   }
   .info_comment input[type="text"] {
   border: solid 1px #bbb !important;
   width: 250px;
   height: 26px;
   padding: 0 5px;
   }
   .btn-bl {
   border: none;
   background: #029900;
   color: #fff;
   line-height: 20px;
   height: 30px;
   width: 145px;
   border-radius: 3px;
   }
   .progress {
   height: 10px !important;
   }
   .count-star{margin-top:-5px}
   .danhgia-2 span{font-size: 12px}
   .danhgia-1 {
   text-align: center;
   margin-top: 10px;
   margin-bottom: 10px;
   }
   .danhgia-1 p {
   font-weight: 600;
   font-size: 16px;
   line-height: 50px;
   }
   .danhgia-1 .number {
   font-size: 60px;
   }
   /***comment***/
   .comment-avatar{
   width: 10%;
   float: left;
    marrgin-right:10px;
   }
   .comment-avatar img{
	   max-width: 100%;border:1px solid #f2f2f2;padding:2px;	  
	      width: 100% !important;
    height: auto; 
	   }
   .comment-content{
   width: 82%;
   float: left;
   }
   .fn {
   color: #365899;
   font-weight: bold;
   }
   .commentmetadata{font-size: 12px}
   .comment-wrap{
      border-bottom: 1px solid #f2f2f2;
    margin-bottom: 7px;
    padding-bottom: 7px;
    float: left;
    width: 100%;
   }
   .children{padding-left:87px}
</style>