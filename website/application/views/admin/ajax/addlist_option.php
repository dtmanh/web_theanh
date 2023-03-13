<style>
    .clearfix-20 {
        clear: both;
        height: 20px;
    }
</style>
<div class="">
    <label for="sel1">Required:</label>
    <select name="required_op" class="form-control" id="sel1">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>
<div class="clearfix-20"></div>
<?php foreach($options as $v): ?>
<?php if($v->type == 'select' || $v->type == 'radio' || $v->type == 'checkbox'): ?>
    <input type="hidden" id="option_id" value="<?=$id?>">
    <div class="table-responsive">
        <table id="option-value" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <td>Option value</td>
                <td style="width: 10%">Số lượng hiển thị</td>
                <td style="width: 10%">Subtract Stock</td>
                <td>Thêm/Giảm tiền</td>
                <!--<td>Points</td>
                <td>Weight</td>-->
                <td></td>
            </tr>
            </thead>
            <tbody>

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
    <div class="">
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

