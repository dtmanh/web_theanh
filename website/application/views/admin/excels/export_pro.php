<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>

<table border="0" style="font-family:'Times New Roman'; font-size:20pt">

    <tr><td colspan="8" align="center" style="font-weight: bold">Sản phẩm</td></tr>

    <tr><td colspan="8" align="center"></td></tr>

</table>

<table border="1" style="font-family:'Times New Roman'; font-size:12pt">

    <tr style="font-weight:bold; text-align:center;background-color: #ccc">

        <td width="3%" >STT</td>
        <td>Tên sản phẩm</td>

        <td width="15%">Danh mục</td>

        <td width="15%">Giá cũ</td>

        <td width="15%">Giá mới</td>
       

        <td width="10%">Thời gian gửi</td>

    </tr>

    <?php if(isset($list)){

        $stt=0;

        foreach($list as $v){

            $stt++;

           

            ?>

            <tr>

                <td align="center"><?= $stt;?></td>

                <td><?= @$v->name?></td>

                <td><?= @$v->pro_cat_name?></td>

                <td><?=number_format(@$v->price)?> đ</td>

                <td><?=number_format(@$v->price_sale)?> đ</td>

                <td><?= !empty($v->time)?date('d-m-Y',@$v->time):'';?></td>

            </tr>


        <?php }

    } ?>

</table>

