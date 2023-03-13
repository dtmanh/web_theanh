<div class="col-lg-215 col-md-3">
	<div class="row_6">
		<div class="right_cate">
			<h2 class="tit_cate_right"><a href=""><?=lang('view_map');?></a></h2>
			<div class="clearfix clearfix-15"></div>
			<div class="box_tuvan_right">
				<img src="<?= base_url() ?>assets/css/img/tuvan.png" alt=""/>
			</div>
			<div class="clearifx clearfix-15"></div>
			
			<h2 class="tit_cate_right"><?=lang('price');?> khách sạn</h2>
			<div class="check_price_right">
				<div class="checkbox">
					<label><input type="checkbox" value="">0.000 VNĐ - 50.000 VNĐ</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" value="">50.000 VNĐ - 80.000 VNĐ</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" value="">80.000 VNĐ - 100.000 VNĐ</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" value="">100.000 VNĐ +</label>
				</div>
			</div>

			<div class="clearifx clearfix-15"></div>
			<h2 class="tit_cate_right"><?=lang('xephang');?></h2>
			<div class="check_star_right">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" class="star_a" onclick="filter_5($(this).val())">
						<i class="fa fa-star"></i>
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="2" class="star_a" onclick="filter_5($(this).val())">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="3" class="star_a" onclick="filter_5($(this).val())">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="4" class="star_a" onclick="filter_5($(this).val())">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="5" class="star_a" onclick="filter_5($(this).val())">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="0" class="star_a" onclick="filter_5($(this).val())">
						<?=lang('noxephang');?>
					</label>
				</div>
			</div>

			<div class="clearfix clearfix-15"></div>
			
			<h2 class="tit_cate_right"><?=lang('diemdanhgia');?></h2>
			<div class="check_scores_right">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="">
						Tuyệt hảo 9 điểm trở lên
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="">
						Xuất sắc 8 điểm trở lên
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="">
						Rất tốt 7 điểm trở lên
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="">
						Tốt 6 điểm trở lên
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="">
						Trung bình 5 điểm trở lên
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="">
						Chưa có đánh giá
					</label>
				</div>
			</div>
			<div class="clearifx clearfix-15"></div>

			<h2 class="tit_cate_right"><a href=""> <?=lang('comment_customer');?></a></h2>
			<div class="list_his_us">
				<?php foreach($ykcustomer as $customer) :  ?>
				<div class="box_his_us">
					<a href="" class="img_his_us"><img src="<?=base_url(@$customer->icon)?>" alt="<?=@$customer->name;?>"/></a>
					<div class="sub_his_us">
						<span class="name_his_us"><?=@$customer->name;?></span>
						<span class="des_his_us"><?=@$customer->title;?></span>
						<span class="cm_his_us"><?=LimitString(@$customer->description,'200','...');?></span>
					</div>
				</div>
				<div class="clearfix"></div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>
