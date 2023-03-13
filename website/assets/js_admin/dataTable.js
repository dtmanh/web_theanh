/*BEGIN: js admin by tran manh*/

//hiện thị danh mục theo DataTable
$( window ).load(function() {
	$('#myTable').DataTable({
		"columnDefs": [ {
			"targets": 'no-sort',
			"orderable": false,
			  } ],
		"paging": true,
		"order": [[ 1, "desc" ]],
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"iDisplayLength": 15
  });
});
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