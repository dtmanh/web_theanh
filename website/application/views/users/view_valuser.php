<table class="table table-bordered">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên Thuộc tính</th>
        <th>Danh mục</th>
        <th>Màu sắc/Ảnh</th>
        <th>Sửa/xóa</th>
    </tr>
    </thead>
    <tbody>
        <?php if(count($lists) !=0): $stt =1;?>
        <?php foreach($lists as $row): ?>
            <tr>
                <td><?=$stt?></td>
                <td><?=$row->name?></td>
                <td><?=$row->opt->name?></td>
                <td>
                    <?php if(!empty($row->color)): ?>
                        <div style="width: 40px; height: 40px; background-color: <?=$row->color?>"></div>
                    <?php endif; ?>
                    <?php if(!empty($row->image)): ?>
                        <img style="width: 40px; height: 40px" src="<?=base_url('upload/img/products').'/'.$row->pro_dir.'/'.$row->image?>">
                    <?php endif; ?>
                </td>
                <td>
                    <a class="btn btn-primary" href="javascript:;" onclick="edit_val(<?=$row->description_id?>)">Sửa</a>
                    <a class="btn btn-danger" href="<?=base_url('users/user_del').'/'.$row->description_id?>">Xóa</a>
                </td>
            </tr>
        <?php $stt++; endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<script type="text/javascript">
    function edit_val(vid)
    {
        $.ajax({
            type: 'GET',
            dataType: 'html',
            url: '<?=base_url('users/user_edit')?>',
            data: {vid:vid},
            success: function(rs)
            {
                $('#box-val').html(rs);
                $('#user_editv').modal();
            }
        });
    }
</script>