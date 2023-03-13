/*BEGIN: js admin by tran manh*/
// thay doi anh khi up load
function base_url(){
    return $('#baseurl').val();
}
function handleFiles() {
    var filesToUpload = document.getElementById('input_img').files;
    var file = filesToUpload[0];

    // Create an image
    var img = document.createElement("img");
    // Create a file reader
    var reader = new FileReader();
    // Set the image once loaded into file reader
    reader.onload = function (e) {
        img.src = e.target.result;

        var canvas = document.createElement("canvas");
        //var canvas = $("<canvas>", {"id":"testing"})[0];
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);

        var MAX_WIDTH = 4000;
        var MAX_HEIGHT = 4000;
        var width = img.width;
        var height = img.height;

        if (width > height) {
            if (width > MAX_WIDTH) {
                height *= MAX_WIDTH / width;
                width = MAX_WIDTH;
            }
        } else {
            if (height > MAX_HEIGHT) {
                width *= MAX_HEIGHT / height;
                height = MAX_HEIGHT;
            }
        }
        canvas.width = width;
        canvas.height = height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, width, height);

        var dataurl = canvas.toDataURL("image/png");
        document.getElementById('image_review').src = dataurl;
    }
    // Load files into file reader
    reader.readAsDataURL(file);


    // Post the data
    /*
     var fd = new FormData();
     fd.append("name", "some_filename.jpg");
     fd.append("image", dataurl);
     fd.append("info", "lah_de_dah");
     */
}

function changeimg(input,target) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $(target).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
    }
}

$('#image_review').click(function(){
    $('#input_img').click();
})

// tao alias
function createAlias(name)
{
    var str = $(name).val();
    // chuyển chuỗi sang chữ thường để xử lý
    str= str.toLowerCase();
    /* tìm kiếm và thay thế tất cả các nguyên âm có dấu sang không dấu*/
    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");

    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");

    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");

    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");

    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");

    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");

    str= str.replace(/đ/g,"d");

    str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");

    /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */

    str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-

    str= str.replace(/^\-+|\-+$/g,"");//cắt bỏ ký tự - ở đầu và cuối chuỗi

    document.getElementById("alias").value = str;// xuất kết quả xữ lý ra keyword
}

// tao moi alias
function createItem()
    {
	$('#error-alias .alert-danger').remove();
	if($('#form-bk').validationEngine('validate')){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url() + 'techadmin/alias/checkAdd',
			data: {alias:$('#alias').val()},
			success:function(result){
				if(result.check == true){
					$('#form-bk').submit();
				}else{
					$('#error-alias').append('<div class="alert-danger">Alias này đã tồn tại ! Vui lòng nhập alias khác</div>');
				}
			}
		});
	}
}
// edit danh muc trong alias
function editCatItem(){
	$('#error-alias .alert-danger').remove();
	if($('#form-bk').validationEngine('validate')){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url() + 'techadmin/alias/checkCatEdit',
			data: {id:$('#id_edit').val(),alias:$('#alias').val(),catcheck:$('#catcheck').val()},
			success:function(result){
				if(result.check == true){
					$('#form-bk').submit();
				}else{
					$('#error-alias').append('<div class="alert-danger">Alias này đã tồn tại ! Vui lòng nhập alias khác</div>');
				}
			}
		});
	}
}
// edit alias
function editItem(){
	
	$('#error-alias .alert-danger').remove();
	if($('#form-bk').validationEngine('validate')){

		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url() + 'techadmin/alias/checkEdit',
			data: {id:$('#id_edit').val(),alias:$('#alias').val(),catcheck:$('#catcheck').val()},
			success:function(result){
				if(result.check == true){
					$('#form-bk').submit();
				}else{
					$('#error-alias').append('<div class="alert-danger">Alias này đã tồn tại ! Vui lòng nhập alias khác</div>');
				}
			}
		});
	}
}
// xoa anh cua 1 table
function delete_image(s){
	if(confirm("Bạn có chắc chắn xóa ảnh ...?")){
		$.ajax({
			url: base_url() +"ajax/ajax/deleteimage",
			type: 'POST',
			dataType: 'json',
			data: {id:$('#id_edit').val(),table:s.attr('data-placement'),pathImage:s.attr('data-view')},
			success: function (result) {
				if(result.check == true){
					$('#view_img').css( "display",'none' ) ;
					$('.alert').addClass('alert-success') ;
				}else{
					$('.alert').addClass('alert-warning');
				}
				$('.alert').html(result.mss_success);
				$('.alert').css( "display",'block' ) ;
				setTimeout(function(){
					$('.alert').hide();
				}, 5000);
				return false;
			}
		});
	}
}
// xoa anh cua 1 table
function delete_fillter(s){
	if(confirm("Bạn có chắc chắn xóa ...?")){
		$.ajax({
			url: base_url() +"ajax/ajax/delete_fillter",
			type: 'POST',
			dataType: 'json',
			data: {id:$('#id_edit').val(),table:s.attr('data-placement'),fill:s.attr('data-value')},
			success: function (result) {
				if(result.check == true){
					$('#view_fill').css( "display",'none' ) ;
					$('.alert').addClass('alert-success') ;
				}else{
					$('.alert').addClass('alert-warning');
				}
				$('.alert').html(result.mss_success);
				$('.alert').css( "display",'block' ) ;
				setTimeout(function(){
					$('.alert').hide();
				}, 5000);
				return false;
			}
		});
	}
}
// xoa anh multi
function removeimg(s) {
	if(confirm("Bạn có chắc chắn xóa ảnh ...?")){
		var id = $(s).data('id');
		$.ajax({
			url: base_url() +"ajax/ajax/deleteimage_multi",
			type: 'POST',
			dataType: 'json',
			data: {id:id,table:s.attr('data-placement')},
			success:function (result) {
				if(result.check == true){
					$('.alert').addClass('alert-success') ;
					$('#'+id).remove();
				}else{
					$('.alert').addClass('alert-warning');
				}
				$('.alert').html(result.mss_success);
				$('.alert').css( "display",'block' ) ;
				setTimeout(function(){
					$('.alert').hide();
				}, 5000);
				return false;
			}
		})
	}
}
// cap nhat 1 trương trong table
function update_value(s) {
	var str = $(s).val();
	var id = $(s).data('id');
	$.ajax({
		url: base_url() +"ajax/ajax/update_value",
		type: 'POST',
		dataType: 'json',
		data: {id:id,table:s.attr('data-placement'),value:str,fill:s.attr('data-view')},
		success:function (result) {
		}
	})
}
// ckeditor cho cac trương
	url= base_url() +'assets/ckfinder/';
	// ckeditor mo ta không full
	CKEDITOR.replace( 'ckeditor_description', {title:''} );
