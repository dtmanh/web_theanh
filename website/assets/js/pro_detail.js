function send_comment(sender){
    var comment=$('#'+sender.attr('data-content')).val();
    var id_reply= sender.attr('data-reply');
    $('#loading2').show();
    $('#product_comments').empty();
    $(sender).attr('disabled','disabled');
    var baseurl=$('#baseurl').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: baseurl + 'products/send_comment',
        data: {id_pro:sender.attr('data-items'),comment:comment,id_reply:id_reply},
        success: function (result) {
            setInterval(show_comment('#btn_sent'), 2000);
        }
    })
}

function send_reply(sender){
    var comment=$('#'+sender.attr('data-content')).val();
    var id_reply= sender.attr('data-reply');
    $('#loading2').show();
    $('#product_comments').empty();
    $(sender).attr('disabled','disabled');
    var baseurl=$('#baseurl').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: baseurl + 'products/send_comment',
        data: {id_pro:sender.attr('data-items'),comment:comment,id_reply:id_reply},
        success: function (result) {
            setInterval(show_comment('#btn_sent'), 2000);
        }
    })
}
/**send comment***/
function send_comment_binhluan(id){
    var comment = $("#comment").val();
    var giatri = $('#input-21b').val();
    var name_users = $("#name").val();
    var email_users = $("#email").val();
    var baseurl=$('#base_url').val();
    var check_form = $('#commentform').validationEngine('validate');
    if(check_form == true){
        $.ajax({
            type: "POST",
            url: baseurl +"comment/Add_comment_binhluan",
            data: "comment=" + comment + "&name_users=" + name_users + "&email_users=" + email_users +  "&giatri=" + giatri+  "&id=" + id,
            success: function (ketqua) {
                $("#hienthidanhgia").show();
                $("#vietbinhluan").hide();
                document.getElementById('comment').value = '';
                document.getElementById('input-21b').value = 0;
                var t='<div class="alert alert-success alert-dismissible alert-ml" role="alert"\
                    style="position: absolute;right: 40px;top:0px;width:250px; padding: 15px 5px; ">\
                        Bạn đã gửi bình luận thành công !\
                    </div>';
                $('#show_success_mss').html(t);
                $('#show_success_mss').show();
                setTimeout(function(){
                    $('#show_success_mss').empty();
                }, 5000)
            }
        });
    }
}
/***send question***/
function send_questions(id){
    var comment = $("#user_comment").val();
    var name_users = $("#username").val();
    var email_users = $("#user_email").val();
    var baseurl=$('#base_url').val();
    var check_form = $('#question_form').validationEngine('validate');
    if(check_form == true){
        $.ajax({
            type: "POST",
            url: baseurl +"comment/addQuestion",
            data: "comment=" + comment + "&name_users=" + name_users + "&email_users=" + email_users +  "&id=" + id,
            success: function (ketqua) {
                $("#view_question").show();
                $("#question_write").hide();
                document.getElementById('comment').value = '';
				var t='<div class="alert alert-success alert-dismissible alert-ml" role="alert"\
                    style="position: absolute;right: 40px;top:0px;width:250px; padding: 15px 5px; ">\
                        Bạn đã gửi câu hỏi của sản phẩm thành công !\
                    </div>';
                $('#show_success_mss').html(t);
                $('#show_success_mss').show();
                setTimeout(function(){
                    $('#show_success_mss').empty();
                }, 5000)
            }
        });
    }
}

function show_reply(divid){
    $('#'+divid).show();
    $('#'+divid+' textarea').focus();
}

function blur_comments(divid,sender){
    if(sender.val()==''){
        $('#'+divid).hide();
    }else{
        return false;
    }
}
function check_login(){
    $('#btn_sent').click();
}


function messs () {
    setTimeout(show_mss, 2000)
}
function show_mss() {

}


$(document).ready(function(){
    $("#hienthidanhgia").show();
    $("#vietbinhluan").hide();
    //shownhaplo();

});
function cho_bl(){
    $("#hienthidanhgia").hide();
    $("#vietbinhluan").show();
}
function bo_binhluan(){
    $("#hienthidanhgia").show();
    $("#vietbinhluan").hide();
}
function write_question(){
    $("#view_question").hide();
    $("#question_write").show();
}
function close_question(){
    $("#view_question").show();
    $("#question_write").hide();
}
/***load comment***/
function loadComment(page,numberpage){
    var baseurl=$('#base_url').val();
    $.ajax({
        url : baseurl + 'comment/getComment_ajax',
        type: "POST",
        dataType: "html",
        data: {itemId:$('#block-comments').attr('data-box-id'),page:page,number_per_page:numberpage},
        success: function(res){
            $('#block-comments').html(res);
        }
    })
}
/***load question***/
function loadQuestions(page,numberpage){
    var baseurl=$('#base_url').val();
    $.ajax({
        url : baseurl + 'comment/getQuestions',
        type: "POST",
        dataType: "html",
        data: {itemId:$('#block-question').attr('data-box-id'),page:page,number_per_page:numberpage},
        success: function(res){
            $('#block-question').html(res);
        }
    })
}
//add comment form
function addCommentForm(cid,pid)
{
    var baseurl = $('#base_url').val();
    $('.form-sub').remove();
    $.ajax({
        url : baseurl + 'comment/getForm',
        type: "POST",
        dataType: "html",
        data: {cid:cid,pid:pid},
        success: function(res){
            //$('#reply-' + userId).empty();
            $('#reply-' + cid).after(res);
        }
    });
}
//add question form
function addQuestionForm(cid,pid)
{
    var baseurl = $('#base_url').val();
    $('.form-sub').remove();
    $.ajax({
        url : baseurl + 'comment/getFormQuestion',
        type: "POST",
        dataType: "html",
        data: {cid:cid,pid:pid},
        success: function(res){
            //$('#reply-' + userId).empty();
            $('#rep-quest-' + cid).after(res);
        }
    });
}

