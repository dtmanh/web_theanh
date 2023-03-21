<div id="price-page", class="price-contract">
  <div class="container">
      <div class="news">
      <div class="section-title">
          <h2><?=@$page->title;?></h2>
      </div>
      <div class="section-sub-title">
          <h3><?=@$page->description;?>
          </h3>
      </div>
      <div class="content-tab">
          <div class="table-content active" id="price-enterprise">
              <div class="main-price">
                  <div class="table-price">
                    <div class="section-table">
                        <?=@$page->content;?>
                    </div>
                  </div>
              </div>
              <div class="button-website text-center">
                  <a href="javascript:void(0)" id="btn-registration" class="btn-banggia">
                  Xem bang giá chi tiết
                  <span>
                      <img src="<?=base_url()?>assets/css/img/Vector.svg" data-lazy-src="<?=base_url()?>assets/css/img/Vector.svg" />
                      <noscript><img src="<?=base_url()?>assets/css/img/Vector.svg" /></noscript>
                  </span>
                  </a>
              </div>
          </div>
      </div>
      </div>
  </div>
</div>