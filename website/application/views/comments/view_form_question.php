<div id="form_<?=@$cid;?>" class="form-sub">
    <div class="row">
        <div class="col-md-12">
            <div class="loading"></div>
            <div class="head-com"><span>Trả lời : <?=$user->user_name;?></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<small><a rel="nofollow" id="cancel-comment" href="javascript:void(0)"  class="seoquake-nofollow MSI_ext_nofollow">Hủy</a></small></div>
            <form action="" method="POST" id="rep_question_form">
                <p class="comment-notes"><span id="email-notes">Thư điện tử của bạn sẽ không được hiển thị công khai.</span> Các trường bắt buộc được đánh dấu <span class="required">*</span></p>
                <div id="comment-name" class="row col-sm-5 col-xs-12 form-group">
                    <input type = "text" class="form-control validate[required]" placeholder = "Họ tên (*)" name = "qname"  id = "qname" >
                </div>
                <div class="col-sm-1"></div>
                <div id="comment-email" class="row form-group col-sm-5 col-xs-12">
                    <input type = "text" class="form-control validate[required,custom[email]]" placeholder = "Thư điện tử (*)" name = "qemail"  id = "qemail">
                </div>
                <div id="comment-message" class="form-row form-group">
                    <textarea name = "qcomment" class="form-control validate[required]" placeholder = "Nội dung (*)" id = "qcomment" ></textarea>
                </div>

                <input type="button" class="btn-sm btn-cm" name="dsubmit" onclick="rep_question()" id="commentSubmit" value="Gửi câu hỏi">
                <input type="hidden" name="question_post_ID" value="<?=@$pid;?>" id="question_post_ID">
                <input type="hidden" name="comment_parent" id="q_comment_parent" value="<?=@$cid;?>">
            </form>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#cancel-comment').click(function(){
            $('#form_' + <?=@$cid;?>).remove();
            //location.reload();
        });
    });
    function rep_question(){
        var url = $('#base_url').val();
        var valid = $("#rep_question_form").validationEngine('validate');
        if(valid == true)
        {
            $.ajax({
                url : url + 'comment/addSubQuestion',
                type: "POST",
                dataType: "json",
                data: {itemId:$('#question_post_ID').val(),userName:$('#qname').val(),
                    email:$('#qemail').val(),message:$('#qcomment').val(),reply:$('#q_comment_parent').val()},
                beforeSend: function(){
                    $('.loading').addClass('active');
                },
                success: function(){
                    $('.loading').removeClass('active');
                    alert('Cảm ơn bạn ! Bình luận của bạn đã được gửi đi và đang được kiểm duyệt để phản hồi');
                }
            }).complete(function() {
                document.getElementById("rep_question_form").reset();
                location.reload();
            });
        }
    }
</script>

<script type="text/javascript">
    /*var url = $('#base_url').val();
     $('#commentSubmit').click(function(){
     alert('ajdgljgl');
     var valid = $("#commentform").validationEngine('validate');
     if(valid == true)
     {
     $.ajax({
     url : url + 'comment/addComment',
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
     });*/
</script>
