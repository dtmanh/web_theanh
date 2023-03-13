		<div class="clearifx clearfix-15"></div>
            <h2 class="tit_cate_right">Giá phòng (1 đêm)</h2>
            <div class="check_price_right" id="price">
                <div class="checkbox">
                    <label><input type="checkbox" class="khoanggia" value="0-1000000" onclick="filter()" > 0 -  1.000.000VND</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" class="khoanggia" onclick="filter()" value="1000000-2500000"> 1.000.000 -  2.500.000VND</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" class="khoanggia" onclick="filter()" value="2500000-3500000"> 2.500.000 -  3.500.000VND</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" class="khoanggia" onclick="filter()" value="3500000-5000000"> 3.500.000 -  5.000.000VND</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" class="khoanggia" onclick="filter()" value="5000000-10000000"> 5.000.000VND +</label>
                </div>
            </div>
            <div class="clearifx clearfix-15"></div>
            <h2 class="tit_cate_right">Xếp hạng khách sạn</h2>
            <div class="check_star_right">
                <div class="checkbox">
                    <label>
                    <input type="checkbox" onclick="filter()" class="sao" value="1">
                    <i class="fa fa-star"></i>
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" onclick="filter()" class="sao" value="2">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" onclick="filter()" class="sao" value="3">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" onclick="filter()" class="sao" value="4">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" onclick="filter()" class="sao" value="5">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" onclick="filter()" class="sao" value="0">
                    Không xếp hạng
                    </label>
                </div>
            </div>
            <div class="clearfix clearfix-15"></div>
            <h2 class="tit_cate_right">Điểm đánh giá</h2>
            <div class="check_scores_right">
                <div class="checkbox">
                    <label>
                    <input type="checkbox" onclick="filter()" class="danhgia" value="9">
                    Tuyệt hảo 9 điểm trở lên
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" onclick="filter()" class="danhgia" value="8">
                    Xuất sắc 8 điểm trở lên
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                   <input type="checkbox" onclick="filter()" class="danhgia" value="7">
                    Rất tốt 7 điểm trở lên
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" onclick="filter()" class="danhgia" value="6">
                    Tốt 6 điểm trở lên
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" onclick="filter()" class="danhgia" value="5">
                    Trung bình 5 điểm trở lên
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" onclick="filter()" class="danhgia" value="0">
                    Chưa có đánh giá
                    </label>
                </div>
            </div>
			<input type="hidden" name="cat_id" id="cat_id" value="<?= $cat_hotel; ?>" />
	<script type="text/javascript">
	function getListItemFilter(id,khoang_gia,sao,danhgia,$page, $number_per_page) {
		var page = $page;
		var number_per_page = $number_per_page;
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>search/filter_hotel",
			data: "id=" + id+"&khoang_gia=" + khoang_gia+"&sao=" + sao+"&danhgia=" + danhgia+"&page=" + page+"&number_per_page=" + number_per_page,
			success: function (ketqua) {
				//alert(1);
				$("#hotel-content").html(ketqua);
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
		var sao = [];
		$(".sao:checked").each(function() {
			sao.push(this.value);
		}); 
		var danhgia = [];
		$(".danhgia:checked").each(function() {
			danhgia.push(this.value);
		});
		
		getListItemFilter(id,khoang_gia,sao,danhgia,1,20);
	 }
	</script>