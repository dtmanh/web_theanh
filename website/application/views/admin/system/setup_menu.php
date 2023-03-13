<table id="example" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="2%" class="text-center no-sort">STT</th>
            <th width="15%">Tên hiển thị</th>
            <th width="4%" class="no-sort text-center">Tên trường</th>
            <th width="1%" class="no-sort text-center"> Hiện thị </th>
        </tr>
    </thead>
    <tbody>
         <?php if (isset($config_menu)) {
            $stt=0;
            foreach ($config_menu as $key=>$m) { $stt++;
                ?>
        <tr>
            <td class="text-center"><?=$stt;?></td>
             <td><input type="text" data-id="<?=@$m->id ?>" data-view="name" data-placement="config_menu" class="form-control input-sm " oninput="update_value($(this))" name="name"
            value="<?=@$m->name;?>" placeholder=""/></td>
             <td class="text-center"><?=@$m->type;?></td>
            <td class="text-center">
                <label class="view_color view_active" data-value="<?=@$m->id;?>" data-placement="config_menu" data-view="active">
                    <input type="checkbox" <?=@$m->active==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                           data-on="Yes" data-off="No">
                </label>
            </td>
        </tr>
		<?php }  } ?>	
    </tbody>

</table>