<div id="container">
	<div class="error-page">
		<h2 class="headline text-yellow"> 404</h2>

		<div class="error-content">
		  <h3><i class="fa fa-warning text-yellow"></i> Lỗi! Không tìm thấy trang.</h3>

		  <p>
			Chúng tôi không tìm thấy trang bạn cần tìm.
			Trong khi đó, bạn có thể quay lại <a href="<?= base_url('')?>">trang chủ </a>hoặc thử sử dụng mẫu tìm kiếm.
		  </p>
		  <p>
			<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" >Quay lại trang trước <i class="fa fa-reply"></i></a>
		</p>
		</div>
	<!-- /.error-content -->
	</div>
</div>
<style>
button.btn.btn-warning.btn-flat {
    padding: 9px 12px;
}
.error-page {
    width: 600px;
    margin: 20px auto 0 auto;
}
.text-yellow {
    color: #f39c12 !important;
}
.error-page>.headline {
    float: left;
    font-size: 100px;
    font-weight: 300;
}
.error-page>.error-content {
    margin-left: 190px;
    display: block;
	padding-top:20px;
}
.error-page>.error-content>h3 {
    font-weight: 300;
    font-size: 25px;
}
</style>