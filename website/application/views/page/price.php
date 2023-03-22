<!-- Start home page -->
<section id="body-page">
    <div id="section-full-width">
    <?=@$this->load->widget('banner_price')?>
        <div id="price-page", class="price-contract" style="margin-top:50px">
            <div class="container">
                <div class="news">
                    <div class="section-title">
                        <h2><?= $page->name?> </h2>
                    </div>
                    <div class="section-sub-title">
                        <h3><?= $page->description?></h3>
                    </div>
                    
                    <div class="content-tab">
                        <div class="table-content active" id="price-enterprise">
                            <div class="main-price">
                                <div class="table-price">
                                    <div class="section-table">
                                        <?= $page->content?>
                                    </div>
                                    <div class="section-table">
                                        <div class="note">
                                            <div class="note-title">
                                                <b>* Lưu ý:</b>
                                            </div>
                                            <div class="note-detail">
                                                <ul>
                                                    <li>
                                                                                - Đối với các doanh nghiệp có số lượng nhân sự lớn, quý khách vui lòng liên hệ số điện thoại dưới đây để có được báo giá tốt nhất: 
                                                        <br>
                                                            <b>Miền Nam:</b> 0988.131.868 - Mr Kỳ 
                                                            <br>
                                                                <b>Miền Bắc:</b> 093.456.1010 - Mr. Long 
                                                                <br>
                                                                </li>
                                                                <li>
                                                                                - Các hợp đồng đều thời hạn thanh toán tối thiểu một năm.
                                                                            </li>
                                                                <li>
                                                                                - Phí thuê bao hàng tháng tối thiểu là 1.000.000 VND / tháng.
                                                                            </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    
        <div class="bgr-main-table" style="background: #ffffff; padding: 50px 0;">
            <div class="container">
                <div class="main-table">
                    <div class="section-title">
                        <h2>
                                        PHÍ TRIỂN KHAI HỆ THỐNG VÀ ĐÀO TẠO NGƯỜI DÙNG
                                    </h2>
                    </div>
                    <div class="table-price">
                        <table>
                            <thead>
                                <tr>
                                    <th>Số lượng nhân sự</th>
                                    <th>&lt; 50</th>
                                    <th>&lt;= 100</th>
                                    <th>&lt;= 300</th>
                                    <th>&lt;= 500</th>
                                    <th>&gt; 500</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                                    Phí khởi tạo chỉ thu một lần duy nhất
                                                </td>
                                    <td>
                                                    5 triệu
                                                </td>
                                    <td>
                                                    10 triệu
                                                </td>
                                    <td>
                                                    15 triệu
                                                </td>
                                    <td>
                                                    20 triệu
                                                </td>
                                    <td>
                                                    30 triệu
                                                </td>
                                </tr>
                                <tr>
                                    <td>
                                                    Thời gian triển khai
                                                </td>
                                    <td>
                                                    Tối đa 1 tuần
                                                </td>
                                    <td>
                                                    Tối đa 2 tuần
                                                </td>
                                    <td>
                                                    Tối đa 3 tuần
                                                </td>
                                    <td>
                                                    Tối đa 4 tuần
                                                </td>
                                    <td>
                                                    Tối đa 6 tuần
                                                </td>
                                </tr>
                                <tr>
                                    <td>
                                                    Số buổi đào tạo tối đa tại bên A
                                                </td>
                                    <td>
                                                    2 buổi
                                                </td>
                                    <td>
                                                    3 buổi
                                                </td>
                                    <td>
                                                    3 buổi
                                                </td>
                                    <td>
                                                    5 buổi
                                                </td>
                                    <td>
                                                    7 buổi
                                                </td>
                                </tr>
                                <tr>
                                    <td>
                                                    Phí đào tạo tại bên A (mua thêm)
                                                </td>
                                    <td colspan="5">
                                        <span style="color: #f15822;">2.000.000 VNĐ/buổi</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                                    Phí đào tạo tại bên B
                                                </td>
                                    <td colspan="5">
                                        <span style="color: #f15822;">500.000 VNĐ/người/buổi</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                                    Phí triển khai online
                                                </td>
                                    <td colspan="5">
                                        <span style="color: #f15822;">300.000 VNĐ/buổi</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?=@$this->load->widget('home_giaiphap');?>