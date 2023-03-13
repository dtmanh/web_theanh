<?php if(count($attris)) : ?>
    <?php foreach($attris as $attr) : ?>
        <?php if($attr->type=='text') : ?>
            <div class="form-group">
                <label class="col-sm-2"><?=@$attr->name;?></label>
                <div class="col-sm-5">
                    <textarea name="attribute_value_<?=$attr->id;?>[]" class="form-control" rows="5"><?php if(isset($provalues)) : ?><?php foreach($provalues as $proval) : ?><?php if($proval->attr_id == $attr->id){echo $proval->value;} ?><?php endforeach;?><?php endif; ?></textarea>
                    <input type="hidden" name="attr_id[]" value="<?=@$attr->id?>">
                </div>
            </div>
        <?php endif;?>
        <?php if($attr->type=='selectbox') : ?>
            <div class="form-group">
                <label class="col-sm-3"><?=@$attr->name;?></label>
                <div class="col-sm-5">
                    <select name="attribute_value_<?=@$attr->id?>[]" class="form-control">
                        <?php foreach($values as $value) : ?>
                            <?php if($value->atrr_id == $attr->id) : ?>
                                <option value="<?=@$value->atrr_id;?>"><?=@$value->values;?></option>
                            <?php endif;?>
                        <?php endforeach;?>
                        <input type="hidden" name="attr_id[]" value="<?=@$attr->id?>">
                    </select>
                </div>
            </div>
        <?php endif;?>
        <?php if($attr->type=='checkbox' || $attr->type=='number') : ?>
            <div class="form-group">
                <label class="col-sm-3"><?=@$attr->name;?></label>
                <div class="col-sm-5">
                    <?php foreach($values as $value) : ?>
                        <?php if($value->atrr_id == $attr->id) : ?>
                                <input <?php if(isset($provalues)) : ?><?php foreach($provalues as $proval) : ?><?php if($proval->value == $value->id){echo "checked";} ?><?php endforeach;?><?php endif; ?> type="checkbox" name="attribute_value_<?=$value->atrr_id;?>[]" value="<?=$value->id;?>">
                                &nbsp;
                                <label><?=@$value->values;?></label><br>
                        <?php endif;?>
                    <?php endforeach;?>
                    <input type="hidden" name="attr_id[]" value="<?=@$attr->id?>">
                </div>
            </div>
        <?php endif;?>
    <?php endforeach;?>
<?php endif;?>