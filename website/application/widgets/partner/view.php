
<div id="slider2_container" style="position: relative;
                border: 1px solid #cccccc; margin-bottom: 10px;
                top: 0px; left: 0px; width:  1069px; height: 110px; overflow: hidden; ">
    <!-- Slides Container -->
    <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1069px; height: 110px; overflow: hidden;">
        <?php foreach($partners as $partner):  ?>
            <div>
                <img u="image" alt="amazon" src="<?=base_url($partner->link)?>" />
            </div>
        <?php endforeach;?>
    </div>
</div>