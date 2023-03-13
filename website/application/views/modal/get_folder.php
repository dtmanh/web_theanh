<label for="view">Vị trí</label>
<select class="form-control" name="sub_local">
	 <?php if (count($arr_home)): foreach ($arr_home as $key => $value): ?>
    <option value="<?= $value['name2']?>"><?= $value['name']?></option>
    <?php endforeach;endif; ?>
  </select>