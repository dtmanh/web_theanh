/*BEGIN: js admin by tran manh*/
// xoa ban ghi tu bảng du lieu bat ky
$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
function deleteObject(s) {
	var confirmText = "Bạn có chắc chắn muốn xóa?";	
	if(confirm(confirmText)) {
		var form_data = {
			id: s.attr('data-item'), table:s.attr('data-placement'),pathImage:s.attr('data-view')
		};
		$.ajax({
			url: base_url() + "ajax/ajax_backend/deleteObject",
			type: 'POST',
			dataType: 'html',
			data: form_data,
			success: function (result) {
				$('#banghi_'+s.attr('data-item')).remove();
				var mss ='<div class="alert alert-success alert-dismissible" role="alert">\
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
		            <i class="icon fa fa-success"></i>Bạn đã Xóa thành công !\
		    	</div>';
		        $('#show_success_mss').html(mss);
		        $('#show_success_mss').show();
		        setTimeout(function(){
		            $('#show_success_mss').empty();
		        }, 6000)			    
			}
		});
	}
}

function DoCheck(status,FormName,from_)
{
    var alen=eval('document.'+FormName+'.elements.length');
    alen=(alen>1)?eval('document.'+FormName+'.checkone.length'):0;
    if (alen>0)
    {
        for(var i=0;i<alen;i++)
            eval('document.'+FormName+'.checkone[i].checked=status');
    }
    else
    {
        eval('document.'+FormName+'.checkone.checked=status');
    }
    if(from_>0)
        eval('document.'+FormName+'.checkall.checked=status');
}

function DoCheckOne(FormName)
{
    var alen=eval('document.'+FormName+'.elements.length');
    var isChecked=true;
    alen=(alen>1)?eval('document.'+FormName+'.checkone.length'):0;
    if (alen>0)
    {
        for(var i=0;i<alen;i++)
            if(eval('document.'+FormName+'.checkone[i].checked==false'))
                isChecked=false;
    }
    else
    {
        if(eval('document.'+FormName+'.checkone.checked==false'))
            isChecked=false;
    }
    eval('document.'+FormName+'.checkall.checked=isChecked');
}
// xóa danh mục đã chọn
function ActionDelete(formName)
{
    var $check = false;
    jQuery("input[name='checkone[]']").each(function(){
        if($(this).is(':checked')){
            $check = true;
        }
    });
    if($check == false){
        alert('Bạn chưa chọn mục nào để xóa');
    }
    else{
        if(confirm('Bạn có chắc chắn muốn xóa không ?')){
            eval('document.' + formName + '.submit();');
        }
    }
}
// click hien thị và không hiện thị
$('.view_color').click(function(){
	var color = $( this ).css( "border-color" );
	var background = $( this ).css( "background-color" );

	var form_data = {
		id: $( this ).attr('data-value'),view:$( this ).attr('data-view'),table:$( this ).attr('data-placement')
	};
	$.ajax({
		url: base_url() + 'ajax/ajax/update_fill',
		type: 'POST',
		dataType: 'json',
		data: form_data,
		success: function (rs) {

		}
	});
	if(color!=background){
		$( this ).css( "background-color",color ) ;
	}else{
		$( this ).css( "background-color",'#fff' ) ;
	}
});
$('.view_color2').click(function(){
	var color = $( this ).css( "border-color" );
	var background = $( this ).css( "background-color" );

	var form_data = {
		id: $( this ).attr('data-value'),view:$( this ).attr('data-view'),table:$( this ).attr('data-placement')
	};
	$.ajax({
		url: base_url() + 'ajax/ajax/update_fill2',
		type: 'POST',
		dataType: 'json',
		data: form_data,
		success: function (rs) {

		}
	});
	if(color!=background){
		$( this ).css( "background-color",color ) ;
	}else{
		$( this ).css( "background-color",'#fff' ) ;
	}
});
// cap nhat trường sap xep cho table
function update_sort(s) {
	var form_data = {
		id: s.attr('data-item'), sort: s.val(), table:s.attr('data-placement')
	};
	$.ajax({
		url: base_url() + "ajax/ajax/update_sort",
		type: 'POST',
		dataType: 'json',
		data: form_data,
		success: function (rs) {
		}
	});
}
// popup xem chi tiet thanh vien
function getModal_user(id) {
	$('.modal').remove();
	$.ajax({
		type: "GET",
		dataType:"html",
		url: base_url() + 'admin/users/popupdata',
		data: "id=" + id,
		success: function (ketqua) {
			$('body').append(ketqua);
			$("#myModal").modal();
		}
	})
}
// popup sưa thong tin module
function getModal_module(id=null) {
	$('.modal').remove();
	$.ajax({
		type: "GET",
		dataType:"html",
		url: base_url() + 'admin/group/popupdata',
		data: "id=" + id,
		success: function (ketqua) {
			$('body').append(ketqua);
			$("#myModal").modal();
		}
	})
}
