<div class="content_right">
    <div style="padding: 10px" class="cover_connect">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-page" data-href="<?=@$this->option->site_fanpage?>" data-tabs="timeline" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?=@$this->option->site_fanpage?>" class="fb-xfbml-parse-ignore"><a href="<?=@$this->option->site_fanpage?>">Facebook</a></blockquote></div>
    </div>
</div>