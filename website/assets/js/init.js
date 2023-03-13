function base_url(){
    return $('#base_url').val();
}
function number_format(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
function registerModal(){
    $('#loginModal').remove();
    $.ajax({
        url:base_url() + 'modal/register',
        dataType:"html",
        type:"POST",
        data:{status:1},
        success:function(res){
            $('body').append(res);
            $("#myModal").modal();
        }
    });
}
function refresh_capcha(){
    $.ajax({
        url:base_url() + 'modal/capchar_refresh',
        dataType:"html",
        type:"POST",
        data:{status:1},
        success:function(res){
            $('#id_capcha').html(res);
        }
    });
}

function loginModal(){
    $('.modal').remove();
    $.ajax({
        url:base_url() + 'modal/login',
        dataType:"html",
        type:"POST",
        data:{status:1},
        success:function(res){
            $('body').append(res);
            $("#loginModal").modal();
        }
    });
}
// dang nhap
function login() {
    var valid = jQuery("#loginform").validationEngine('validate');
    jQuery('#loginform').validationEngine({ focusFirstField: true });
    if(valid){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_url() + 'dang-nhap',
            data: {email: $('#login-username').val(), pass: $('#login-password').val()},
            success: function (result) {
                if (result.check == true) {

                    //window.location=base_url() + 'list-tour';
                    window.location= window.location.href;
                }
                if (result.check == false) {
                    $('#login-alert').html(result.mss_success);
                    $('#login-alert').show();
                }
            }
        });
    }
}
// quen met khau
function getModalForgotPass()
{
    $('.modal').remove();
    $.ajax({
        url:base_url() + 'modal/forgotPass',
        dataType:"html",
        type:"POST",
        data:{status:1},
        success:function(res){
            $('body').append(res);
            $("#password").modal();
        }
    });
}
// kiem tra email xem co ton tai khong khi quen mat khau
function check_mail(){
	if($('#frmNewsLetter').validationEngine('validate')){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url() + 'users_frontend/check_email',
			data: {email:$('#email').val()},
			success: function (result) {
				if(result.check==false){
					$('#alert_mesage').html(result.mss);
                    $('#alert_mesage').show();
				}else if(result.check==true){
					$('#frmNewsLetter').submit();
				}
			}
		});
	}
}

// dat mua them sp vao don hang
function addToCart(){
    var qty = $('#quantity').val();
    var id = $('#id').val();
    // var color = "";
    // var size = "";
    var color = $('#color').val();
    var size = $('#size').val();
//alert(size);
    if($(".detail_color > li").hasClass("select_product") == true){
        color = $(".detail_color > .active").data("id");

        if(color=="undefined" || color==null){alert("Bạn chưa chọn màu sắc");return false}
    }



    if($(".detail_size > li").hasClass("select_product") == true){
        size = $(".detail_size > .active").data("id");
        if(size=="undefined" || size==null){alert("Bạn chưa chọn kích thước");return false}
    }



    $.ajax({
        url:base_url() + 'cart/addCartItemSelect',
        type:"POST",
        dataType:"html",
        data:{id:id,qty:qty,color:color,size:size},
        beforeSend:function(){
            $("#myModal").remove();
            
            $('body').append('<div id="ajax_loader" class="ajax-load-qa">&nbsp;</div>');
             
        },
        success:function(res){
              
                    window.location=base_url() + 'gio-hang';
           // window.location= window.location.href;
          //  $("#myModal").modal();
        },
        complete: function() {
            $('#ajax_loader').remove();
        }
    });
}

