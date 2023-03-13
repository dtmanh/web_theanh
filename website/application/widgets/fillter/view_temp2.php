 <div class="search_menuleft">
    <div class="tit_search_menuleft">Tìm theo</div>
    <div class="">
        <div class="box_search_left has-dropdown">
            <a href="">Thương hiệu</a>
            <div class="box_check nav-dropdown clearfix">
            	<?php foreach($brands as $br) : ?>
                <div class="checkbox">
                      <label><input type="checkbox" class="thuonghieu" value="<?=@$br->id;?>"  onclick="filter()" ><span><?=@$br->name;?></span></label>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        <div class="clearfix-20"></div>
        <div class="box_search_left has-dropdown">
            <a href="">Khoảng giá</a>
            <div class="box_check nav-dropdown clearfix">
            	<?php foreach($khoanggia as $kg) : ?>
                <div class="checkbox">
                      <label><input type="checkbox" class="khoanggia" value="<?=@$kg->from_price;?>-<?=@$kg->to_price;?>" onclick="filter()"><span><?=@$kg->name;?></span></label>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="id_brand" id="id_brand" value="" />  
<input type="hidden" name="id_khoanggia" id="id_khoanggia" value="" />  
 <script type="text/javascript">
	function getListItemFilter(id,khoang_gia,thuonghieu,$page, $number_per_page) {
		var page = $page;
		var number_per_page = $number_per_page;
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>search/filter",
			data: "id=" + id+"&khoang_gia=" + khoang_gia+"&thuong_hieu=" + thuonghieu+"&page=" + page+"&number_per_page=" + number_per_page,
			success: function (ketqua) {
				//alert(1);
                $("#id_brand").val(thuonghieu);
                $("#id_khoanggia").val(khoang_gia);
				$("#result_fill").html(ketqua);
				// $("#timer123").hide();
			}
		})
	}
     function filter()
	{
		var id = $('#cat_id').val();
		var khoang_gia = [];
		$(".khoanggia:checked").each(function() {
			khoang_gia.push(this.value);
		});
		var thuonghieu = [];
		$(".thuonghieu:checked").each(function() {
			thuonghieu.push(this.value);
		}); 
		
		getListItemFilter(id,khoang_gia,thuonghieu,1,20);
	 }
	</script>
<style>
	.tit_search_menuleft {
    font-size: 20px;
    font-family: 'Roboto_Regular';
    text-transform: uppercase;
    color: #010101;
    margin-bottom: 10px;
}

.box_check.nav-dropdown {
        position: inherit;
    display: none;
    opacity: 1;
    -webkit-transform: scaleY(1) !important;
    transform: scaleY(1) !important;
    left: 0;
    width: 100%;
        padding: 10px 15px 0;
    box-shadow: none;
    visibility: visible;
    background: #fff;
}
.box_search_left.has-dropdown a{
 font-size: 20px;
 font-family: 'Roboto_Regular';
 text-transform: uppercase;
 color: #333;
        padding: 15px 0 15px 15px;
     border-bottom: 1px solid #ccc;
     display: block;

}
.box_search_left.has-dropdown  {

}
.search_menuleft .has-dropdown:after {
    
    content: "+" !important;
    color: #333;
    height: 30px;
    width: 20px;
    line-height: 30px;
    position: absolute;
    top: 15px;
    font-size: 25px;
    right: 14px;
}
.search_menuleft .has-dropdown.is-active:after {
       content: "-" !important;
    color: #333;
    height: 30px;
    width: 20px;
    line-height: 30px;
    position: absolute;
    top: 15px;
    font-size: 40px;
    right: 14px;
}
.box_check input[type="checkbox"] {
    width: 16px;
    height: 16px;
    border:1px solid #ccc;
    background: #fff;
    margin-top: 0px;
    padding-right: 10px;
}
.box_check .checkbox span {
    display:inline-block;
    margin-left: 10px;
    font-size: 14px;
    font-family: 'Roboto_Regular';
    color: #333;
}
.box_check .checkbox {
    margin-bottom: 20px;
}
.box_check {
    border-bottom: 1px solid #ccc;

}
.box_search_left {
    border: 1px solid #ccc;
}
</style>