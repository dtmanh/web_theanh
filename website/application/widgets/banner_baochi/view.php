<?php if (count($baochis)) : ?>
<div class="section-full-width">
    <div class="bgr-color">
        <div class="container">
        <div class="customer">
            <div class="section-title">
                <h2>Báo chí, truyền hình nói về CLOUDGO</h2>
            </div>
            <div class="section-sub-title">
                <h3>Hãy xem báo chí, truyền hình nói gì về chúng tôi</h3>
            </div>
            <div class="list-customer baochi">
                <ul>
                <?php foreach ($baochis as $img) : 
                    ?>
                    <li> 
                    <img width="1026" height="606" src="<?=base_url($img->image)?>" data-lazy-src="<?=base_url($img->image)?>">
                    <noscript><img width="1026" height="606" src="<?=base_url($img->image)?>"></noscript>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div>
<style>
    .customer .baochi ul li {
    position: relative;
    height: 100px;
    margin-bottom: 30px;
    height: 5rem;
    border: 1px solid #d9d9d9d9;
    border-radius: 16px;
    box-shadow: none;
    background: #fff;
    justify-content: center;
    align-items: center;
    padding: 1rem;
}
.customer .baochi ul li img{
    height: 100%; 
    object-fit: contain;
    position: inherit;
    max-height: 100%;
    max-width: 100%;
    width: auto;
    height: auto;
}
</style>
<?php endif; ?>