// dat mua them sp vao don hang ngoai trang chu
function add_To_Cart(id){
    var qty = $('#txtQty').val();
    $.ajax({
        url:base_url() + 'cart/addCartItemSelect',
        type:"POST",
        dataType:"html",
        data:{id:id,qty:qty},
        beforeSend:function(){
            $("#myModal").remove();
            $('body').append('<div id="ajax_loader" class="ajax-load-qa">&nbsp;</div>');
        },
        success:function(res){
            viewCart();
            $('body').append(res);
            $("#myModal").modal();
        },
        complete: function() {
            $('#ajax_loader').remove();
        }
    });
}
// check kiem tra ma giam gia cho don hang
function checkCoupon(){
	var couponcode = jQuery('#coupon_code').val();
	var sub_total = parseInt(jQuery('#sub_total').val());
	var shipping = parseInt(jQuery('#shipping').val());
	if(couponcode!==''){
		jQuery.ajax({
			url: base_url() + 'cart/checkCoupon',
			dataType:"json",
			type:"POST",
			data:{code:couponcode,shipping:shipping},
			success : function(res){
				if(res.check==false){
					alert('Mã không chính xác ! Vui lòng thử lại.');
				}else{
					jQuery('#value_coupone').val(res.coupon_price);
					jQuery('#sub_total').val(res.total_cart);
					jQuery('#thongbao').html('<div class="discount text-danger">Đơn hàng của bạn được giảm '+res.coupon_price+'%</div>');
					jQuery('#total_cart').html(number_format(res.total_cart) + 'đ');
				}
			}
		});
	}else{
		alert('Mã bạn chưa nhập ! Vui lòng thử lại.');
	}
}
// cap nhat gia tien khi chon shipping khu vuc
function update_shipping(val){
	var couponcode = parseInt(jQuery('#value_coupone').val());
	var shipping = parseInt(jQuery('#shipping').val());
	var total_price = parseInt(jQuery('#total_price').val());
	jQuery.ajax({
			url: base_url() + 'cart/update_shipping',
			dataType:"json",
			type:"POST",
			data:{couponcode:couponcode,shipping:shipping},
			success : function(res){
			jQuery('#price_shipping').val(res.price_shipping);
			jQuery('#sub_total').val(res.total_cart);
			jQuery('#ship_price').html(number_format(res.price_shipping) + 'đ');
			jQuery('#total_cart').html(number_format(res.total_cart) + 'đ');
			}
	});
}
//giỏ hàng tăng
function upcart(obj){
    var rowid = $(obj).data('bind');
    var qtl = document.getElementById("qty-"+rowid).value;
    var newVal = parseFloat(qtl) + 1;
    var couponcode = jQuery('#value_coupone').val();
    var shipping = parseInt(jQuery('#shipping').val());
    $('#qty-'+rowid).val(newVal);
    updateCart(rowid,newVal,couponcode,shipping);
   // displayCart(rowid,newVal);
}
//giỏ hàng giảm
function downcart(obj){
    var rowid = $(obj).data('bind');
    var qtl = $('#qty-'+rowid).val();
    var couponcode = jQuery('#value_coupone').val();
    var shipping = parseInt(jQuery('#shipping').val());
    if(qtl <= 1){
        return false;
    }else{
        var newVal = parseFloat(qtl) - 1;
        $('#qty-'+rowid).val(newVal);
        updateCart(rowid,newVal,couponcode,shipping);
       // displayCart(rowid,newVal);
    }
}
// tang so luong sp trong shipping
function upQuantity(obj){
    var rowid = $(obj).data('bind');
    var qtl = document.getElementById("qty-"+rowid).value;
    var newVal = parseFloat(qtl) + 1;
	var couponcode = jQuery('#value_coupone').val();
	var shipping = parseInt(jQuery('#shipping').val());
    $('#qty-'+rowid).val(newVal);
    updateCart(rowid,newVal,couponcode,shipping);
   // displayCart(rowid,newVal);
}
// cap nhat gio hang khi tang so luong sp
function updateCart(rowid,qty,couponcode,shipping){
    $.ajax({
        url: base_url() + 'cart/updateQuantity',
        type:"POST",
        dataType:"html",
        data:{qty:qty,rowid:rowid,couponcode:couponcode,shipping:shipping},
        beforeSend:function(){
            $('body').append('<div id="ajax_loader" class="ajax-load-qa">&nbsp;</div>');
        },
        success:function(res){
          //  viewCart();
            $("#cart-content").html(res);
        },
        complete: function() {
            $('#ajax_loader').remove();
        }
    });
}
// giảm so luong sp trong don hang
function downQuantiy(obj){
    var rowid = $(obj).data('bind');
    var qtl = $('#qty-'+rowid).val();
	var couponcode = jQuery('#value_coupone').val();
	var shipping = parseInt(jQuery('#shipping').val());
    if(qtl <= 1){
        return false;
    }else{
        var newVal = parseFloat(qtl) - 1;
        $('#qty-'+rowid).val(newVal);
		updateCart(rowid,newVal,couponcode,shipping);
       // displayCart(rowid,newVal);
    }
}
// hiện thị lại đon hang o shipping khi cap nhat tang giam so luong sp
// function displayCart(rowid,qty){
    // $.ajax({
        // url: base_url() + 'cart/displayCart',
        // type:"POST",
        // dataType:"html",
        // data:{qty:qty,rowid:rowid},
        // success:function(res){
          // //  $("#head-cart-box").html(res);
        // }
    // });
