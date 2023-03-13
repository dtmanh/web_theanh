

<div class="clearfix-30"></div>
<!-- main content -->
<main>
   <div class="container">
      <div class="row_pc">
         <div class="imfo__user">
            <img src="img/user.png" alt="">
            <form action="<?=base_url('thong-tin-tai-khoan')?>" method="post">
               <table width="100%">
                  <tr>
                     <td><label for="">Số điện thoại</label></td>
                     <td><input type="text" name="phone" placeholder="" value="<?= @$user_item->phone; ?>"></td>
                  </tr>
                  <tr>
                        <td><label for="">Mail</label></td>
                        <td><input type="text" name="email" placeholder="abc@gmail.com" value="<?=@$user_item->email;?>"></td>
                     </tr>
                     <tr>
                       <td><label for="">Địa chỉ</label></td>
                       <td><input type="text" name="address" value="<?= @$user_item->address; ?>"></td>
                    </tr>
                    <tr>
                       <td><button type="submit" name="update_profiler">Chỉnh sửa</button></td>
                    </tr>
               </table>
            </form>
         </div>
      </div>
   </div>
</main>
