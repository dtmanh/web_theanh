<style>
    .clearfix-20 {
        clear: both;
        height: 20px;
    }
</style>
<input type="hidden" name="to_ids" value="<?=$to_id?>">
<div class="col-md-12">
        <div class="">
            <label for="sel1">Required:</label>
            <select name="required_op" class="form-control" id="sel1">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="clearfix-20"></div>

        <?php if(count($pro_option) != 0): ?>
        <?php foreach($pro_option as $v): ?>
                <input type="hidden" value="<?=$v->option_id?>" id="option_id"/>
        <?php if($v->type == 'select' || $v->type == 'radio' || $v->type == 'checkbox'): ?>
            <div class="table-responsive">
                <table id="option-value" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>Option value</td>
                        <td style="width: 15%">Số lượng hiển thị</td>
                        <td style="width: 15%">Subtract Stock</td>
                        <td>Thêm/Giảm tiền</td>
                        <td style="width: 5%"></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($pro_option as $k => $row): ?>
                        <?php $item = $row->item; ?>
                        <?php $itemss = $row->items; ?>

                        <?php foreach($itemss as $items): ?>
                        <tr>
                            <td>

                                <select name="option_value[]" class="form-control">
                                    <?php foreach($item as $v): ?>
                                    <option <?php ($v->description_id == $items->description_id) ? print 'selected="selected"' : ''; ?> value="<?=$v->description_id?>"><?=$v->name?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <input type="number" name="quantity[]" value="<?=$items->quantity?>" placeholder="Quantity" class="form-control">
                            </td>
                            <td>
                                <select name="product_option[]" class="form-control">
                                    <option value="1" <?php if($items->subtract == 1) {echo 'selected="selected"';}?>>Yes</option>
                                    <option value="0" <?php if($items->subtract == 0) {echo 'selected="selected"';}?>>No</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="price_op[]" value="<?=$items->price?>" placeholder="Price" class="form-control">
                            </td>
                            <td>
                                <a href="<?=base_url('techadmin/product/del')?>/<?=$items->id ?>" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove">
                                    <i class="fa fa-minus-circle"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <td colspan="4"></td>
                    <td>
                        <input type="hidden" id="temps" value="0" />
                        <button type="button" onclick="addValue();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Option Value"><i class="fa fa-plus-circle"></i></button>
                    </td>
                    </tfoot>
                </table>
            </div>
        <?php elseif($v->type == 'text' || $v->type == 'textarea'): ?>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
            </div>
        <?php else: ?>
            <?php $chon = $v->type;?>
            <?php switch($chon){
                    case $chon == 'date':
                    echo '<input type="text" name="datetime" value="" placeholder="Option Value" data-date-format="YYYY-MM-DD" id="input-value2" class="form-control">';
                    break;
                    case $chon == 'time':
                    echo '<input type="text" name="datetime" value="" placeholder="Option Value" data-date-format="HH:mm" id="input-value2" class="form-control">';
                    break;
                    case $chon == 'datetime':
                    echo '<input type="text" name="datetime" value="" placeholder="Option Value" data-date-format="YYYY-MM-DD" id="input-value2" class="form-control">';
                    break;
                    default:
                    break;
            } ?>
        <?php endif; ?>
        <?php endforeach; ?>
       <?php endif; ?>

</div>