// }
//load binh luan
function loadComment(page,numberpage){
	var baseurl=$('#base_url').val();
    $.ajax({
		url:baseurl + 'comment/getComment_ajax',
        type: "POST",
        dataType: "html",
        data: {itemId:$('#block-comments').attr('data-box-id'),page:page,number_per_page:numberpage},
        success: function(res){
            $('#block-comments').html(res);

        }

    })

}













jQuery( window ).load(function() {
    caculate_init();
});
function caculate_init(){
    $('.title_main_1 > h2 >a').each(function(){
        ah = $(this).height();
        if(ah > 20){
            $(this).parent().addClass('tit-center');
        }
    });
}
function qtl_up(){
    var qtl = document.getElementById("txtQty").value;
    var newVal = parseFloat(qtl) + 1;
    $('#txtQty').val(newVal);
    $('#txtqty').val(newVal);
}
function qtl_dow(){
    var qtl = $('#txtQty').val();
    if(qtl <= 1){
        return false;
    }else{
        var newVal = parseFloat(qtl) - 1;
        $('#txtQty').val(newVal);
        $('#txtqty').val(newVal);
    }
}
function login2() {

    var valid = jQuery("#loginform").validationEngine('validate');
    jQuery('#loginform').validationEngine({ focusFirstField: true });
    if(valid){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_url() + 'dang-nhap',
            data: {email: $('#login-username').val(), pass: $('#login-password').val()},
            success: function (result) {
                if (result.check == true) {
                    location.reload();
                }
                if (result.check == false) {
                    $('#login-alert').html(result.mess);
					$('#login-alert').css( "display",'block' ) ;
					setTimeout(function(){
						$('#login-alert').hide();
					}, 5000);
					return false;
                }
            }
        });
    }
}

function changePassModal(){
    $('.modal').remove();
    $.ajax({
        url:base_url() + 'modal/changePass',
        dataType:"html",
        type:"POST",
        data:{status:1},
        success:function(res){
            $('body').append(res);
            $("#myModal").modal();
        }
    });
}



$(document.body).on('click',function(){
    jQuery('.autosearch').hide();;
});

$('#coupon_Code').on("click",function(){

});

function huyCode(){
    var code = '';
    $.ajax({
        type: "POST",
        url: base_url() + 'cart/checkCode',
        dataType: "json",
        data:{code:code},
        success:function(res){
            if(res.check==false){
				$('#coupon_Code').val('');
				$('#huy_code').hide();
                $('#check_code').show();
                $('.price-code').html(res.price_code);
                $('#price-code').val(res.price_code);
                $('#code_sale').val(code);
                $('#total_cart').html(res.total);
                $('#value_total_cart').val(res.total);
            }else{

            }
        }
    });
}


