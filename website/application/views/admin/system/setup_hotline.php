                    <form name="formbk" method="post" action="">
                        <table id="example" class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th width="2%" class="no-sort">STT</th>
                                    <th width="15%">Tên check box</th>
                                    <th width="5%" class="no-sort text-center">Hiện thị trái/ phải (1/0)</th>
                                    <th width="3%" class="no-sort text-center"> Hiện thị </th>
                                </tr>

                            </thead>

                            <tbody>
                                 <?php if (isset($config_hotline)) {
                                    $stt=0;
                                    foreach ($config_hotline as $key=>$v) { $stt++;
                                        ?>
                                <tr>
                                    <td class="text-center"><?=$stt;?></td>
                                     <td><?=@$v->name?></td>
                                    <td class="text-center">
                                        <input type="text" data-id="<?=@$v->id ?>" data-view="color" data-placement="config_checkpro" class="form-control input-sm " oninput="update_value($(this))" name="color"
            value="<?=@$v->color;?>" placeholder=""/>
                                    </td>
                                    <td class="text-center">
                                        <label class="view_color view_active" data-value="<?=$v->id;?>" data-placement="config_checkpro" data-view="active">
                                            <input type="checkbox" <?=$v->active==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
                                                   data-on="Yes" data-off="No">
                                        </label>
                                    </td>
                                </tr>
                                <?php }  } ?>
                            </tbody>

                        </table>
                    </form> 