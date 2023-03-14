<?php if (count($slides)) : ?>
<div class="section-full-width">
    <div class="bgr-color">
        <div class="container">
        <div class="customer">
            <div class="section-title">
                <h2>Báo chí, truyền hình nói về CLOUDGO </h2>
            </div>
            <div class="section-sub-title">
                <h3>Hãy xem báo chí, truyền hình nói gì về chúng tôi</h3>
            </div>
            <div class="list-customer">
                <ul>
                <?php foreach ($slides as $item) : ?>
                    <li>
                    <img width="1026" height="606" src="<?=base_url($item->image)?>" data-lazy-src="<?=base_url($item->image)?>">
                    <noscript><img width="1026" height="606" src="<?=base_url($item->image)?>"></noscript>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div>
<?php endif; ?>