function viewCart(){
    $.ajax({
        url: base_url() + 'cart/displayCart',
        type:"POST",
        dataType:"html",
        data:{id:1},
        success:function(res){
            $("#head-cart-box").html(res);
        }
    });
}



function updateCartP(rowid,qty){
    $.ajax({
        url: base_url() + 'cart/updateQuantityP',
        type:"POST",
        dataType:"html",
        data:{qty:qty,rowid:rowid},
        beforeSend:function(){
            $('body').append('<div id="ajax_loader" class="ajax-load-qa">&nbsp;</div>');
        },
        success:function(res){
            viewCart();
            $("#cart-content").html(res);
        },
        complete: function() {
            $('#ajax_loader').remove();
        }
    });
}
function upQuantityP(obj){
    var rowid = $(obj).data('bind');
    var qtl = document.getElementById("qty-"+rowid).value;
    var newVal = parseFloat(qtl) + 1;
    $('#qty-'+rowid).val(newVal);
    updateCartP(rowid,newVal);
   // viewCart();
}

function downQuantiyP(obj){
    var rowid = $(obj).data('bind');
    var qtl = $('#qty-'+rowid).val();
    if(qtl <= 1){
        return false;
    }else{
        var newVal = parseFloat(qtl) - 1;
        $('#qty-'+rowid).val(newVal);
        updateCartP(rowid,newVal);
     //   viewCart();
    }
}
function auto_complete(obj){
    $('.autosearch').remove();
    var name = $(obj).val();
    $.ajax({
        type: "POST",
        dataType: "html",
        url: base_url() +"get-data-search",
        data: {name:name},
        success: function (result){
            $('.search_query').after(result);
            $('.autosearch').dropdown('toggle');
        }
    })
}
/*$(function(){
    $('.search-input').on("click input",function(e){
        e.preventDefault();
        $('.autosearch').remove();
        var name = jQuery(this).val();
        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: base_url() +"get-data-search",
            data: {name:name},
            success: function (result){
                jQuery('.search_query').after(result);
                jQuery('.search_query').dropdown();
            }
        })
    });

});*/
// yeu thich
function favorite(pro_id,user_id){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'users_frontend/addWishList',
        data:{pro_id:pro_id, user_id:user_id},
        success:function(res){
              window.location= window.location.href;
        }
    });
}

function delete_luutin(pro_id){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'users_frontend/deleteWishList',
        data:{pro_id:pro_id},
        success:function(res){
              window.location= window.location.href;
        }
    });
}

if (window.innerWidth > 768) {
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 100) {
            $('.sticky-headerz').addClass('fixedz');
        } else {
            $('.sticky-headerz').removeClass('fixedz');
        }
    });
}
if (window.innerWidth > 320) {
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 100) {
            $('.sticky-headerz').addClass('clearfixz');
        } else {
            $('.sticky-headerz').removeClass('clearfixz');
        }
    });
}
if (window.innerWidth < 667) {
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 100) {
            $('.label-search').addClass('none');
        } else {
            $('.label-search').removeClass('none');
        }
    });
}
$(function(){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        $(this).attr("href").replace("#","");
        var param = $(this).data('value');
        var concept = $(this).text();
        $('.search-panel #search_concept').html(concept);
        $('.input-group #cate_id').val(param);
    });
});
$(function(){
    $('.m-search').click(function(){
        $('.label-search').toggleClass('show');
    });
});

function buynow(id){
   var qty = 1;
    $.ajax({
        url:base_url() + 'cart/buy_now',
        type:"POST",
        dataType:"html",
        data:{id:id,qty:qty},
        beforeSend:function(){
            $("#myModal").remove();
            $('body').append('<div id="ajax_loader" class="ajax-load-qa">&nbsp;</div>');
        },
        success:function(res){
            $('body').append(res);
            $("#myModal").modal();
        },
        complete: function() {
            $('#ajax_loader').remove();
        }
    });
}
