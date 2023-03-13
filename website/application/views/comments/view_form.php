<div id="form_<?=@$cid;?>" class="form-sub">
    <div class="row">
        <div class="col-md-12">
            <div class="loading"></div>
            <div class="head-com"><span>Trả lời : <?=$user->user_name;?></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<small><a rel="nofollow" id="cancel-comment" href="javascript:void(0)"  class="seoquake-nofollow MSI_ext_nofollow">Hủy</a></small></div>
            <form action="" method="POST" id="rep_commentform">
                <p class="comment-notes"><span id="email-notes">Thư điện tử của bạn sẽ không được hiển thị công khai.</span> Các trường bắt buộc được đánh dấu <span class="required">(*)</span></p>
                <p class="rep-rate"><input id="input-21b" value="4" type="number" class="rating" min=0 max=5 step=1 data-size="lg"></p>
                <div id="comment-name" class="row col-sm-5 col-xs-12 form-group">
                    <input type = "text" class="form-control validate[required]" placeholder = "Họ tên (*)" name = "dname"  id = "dname" >
                </div>
                <div class="col-sm-1"></div>
                <div id="comment-email" class="row form-group col-sm-5 col-xs-12">
                    <input type = "text" class="form-control validate[required,custom[email]]" placeholder = "Thư điện tử (*)" name = "demail"  id = "demail">
                </div>
                <div id="comment-message" class="form-row form-group">
                    <textarea name = "comment" class="form-control validate[required]" placeholder = "Nội dung (*)" id = "dcomment" ></textarea>
                </div>

                <input type="button" class="btn-sm btn-cm" name="dsubmit" onclick="rep_comment()" id="commentSubmit" value="Gửi bình luận">
                <input type="hidden" name="comment_post_ID" value="<?=@$pid;?>" id="comment_post_ID">
                <input type="hidden" name="comment_parent" id="d_comment_parent" value="<?=@$cid;?>">
            </form>

        </div>
    </div>
</div>
<style>
    .rep-rate{padding:5px 0}
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('#cancel-comment').click(function(){
            $('#form_' + <?=@$cid;?>).remove();
            //location.reload();
        });
    });
    function rep_comment(){
        var url = $('#base_url').val();
        var valid = $("#rep_commentform").validationEngine('validate');
        var giatri = $('#input-21b').val();
        if(valid == true)
        {
            $.ajax({
                url : url + 'comment/addComment',
                type: "POST",
                dataType: "json",
                data: {itemId:$('#comment_post_ID').val(),userName:$('#dname').val(),giatri:giatri,
                    email:$('#demail').val(),message:$('#dcomment').val(),reply:$('#d_comment_parent').val()},
                beforeSend: function(){
                    $('.loading').addClass('active');
                },
                success: function(){
                    $('.loading').removeClass('active');
                    alert('Cảm ơn bạn ! Bình luận của bạn đã được gửi đi và đang được kiểm duyệt để phản hồi');
                }
            }).complete(function() {
                document.getElementById("commentform").reset();
                location.reload();
            });
        }
    }
</script>
<link href="<?= base_url('assets/css/star-rating.css') ?>" rel="stylesheet" media="all"/>
<script  src="<?= base_url('assets/js/star-rating.js') ?>" type="text/javascript"></script>
<script  src="<?= base_url('assets/js/pro_detail.js') ?>" type="text/javascript"></script>
