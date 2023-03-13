<?php if (count($news_hot)) { ?>
    <li class="knswli clearfix done-get-type done-get-sticker">
        <div class="featuredcn clearfix">
            <div class="editor-pick-onstream">
                <div class="editor-pick-header">
                    <div class="ep-header-icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <rect width="30" height="30" rx="15" fill="#FF6115"></rect>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M15 7C15.2768 7 15.5296 7.15419 15.6521 7.39775L17.7304 11.5289L22.3779 12.1954C22.6518 12.2347 22.8792 12.4231 22.9645 12.6814C23.0499 12.9398 22.9784 13.2232 22.7801 13.4127L19.4178 16.6261L20.2113 21.1658C20.2581 21.4335 20.146 21.7041 19.922 21.8637C19.698 22.0234 19.4011 22.0444 19.156 21.918L15 19.7734L10.844 21.918C10.5989 22.0444 10.302 22.0234 10.078 21.8637C9.85404 21.7041 9.74186 21.4335 9.78866 21.1658L10.5822 16.6261L7.21985 13.4127C7.02158 13.2232 6.95011 12.9398 7.03548 12.6814C7.12084 12.4231 7.34825 12.2347 7.62211 12.1954L12.2696 11.5289L14.3479 7.39775C14.4704 7.15419 14.7232 7 15 7ZM15 9.32582L13.4049 12.4966C13.299 12.707 13.0945 12.8529 12.8579 12.8869L9.28977 13.3986L11.8711 15.8656C12.0426 16.0295 12.1209 16.2658 12.0805 16.4974L11.4714 19.9817L14.6615 18.3356C14.8734 18.2262 15.1266 18.2262 15.3385 18.3356L18.5286 19.9817L17.9195 16.4974C17.8791 16.2658 17.9574 16.0295 18.1289 15.8656L20.7102 13.3986L17.1421 12.8869C16.9055 12.8529 16.701 12.707 16.5951 12.4966L15 9.32582Z"
                                  fill="white"></path>
                        </svg>
                    </div>
                    <div class="ep-header-text">Editor's Pick</div>
                </div>
                <div class="editor-pick-news">
                    <?php $i=0; foreach ($news_hot as $key => $new) { $i++; ?>
                        <div class="ep-news-big">
                            <div class="ep-news-big-ava">
                                <a href="<?= base_url('new/'.$new->alias.'.html')?>"
                                   title="<?= $new->title?>"
                                   class="kscliw-ava"
                                   style="background-image: url('<?= base_url($new->image)?>')"></a>
                            </div>
                            <h3 class="knswli-title ep-news-big-title">
                                <a href="<?= base_url('new/'.$new->alias.'.html')?>"
                                   title="<?= $new->title?>"><?= $new->title?></a>
                            </h3>
                            <div class="knswli-meta">
                                <a href="<?= base_url('danh-muc-tin/'.$new->category_alias.'.html') ?>" class="knswli-category"><?= ($new->category_name); ?></a>
                            </div>
                            <div class="knswli-sapo"><?= LimitString($new->description, 600, '...'); ?>
                            </div>
                        </div>
                        <?php if($i==1){ break; }  } ?>
                    <div class="ep-news-small">
                        <ul class="ep-news-small-ul">
                            <?php $i=0; foreach ($news_hot as $key => $new) { $i++; ?>
                                <?php if($i>=2){ ?>
                                    <li class="ep-news-small-li">
                                        <div class="ep-news-small-ava">
                                            <a href="<?= base_url('new/'.$new->alias.'.html')?>"
                                               title="<?= $new->title?>"
                                               class="kscliw-ava"
                                               style="background-image: url('<?= base_url($new->image)?>')"></a>
                                        </div>
                                        <h3 class="ep-news-small-title">
                                            <a href="<?= base_url('new/'.$new->alias.'.html')?>" title="<?= $new->title?>"><?= $new->title?></a>
                                        </h3>
                                    </li>
                                <?php } } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END editor-pick-onstream -->
        </div>
    </li>
    <div data-ad-frame="vn2"></div>
    <?php } ?>
<!-- S3-->
<?php if (count($news_hot_4)) { ?>
<div data-check-position="k14_home_b3_start"></div>
<div class="blockstream1" data-marked-zoneid="kenh14_home_bs3">
    <?php $i=0; foreach ($news_hot as $key => $new) { $i++; ?>
    <li class="knswli need-get-value-facebook clearfix  done-get-type done-get-sticker"
        rel="wrapt-newstype">
        <div class="knswli-left fl">

            <a href="<?= base_url('new/'.$new->alias.'.html')?>"
               class="kscliw-ava" title="" newsid="<?= $new->id?>" newstype="0"
               rel="newstype " init-sapo-type="" init-sapo-value="">
                <video class="lozad-video"
                       poster="<?= base_url($new->image)?>"
                       autoplay="true" muted="" loop="true"
                       data-src="<?= base_url($new->image)?>"></video>
            </a>

        </div>
        <div class="knswli-right">

            <h3 class="knswli-title">
                <a href="<?= base_url('new/'.$new->alias.'.html')?>"
                   title="" newsid="<?= $new->id?>" data-sticker=""
                   data-stickerurl="" newstype="0" type="0"
                   rel="<?= base_url('new/'.$new->alias.'.html')?>">
                    <?= $new->title?>
                </a>
            </h3>
            <div class="knswli-meta">
                <a href="<?= base_url('danh-muc-tin/'.$new->category_alias.'.html') ?>" class="knswli-category"><?= ($new->category_name); ?></a>-
                <span class="knswli-time" title="<?=date("d/m/Y",$new->time);?>"
                      data-second="<?=date("d/m/Y",$new->time);?>"><?=date("d/m/Y",$new->time);?></span>

            </div>
            <span class="knswli-sapo sapo-need-trim"><?= LimitString($new->description, 400, '...'); ?></span>
        </div>
    </li>
    <?php }  ?>
</div>
<?php } ?>