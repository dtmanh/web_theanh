
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
function getModalPrice(id)
{
    $("#myModal").remove();
    $.ajax({
        url:base_url() + 'admin/product/price',
        dataType:"html",
        type:"POST",
        data:{id:id},
        success:function(res){
            $('body').append(res);
            $("#myModal").modal();
        }
    });
}

function updatePrice(){
    if($('#priceform').validationEngine('validate')){
        $.ajax({
            url:base_url() + 'admin/product/updatePrice',
            dataType:"html",
            type:"POST",
            data:{id:$('#id_item').val(),price0:$('#price0').val(),price1:$('#price1').val(),price2:$('#price2').val(),price3:$('#price3').val(),price4:$('#price4').val(),price5:$('#price5').val(),price6:$('#price6').val(),day1:$('#day1').val(),day2:$('#day2').val(),day3:$('#day3').val(),day4:$('#day4').val(),day5:$('#day5').val(),day0:$('#day0').val(),day6:$('#day6').val()},
            success:function(res){
                alert('Bạn đã cập nhật thành công');
                location.reload();
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
    //button check
}

function displayButtonCheck(){
    var $check = false;
    jQuery("input[name='checkone[]']").each(function(){
        if($(this).is(':checked')){
            $check = true;
        }
    });
    if($check == false){
        $('#change-more').addClass('hidden');
        $('#change-one').removeClass('hidden');
    }
    else{
        $('#change-more').removeClass('hidden');
        $('#change-one').addClass('hidden');
    }
}
function changePrice(kd,id,gt){
    var val = gt.val();
    $.ajax({
        url:base_url() + 'admin/product_price/updatePrice',
        dataType:"json",
        type:"POST",
        data:{id:id,kd:kd,gt:val},
        success:function(res){
            if(res.check==true)
            {
                alert('Cập nhật giá thành công !');
                window.location.reload();
            }
        }
    });
}
/*BEGIN: OpenTab*/
function OpenTabSearch(val,status)
{
	switch (status)
	{
		case 1:
			if(val == '1' || val == '2')
			{
				document.getElementById('DivDateSearch_1').style.display = "";
				document.getElementById('DivDateSearch_2').style.display = "";
				document.getElementById('DivDateSearch_3').style.display = "";
				document.getElementById('DivDateSearch_4').style.display = "";
				document.getElementById('DivDateSearch_5').style.display = "";
				document.getElementById('DivDateSearch_6').style.display = "";
			}
			else
			{
				document.getElementById('DivDateSearch_1').style.display = "none";
				document.getElementById('DivDateSearch_2').style.display = "none";
				document.getElementById('DivDateSearch_3').style.display = "none";
				document.getElementById('DivDateSearch_4').style.display = "none";
				document.getElementById('DivDateSearch_5').style.display = "none";
				document.getElementById('DivDateSearch_6').style.display = "none";
			}
			break;
		default:
			document.getElementById('DivDateSearch_1').style.display = "none";
			document.getElementById('DivDateSearch_2').style.display = "none";
			document.getElementById('DivDateSearch_3').style.display = "none";
			document.getElementById('DivDateSearch_4').style.display = "none";
			document.getElementById('DivDateSearch_5').style.display = "none";
			document.getElementById('DivDateSearch_6').style.display = "none";
	}
}

function OpenTabEndday(div,val,status)
{
	switch (status)
	{
		case 1://Neu chon VIP
			if(val == "2")
			{
				document.getElementById(div).style.display = "";
			}
			else
			{
				document.getElementById(div).style.display = "none";
			}
			break;
		case 2://Hien DivEndDay
			document.getElementById(div).style.display = "";
			break;
		default://An DivEndDay
			document.getElementById(div).style.display = "none";
	}
}

function OpenTabReply(status)
{
	switch (status)
	{
		case 1://Hien
			if(document.getElementById('DivReply').style.display == "")
			{
				document.getElementById('DivReply').style.display = "none";
				document.getElementById('icon_item_2').style.display = "none";
			}
			else
			{
				document.getElementById('DivReply').style.display = "";
				document.getElementById('icon_item_2').style.display = "";
			}
			break;
		case 2://Luon hien
			document.getElementById('DivReply').style.display = "";
			document.getElementById('icon_item_2').style.display = "";
			break;
		default://An
			document.getElementById('DivReply').style.display = "none";
			document.getElementById('icon_item_2').style.display = "none";
	}
}
/*END OpenTab*/
/*BEGIN: ShowImage*/
function ShowImage(getdiv,div,path)
{
	document.getElementById(div).innerHTML = '<img src="' + path + '/' + document.getElementById(getdiv).value + '" border="0" />';
}
/*END ShowImage*/
/*BEGIN: Check Character*/
function CheckCharacter(char)
{
	var str="0123456789abcdefghikjlmnopqrstuvwxyszABCDEFGHIKJLMNOPQRSTUVWXYSZ-_";
	for(var i=0;i<char.length;i++)
	{
		if(str.indexOf(char.charAt(i)) == -1)
		{
			return false;
		}
	}
	return true;//Dung la ky tu cho phep
}
/*END Check Character*/
/*BEGIN: Kiem Tra TextBox Co Rong*/
function TrimInput(sString)
{
	while(sString.substring(0,1) == ' ')
	{
		sString = sString.substring(1, sString.length);
	}
	while(sString.substring(sString.length-1, sString.length) == ' ')
	{
		sString = sString.substring(0,sString.length-1);
	}
	return sString;
}

function CheckBlank(str)
{
	if(TrimInput(str) == '')
		return true;//Neu chua nhap
	else
		return false;//Neu da nhap
}
/*END Kiem Tra TextBox Co Rong*/
/*BEGIN: Check Phone*/
function CheckPhone(number)
{
	if(number.length < 5 || number.length > 16)
	{
		return false;
	}
	else
	{
		var str="0123456789.()";
		for(var i=0;i<number.length;i++)
		{
			if(str.indexOf(number.charAt(i)) == -1)
			{
				return false;
			}
		}
	}
	return true;//Dung so dien thoai
}
/*END Check Phone*/
/*BEGIN: Kiem Tra Ngay Co Lon Hon Ngay Hien Tai - Neu Hop Le Tra Ve true*/
function CheckDate(isday,ismonth,isyear)
{
   	var vdate = new Date();
   	var vday = vdate.getDate();
   	var vmonth = vdate.getMonth();
   	var vyear = vdate.getFullYear();
	vmonth = vmonth + 1;
	isday = isday*1;
	ismonth = ismonth*1;
	isyear = isyear*1;
	if(isyear > vyear)
	{
		return true;//Hop le
	}
	if(isyear == vyear)
	{
		if(ismonth > vmonth)
		{
			return true;//Hop le
		}
		if(ismonth == vmonth)
		{
			if(isday > vday)
			{
				return true;//Hop le
			}
			else
			{
				return false;//Khong hop le
			}
		}
		else
		{
			return false;//Khong hop le
		}
	}
	else
	{
		return false;//Khong hop le
	}
}
/*END Kiem Tra Ngay Co Lon Hon Ngay Hien Tai*/
/*BEGIN: Check Link*/
function CheckLink(char)
{
	var str="0123456789abcdefghikjlmnopqrstuvwxysz-_";
	for(var i=0;i<char.length;i++)
	{
		if(str.indexOf(char.charAt(i)) == -1)
		{
			return false;
		}
	}
	return true;//Dung la ky tu cho phep
}
/*END Check Link*/
/*BEGIN: Check Website*/
function CheckWebsite(char)
{
	var str="0123456789abcdefghikjlmnopqrstuvwxysz/.:-_";
	for(var i=0;i<char.length;i++)
	{
		if(str.indexOf(char.charAt(i)) == -1)
		{
			return false;
		}
	}
	return true;//Dung la ky tu cho phep
}
/*END Check Website*/
















function CheckLogin()
{
	if(CheckBlank(document.getElementById('usernameLogin').value))
	{
		alert("Bạn chưa nhập tài khoản!");
		document.getElementById('usernameLogin').focus();
		return false;
	}
	if(!CheckCharacter(document.getElementById('usernameLogin').value))
	{
		alert("Tài khoản bạn nhập không hợp lệ!\nChỉ chấp nhận các ký số 0-9\nChấp nhận các ký tự a-z hoặc A-Z\nChấp nhận các ký tự - _");
		document.getElementById('usernameLogin').focus();
		return false;
	}
	
	if(CheckBlank(document.getElementById('passwordLogin').value))
	{
		alert("Bạn chưa nhập mật khẩu!");
		document.getElementById('passwordLogin').focus();
		return false;
	}
	document.frmLogin.submit();
}

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
/*END isActionDelete*/
/*BEGIN: Change Style*/
function ChangeStyle(div,action)
{
	switch (action)
	{
		case 1:
			document.getElementById(div).style.border = "1px #2F97FF solid";
			break;
		case 2:
			document.getElementById(div).style.border = "1px #CCCCCC solid";
			break;
		default:
			document.getElementById(div).style.border = "1px #2F97FF solid";
	}
}
/*END Change Style*/
/*BEGIN: Change Style Icon*/
function ChangeStyleIcon(div,action)
{
	switch (action)
	{
		case 1:
			document.getElementById(div).style.border = "1px #2F97FF solid";
			break;
		case 2:
			document.getElementById(div).style.border = "1px #EAEAEA solid";
			break;
		default:
			document.getElementById(div).style.border = "1px #2F97FF solid";
	}
}
/*END Change Style Icon*/
/*BEGIN: Change Style Icon Item*/
function ChangeStyleIconItem(div,action)
{
	switch (action)
	{
		case 1:
			document.getElementById(div).style.border = "1px #CCCCCC outset";
			document.getElementById(div).style.color = "#F00000";
			break;
		case 2:
			document.getElementById(div).style.border = "1px #FFFFFF solid";
			document.getElementById(div).style.color = "#06F";
			break;
		default:
			document.getElementById(div).style.border = "1px #CCCCCC outset";
			document.getElementById(div).style.color = "#F00000";
	}
}
/*END Change Style Icon Item*/
/*BEGIN: ChangeStyleRow*/
function ChangeStyleRow(div,row,status)
{
	switch (status)
	{
		case 1://Change
			document.getElementById(div).style.background = "#ECF5FF";
			break;
		case 2://Default
			if(row % 2 == 0)
			{
				document.getElementById(div).style.background = "#F7F7F7";
			}
			else
			{
				document.getElementById(div).style.background = "none";
			}
			break;
		default://Change
			document.getElementById(div).style.background = "#ECF5FF";
	}
}
/*END ChangeStyleRow*/
/*BEGIN: Khoa Ky Tu Khong Cho Phep*/
var rBlock={
  'SpecialChar':/['\'\"\\#~`<>;']/g,
  'AllSpecialChar':/['@\'\"\\~<>;`&\/%$^*{}\[\]!|():,?+=#']/g,
  'NotNumbers':/[^\d]/g
}
function BlockChar(div,type)
{
	div.value = div.value.replace(rBlock[type],'');
	div.value = div.value.replace(/ +/g,' ');
}
/*END Khoa Ky Tu Khong Cho Phep*/
/*BEGIN: Chu Hoa Dau Tu*/
function CapitalizeNames(FormName,FieldName) 
{
  var ValueString = new String();
  eval('ValueString=document.'+FormName+'.'+FieldName+'.value');
  ValueString = ValueString.replace(/ +/g,' ');
  var names = ValueString.split(' ');
  for(var i = 0; i < names.length; i++) 
  {
	  if(names[i].length > 1)
	  {
		  names[i] = names[i].toLowerCase();
		  letters = names[i].split('');
		  letters[0] = letters[0].toUpperCase();
		  names[i] = letters.join('');
  	  }
  	  else
	  { 
	  	names[i] = names[i].toUpperCase();
	  }
  }
  ValueString = names.join(' ');
  eval('document.'+FormName+'.'+FieldName+'.value=ValueString');
  return true;
}
/*END Chu Hoa Dau Tu*/
/*BEGIN: Curency*/
function AddComma(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = "";
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1))
	{	
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

function FormatCost(cost,div)
{
	document.getElementById(div).innerHTML = AddComma(cost);
}
/*END Curency*/
/*BEGIN: Kiem tra xem co chon vao o checkbox nao khong, Va hai tuy chon tat ca va huy bo*/
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
/*END Kiem tra xem co chon vao o checkbox nao khong, Va hai tuy chon tat ca va huy bo*/
/*BEGIN: Mktime*/
function mktime()
{
    var no=0, i = 0, ma=0, mb=0, d = new Date(), dn = new Date(), argv = arguments, argc = argv.length;
    var dateManip = {
        0: function(tt){ return d.setHours(tt); },
        1: function(tt){ return d.setMinutes(tt); },
        2: function(tt){ var set = d.setSeconds(tt); mb = d.getDate() - dn.getDate(); return set;},
        3: function(tt){ var set = d.setMonth(parseInt(tt, 10)-1); ma = d.getFullYear() - dn.getFullYear(); return set;},
        4: function(tt){ return d.setDate(tt+mb);},
        5: function(tt){
            if (tt >= 0 && tt <= 69) {
                tt += 2000;
            }
            else if (tt >= 70 && tt <= 100) {
                tt += 1900;
            }
            return d.setFullYear(tt+ma);
        }
        // 7th argument (for DST) is deprecated
    };
	
    for( i = 0; i < argc; i++ ){
        no = parseInt(argv[i]*1, 10);
        if (isNaN(no)) {
            return false;
        } else {
            // arg is number, let's manipulate date object
            if(!dateManip[i](no)){
                // failed
                return false;
            }
        }
    }
	
    for (i = argc; i < 6; i++) {
        switch(i) {
            case 0:
                no = dn.getHours();
                break;
            case 1:
                no = dn.getMinutes();
                break;
            case 2:
                no = dn.getSeconds();
                break;
            case 3:
                no = dn.getMonth()+1;
                break;
            case 4:
                no = dn.getDate();
                break;
            case 5:
                no = dn.getFullYear();
                break;
        }
        dateManip[i](no);
    }
    return Math.floor(d.getTime()/1000);
}
/*END Mktime*/
/*BEGIN: Action Search*/
function ActionSearch(baseurl,type)
{
	var isAddress = "";
	switch (type)
	{
		case 1://Search
			var isKeyword = "";
			var isSearch = "";
			isKeyword = document.getElementById('keyword').value;
			isSearch = document.getElementById('search').value;
			if(!CheckBlank(isKeyword) && isSearch != "0")
			{
				isAddress = baseurl + 'search/' + isSearch + '/keyword/' + isKeyword;
				window.location.href = isAddress;
			}
			break;
		case 2://Filter
			var isFilter = "";
			isFilter = document.getElementById('filter').value;
			if(isFilter == 'begindate' || isFilter == 'regisdate' || isFilter == 'enddate' || isFilter == 'lastestlogin' || isFilter == 'datecontact' || isFilter == 'datereply' || isFilter == 'buydate')//Neu Co Ngay-Thang-Nam
			{
				if(document.getElementById('DivDateSearch_2').style.display == "none" || document.getElementById('DivDateSearch_4').style.display == "none" || document.getElementById('DivDateSearch_6').style.display == "none")
				{
					OpenTabSearch('1',1);
					break;
				}
				var isDay = "";
				var isMonth = "";
				var isYear = "";
				isDay = document.getElementById('day').value;
				isMonth = document.getElementById('month').value;
				isYear = document.getElementById('year').value;
				if(isDay == "0" || isMonth == "0" || isYear == "0")
				{
					break;
				}
				isKey = mktime(0, 0, 0, isMonth, isDay, isYear);
				isAddress = baseurl + 'filter/' + isFilter + '/key/' + isKey;
			}
			else
			{
				isKey = isFilter;
				isAddress = baseurl + 'filter/' + isFilter + '/key/' + isKey;
			}
			if(isFilter != "0")
			{
				window.location.href = isAddress;
			}
			break;
		default://None
			alert("Error!");
	}
}
/*END Action Search*/
/*BEGIN: ActionSort*/
function ActionSort(isAddress)
{
	window.location.href = isAddress;
}
/*END ActionSort*/
/*BEGIN: ActionStatus*/
function ActionStatus(isAddress)
{
	window.location.href = isAddress;
}
/*END ActionStatus*/
/*BEGIN: ActionLink*/
function ActionLink(isAddress)
{
	window.location.href = isAddress;
}
/*END ActionLink*/
/*BEGIN: Popup*/
function Popup(url, width, height)
{
	var winpops=window.open(url,"","width=" + width + ",height=" + height + ",toolbar=no,menubar=no,resizable=no,menubar=no,status=no,scrollbars=yes,screenX=400,screenY=400,top=100,left=250");
}
/*END Popup*/


