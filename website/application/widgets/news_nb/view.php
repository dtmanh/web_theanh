<?php if (is_array($news)) {
                    foreach ($news as $key => $new) { ?>
<li class="ep-news-small-li">
                                    <div class="ep-news-small-ava">
                                        <a href="<?= base_url('new/'.$new->alias.'.html')?>"
                                           title="<?= $new->title?>"
                                           class="kscliw-ava"
                                           style="background-image: url('<?= base_url($new->image)?>')"></a>
                                    </div>
                                    <h3 class="ep-news-small-title">
                                        <a href="<?= base_url('new/'.$new->alias.'.html')?>"
                                           title="<?= $new->title?>"><?= $new->title?></a>
                                    </h3>
                                </li>

                    <?php   }
                } ?>
