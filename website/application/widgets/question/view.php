<div class="row">
    <div class=" danh-gia col-md-12 clearfix" id="view_question">
        <div class="danhgia-5 col-md-5 col-sm-5 col-xs-12 clearfix">
            <span><p>Bạn có câu hỏi với sản phẩm này ?</p></span>

            <button type="button" class="btn-bl" onclick="write_question()" style="margin-bottom: 5px">
                <a   data-scrollTo="#product_comments"
                     style="cursor: pointer; color: #fff" >
                    Đặt câu hỏi</a>
            </button><br/>

        </div><!--end danhgia-3-->
        <!--comment_content-->
    </div>
</div>
<div id="question_write" style="display: none">
    <div class="row">
        <div class="col-sm-12">
            <div class="loading"></div>
            <form action="" method="POST" id="question_form">
                <table class="tbl-post-comment">
                    <tbody>
                    <tr>
                        <td valign="top" style="padding-top:5px;">
                            <img src="<?= base_url().$avata;?>" alt="<?= @$username ?>" style="margin-left: 2em;">
                        </td>
                        <td>
                            <div class="info_comment">
                                <input type="text" class="validate[required]" id = "username" name="username" placeholder="Nhập tên bạn" value="<?= @$username ?>">
                                <input type="text" class="validate[required,custom[email]]"  id = "user_email" name="user_email" placeholder="Nhập email của bạn" value="<?= @$usermail ?>">
                                <input type="hidden" name="avatar" value="0">
                            </div>
                            <p style="font-size:13px; margin:5px 0"><b>Nội dung</b> (Vui lòng viết tiếng Việt có dấu)</p>
                            <textarea name="user_comment" class="form-control validate[required]"  rows="4" value="Nội dung chi tiết" id = "user_comment"></textarea>
                            <div class="clear"></div>

                            <!--<div id="captchaimg">
                                <img  src="<?/*=base_url()*/?>assets/css/img/captcha.jpg"><br>
                            </div>
                            <input type="text" style="width:150px" name="captcha" placeholder="Nhập mã xác nhận"> (<a id="change-image">Xem mã khác</a>)-->
                            <div class="c5"></div>
                            <div class="clearfix-15"></div>
                            <div class="col-sm-4">
                                <input type="button" class="btn-sm btn-cm" onclick="send_questions(<?=@$itemId;?>);" name="dsubmit" id="commentSubmit" value="Gửi">
                                <input type="button" class="btn-sm btn-cm"  value="Hủy" onclick="close_question()" id="btn_sent">
                                <input type="hidden" name="comment_post_ID" value="<?=@$itemId;?>" id="comment_post_ID">
                                <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>

        </div>
    </div>
</div>
