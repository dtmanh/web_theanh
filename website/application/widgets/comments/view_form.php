<div id="form">
    <div class="row">
        <div class="col-md-12">
            <div class="loading"></div>
            <div class="head-com"><span>Trả lời : <?=$user->user_name;?></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<small><a rel="nofollow" id="cancel-comment" href="javascript:void(0)"  class="seoquake-nofollow MSI_ext_nofollow">Hủy</a></small></div>
            <form action="" method="POST" id="commentform">
                <p class="comment-notes"><span id="email-notes">Thư điện tử của bạn sẽ không được hiển thị công khai.</span> Các trường bắt buộc được đánh dấu <span class="required">*</span></p>
                <div id="comment-name" class="row col-sm-5 col-xs-12 form-group">
                    <input type = "text" class="form-control validate[required]" placeholder = "Họ tên (*)" name = "dname"  id = "name" >
                </div>
                <div class="col-sm-1"></div>
                <div id="comment-email" class="row form-group col-sm-5 col-xs-12">
                    <input type = "text" class="form-control validate[required,custom[email]]" placeholder = "Thư điện tử (*)" name = "demail"  id = "email">
                </div>
                <div id="comment-message" class="form-row form-group">
                    <textarea name = "comment" class="form-control validate[required]" placeholder = "Nội dung (*)" id = "comment" ></textarea>
                </div>

                <input type="button" class="btn-sm btn-cm" name="dsubmit" id="commentSubmit" value="Gửi bình luận">
                <input type="hidden" name="comment_post_ID" value="<?=@$itemId;?>" id="comment_post_ID">
                <input type="hidden" name="comment_parent" id="comment_parent" value="<?=@$userId;?>">
            </form>

        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        jQuery.noConflict();
        $('#commentSubmit').click(function(){
            var valid = jQuery("#commentform").validationEngine('validate');
            if(valid == true)
            {
                $.ajax({
                    url : base_url() + 'comment/addComment',
                    type: "POST",
                    dataType: "json",
                    data: {itemId:$('#comment_post_ID').val(),userName:$('#name').val(),
                        email:$('#email').val(),message:$('#comment').val(),reply:$('#comment_parent').val()},
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
        });
        $('#cancel-comment').click(function(){
            $('#form').remove();
            location.reload();
        });
    });
</script>
<!--<link href="<?/*=base_url()*/?>assets/plugin/ValidationEngine/css/validationEngine.jquery.css" rel="stylesheet"/>
<script type="text/javascript" src="<?/*=base_url()*/?>assets/plugin/ValidationEngine/js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?/*=base_url()*/?>assets/plugin/ValidationEngine/js/jquery.validationEngine-vi.js"></script>-->

