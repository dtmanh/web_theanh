<!DOCTYPE html>
<html lang="vi-VN">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
        <script>if(navigator.userAgent.match(/MSIE|Internet Explorer/i)||navigator.userAgent.match(/Trident\/7\..*?rv:11/i)){var href=document.location.href;if(!href.match(/[?&]nowprocket/)){if(href.indexOf("?")==-1){if(href.indexOf("#")==-1){document.location.href=href+"?nowprocket=1"}else{document.location.href=href.replace("#","?nowprocket=1#")}}else{if(href.indexOf("#")==-1){document.location.href=href+"&nowprocket=1"}else{document.location.href=href.replace("#","&nowprocket=1#")}}}}</script><script>class RocketLazyLoadScripts{constructor(e){this.triggerEvents=e,this.eventOptions={passive:!0},this.userEventListener=this.triggerListener.bind(this),this.delayedScripts={normal:[],async:[],defer:[]},this.allJQueries=[]}_addUserInteractionListener(e){this.triggerEvents.forEach((t=>window.addEventListener(t,e.userEventListener,e.eventOptions)))}_removeUserInteractionListener(e){this.triggerEvents.forEach((t=>window.removeEventListener(t,e.userEventListener,e.eventOptions)))}triggerListener(){this._removeUserInteractionListener(this),"loading"===document.readyState?document.addEventListener("DOMContentLoaded",this._loadEverythingNow.bind(this)):this._loadEverythingNow()}async _loadEverythingNow(){this._delayEventListeners(),this._delayJQueryReady(this),this._handleDocumentWrite(),this._registerAllDelayedScripts(),this._preloadAllScripts(),await this._loadScriptsFromList(this.delayedScripts.normal),await this._loadScriptsFromList(this.delayedScripts.defer),await this._loadScriptsFromList(this.delayedScripts.async),await this._triggerDOMContentLoaded(),await this._triggerWindowLoad(),window.dispatchEvent(new Event("rocket-allScriptsLoaded"))}_registerAllDelayedScripts(){document.querySelectorAll("script[type=rocketlazyloadscript]").forEach((e=>{e.hasAttribute("src")?e.hasAttribute("async")&&!1!==e.async?this.delayedScripts.async.push(e):e.hasAttribute("defer")&&!1!==e.defer||"module"===e.getAttribute("data-rocket-type")?this.delayedScripts.defer.push(e):this.delayedScripts.normal.push(e):this.delayedScripts.normal.push(e)}))}async _transformScript(e){return await this._requestAnimFrame(),new Promise((t=>{const n=document.createElement("script");let i;[...e.attributes].forEach((e=>{let t=e.nodeName;"type"!==t&&("data-rocket-type"===t&&(t="type",i=e.nodeValue),n.setAttribute(t,e.nodeValue))})),e.hasAttribute("src")&&this._isValidScriptType(i)?(n.addEventListener("load",t),n.addEventListener("error",t)):(n.text=e.text,t()),e.parentNode.replaceChild(n,e)}))}_isValidScriptType(e){return!e||""===e||"string"==typeof e&&["text/javascript","text/x-javascript","text/ecmascript","text/jscript","application/javascript","application/x-javascript","application/ecmascript","application/jscript","module"].includes(e.toLowerCase())}async _loadScriptsFromList(e){const t=e.shift();return t?(await this._transformScript(t),this._loadScriptsFromList(e)):Promise.resolve()}_preloadAllScripts(){var e=document.createDocumentFragment();[...this.delayedScripts.normal,...this.delayedScripts.defer,...this.delayedScripts.async].forEach((t=>{const n=t.getAttribute("src");if(n){const t=document.createElement("link");t.href=n,t.rel="preload",t.as="script",e.appendChild(t)}})),document.head.appendChild(e)}_delayEventListeners(){let e={};function t(t,n){!function(t){function n(n){return e[t].eventsToRewrite.indexOf(n)>=0?"rocket-"+n:n}e[t]||(e[t]={originalFunctions:{add:t.addEventListener,remove:t.removeEventListener},eventsToRewrite:[]},t.addEventListener=function(){arguments[0]=n(arguments[0]),e[t].originalFunctions.add.apply(t,arguments)},t.removeEventListener=function(){arguments[0]=n(arguments[0]),e[t].originalFunctions.remove.apply(t,arguments)})}(t),e[t].eventsToRewrite.push(n)}function n(e,t){let n=e[t];Object.defineProperty(e,t,{get:()=>n||function(){},set(i){e["rocket"+t]=n=i}})}t(document,"DOMContentLoaded"),t(window,"DOMContentLoaded"),t(window,"load"),t(window,"pageshow"),t(document,"readystatechange"),n(document,"onreadystatechange"),n(window,"onload"),n(window,"onpageshow")}_delayJQueryReady(e){let t=window.jQuery;Object.defineProperty(window,"jQuery",{get:()=>t,set(n){if(n&&n.fn&&!e.allJQueries.includes(n)){n.fn.ready=n.fn.init.prototype.ready=function(t){e.domReadyFired?t.bind(document)(n):document.addEventListener("rocket-DOMContentLoaded",(()=>t.bind(document)(n)))};const t=n.fn.on;n.fn.on=n.fn.init.prototype.on=function(){if(this[0]===window){function e(e){return e.split(" ").map((e=>"load"===e||0===e.indexOf("load.")?"rocket-jquery-load":e)).join(" ")}"string"==typeof arguments[0]||arguments[0]instanceof String?arguments[0]=e(arguments[0]):"object"==typeof arguments[0]&&Object.keys(arguments[0]).forEach((t=>{delete Object.assign(arguments[0],{[e(t)]:arguments[0][t]})[t]}))}return t.apply(this,arguments),this},e.allJQueries.push(n)}t=n}})}async _triggerDOMContentLoaded(){this.domReadyFired=!0,await this._requestAnimFrame(),document.dispatchEvent(new Event("rocket-DOMContentLoaded")),await this._requestAnimFrame(),window.dispatchEvent(new Event("rocket-DOMContentLoaded")),await this._requestAnimFrame(),document.dispatchEvent(new Event("rocket-readystatechange")),await this._requestAnimFrame(),document.rocketonreadystatechange&&document.rocketonreadystatechange()}async _triggerWindowLoad(){await this._requestAnimFrame(),window.dispatchEvent(new Event("rocket-load")),await this._requestAnimFrame(),window.rocketonload&&window.rocketonload(),await this._requestAnimFrame(),this.allJQueries.forEach((e=>e(window).trigger("rocket-jquery-load"))),window.dispatchEvent(new Event("rocket-pageshow")),await this._requestAnimFrame(),window.rocketonpageshow&&window.rocketonpageshow()}_handleDocumentWrite(){const e=new Map;document.write=document.writeln=function(t){const n=document.currentScript;n||console.error("WPRocket unable to document.write this: "+t);const i=document.createRange(),r=n.parentElement;let a=e.get(n);void 0===a&&(a=n.nextSibling,e.set(n,a));const o=document.createDocumentFragment();i.setStart(o,0),o.appendChild(i.createContextualFragment(t)),r.insertBefore(o,a)}}async _requestAnimFrame(){return new Promise((e=>requestAnimationFrame(e)))}static run(){const e=new RocketLazyLoadScripts(["keydown","mousemove","touchmove","touchstart","touchend","wheel"]);e._addUserInteractionListener(e)}}RocketLazyLoadScripts.run();</script>
      <meta charset="UTF-8">

      <title><?= isset($seo['title']) && $seo['title'] != '' ? $seo['title'] : @$this->option->site_name; ?></title>
      <link rel="shortcut icon" href="<?= base_url(@$this->option->favicon ) ?>"/>
      <meta name='description'
            content='<?= isset($seo['description']) ? $seo['description'] : @$this->option->site_description; ?>'/>
      <meta name='keywords'
            content='<?= isset($seo['keyword']) && $seo['keyword'] != '' ? $seo['keyword'] : $this->option->site_keyword; ?>'/>
      <meta name='robots' content='index,follow'/>
      <meta name='revisit-after' content='1 days'/>
      <meta http-equiv='content-language' content='vi'/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="alternate" media="only screen and (max-width: 640px)" href="<?=base_url()?>" />
      <link rel="canonical" href="<?=current_url();?>" />
      <!--    for facebook-->
      <meta property="og:title"
            content="<?= isset($seo['title']) && $seo['title'] != '' ? $seo['title'] : @$this->option->site_name; ?>"/>
      <meta property="og:site_name" content="<?= @$this->option->site_name; ?>"/>
      <meta property="og:url" content="<?= current_url(); ?>"/>
      <meta property="og:description"
            content="<?= isset($seo['description']) && $seo['description'] != '' ? $seo['description'] : @$this->option->site_description; ?>"/>
      <meta property="og:type" content="<?= @$seo['type']; ?>"/>
      <meta property="og:image" content="<?= isset($seo['image']) && @$seo['image'] != '' ? base_url(@$seo['image']) : @$this->option->site_logo ; ?>"/>

      <meta property="og:locale" content="vi_VN"/>

      <!-- for Twitter -->
      <meta name="twitter:card"
            content="<?= isset($seo['description']) && $seo['description'] != '' ? $seo['description'] : @$this->option->site_description; ?>"/>
      <meta name="twitter:title"
            content="<?= isset($seo['title']) && $seo['title'] != '' ? $seo['title'] : @$this->option->site_name; ?>"/>
      <meta name="twitter:description"
            content="<?= isset($seo['description']) && $seo['description'] != '' ? $seo['description'] : @$this->option->site_description; ?>"/>
      <meta name="twitter:image"
            content="<?= isset($seo['image']) && $seo['image'] != '' ? base_url($seo['image']) : base_url(@$this->option->site_logo); ?>"/>
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <link rel='preload'  href='<?=base_url()?>assets/css/front_end/style.css?ver=3.1' data-rocket-async="style" as="style" onload="this.onload=null;this.rel='stylesheet'" type='text/css' media='all' />
    <script type="rocketlazyloadscript" data-rocket-type='text/javascript' src='<?=base_url()?>assets/js/front_end/jquery.min.js?ver=3.6.1' id='jquery-core-js'></script>
    <link rel="preload" href="<?=base_url()?>assets/css/fonts/hustle-icons-font.woff2" as="font" type="font/woff2" crossorigin-->
     
     <link rel="preload" href="https://1office.vn/wp-content/cache/min/1/28399084e4bf3007c57d7d86db91bc0f.css" data-rocket-async="style" as="style" onload="this.onload=null;this.rel='stylesheet'" media="all" data-minify="1" />
   </head>
   <body class="home page-template-default page page-id-2">
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=126821687974504";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div id="fb-root"></div>
    <div id="body-overlay"></div>
    <div id="overlay-support-center"></div>

  
    <div id="menu-mobile">
        <div class="close-menu">
        <div id="close-menu-mobile">
            &times;
        </div>
        </div>
        <div class="menu">
        <ul>
            <li>
                <a href="support-docs/index.html">
                Hỗ trợ
                </a>
            </li>
            <li class="has-child-2">
                <a class="blog">
                Blog
                <span>
                &#43;
                </span>
                </a>
                <div class="child-2">
                    <ul>
                    <li>
                        <a href="category/blog/kien-thuc-quan-tri/index.html">
                        Kiến thức Quản trị                            </a>
                    </li>
                    <li>
                        <a href="thu-vien-tai-nguyen/index.html">
                        Thư viện Tài nguyên                            </a>
                    </li>
                    </ul>
                </div>
            </li>
            <li class="has-child-3">
                <a class="blog">
                Tin tức
                <span>
                &#43;
                </span>
                </a>
                <div class="child-3">
                    <ul>
                    <li>
                        <a href="https_/1office.vn/category/bao-chi-va-su-kien/index.html">
                        Báo chí & Sự kiện                            </a>
                    </li>
                    <li>
                        <a href="https_/1office.vn/category/tinh-nang-moi/index.html">
                        Cập nhật tính năng mới                            </a>
                    </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="khach-hang/index.html">
                Khách hàng
                </a>
            </li>
            <li class="has-child-4">
                <a class="price">
                Bảng giá
                <span>
                &#43;
                </span>
                </a>
                <div class="child-4">
                    <ul>
                    <li>
                        <a href="bang-gia/index.html">
                        Gói On Cloud                            </a>
                    </li>
                    <li>
                        <a href="bang-gia-chu-ky-so/index.html">
                        Gói Chữ ký số                            </a>
                    </li>
                    </ul>
                </div>
            </li>
            <li class="has-child-1">
                <a class="feature">
                Tính năng 
                <span>
                &#43;
                </span>
                </a>
                <div class="child-1">
                    <ul>
                    <li>
                        <a href="workplace-6-2-2/index.html">
                            <div class="title">
                                Workplace								
                            </div>
                            <div class="content">
                                Phân hệ cung cấp bộ công cụ cho nhân viên có thể làm việc và giao tiếp nội bộ.								
                            </div>
                        </a>
                        <div id="show-more-mobile">
                            <div class="more">
                                <span class="more-or-cut" data-click="0">Mở rộng</span>
                                <span class="icon">
                                <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/commons/Vector-2.svg" />
                                <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/commons/Vector-2.svg" /></noscript>
                                </span>
                            </div>
                            <ul id="sub-sub-menu">
                                <li>
                                <a href="mang-noi-bo.html">
                                    <div class="title">
                                        Mạng nội bộ											
                                    </div>
                                    <div class="content">
                                        Truyền thông & giao tiếp nội bộ											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="chu-ky-so.html">
                                    <div class="title">
                                        Chữ ký số											
                                    </div>
                                    <div class="content">
                                        Ký duyệt văn bản trực tiếp trong quy trình											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="cong-viec.html">
                                    <div class="title">
                                        Công việc											
                                    </div>
                                    <div class="content">
                                        Giám sát tiến độ 24/7											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="quy-trinh.html">
                                    <div class="title">
                                        Quy trình											
                                    </div>
                                    <div class="content">
                                        Số hóa toàn bộ quy trình											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="du-an.html">
                                    <div class="title">
                                        Dự án											
                                    </div>
                                    <div class="content">
                                        Quản lý dự án chi tiết											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="tai-lieu.html">
                                    <div class="title">
                                        Tài liệu											
                                    </div>
                                    <div class="content">
                                        Lưu trữ tài liệu tập trung											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="lich-bieu.html">
                                    <div class="title">
                                        Lịch biểu											
                                    </div>
                                    <div class="content">
                                        Quản lý lịch biểu khoa học											
                                    </div>
                                </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="crm-2/index.html">
                            <div class="title">
                                Crm								
                            </div>
                            <div class="content">
                                Phân hệ cung cấp bộ công cụ quản lý marketing, bán hàng, chăm sóc khách hàng.								
                            </div>
                        </a>
                        <div id="show-more-mobile">
                            <div class="more">
                                <span class="more-or-cut" data-click="0">Mở rộng</span>
                                <span class="icon">
                                <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/commons/Vector-2.svg" />
                                <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/commons/Vector-2.svg" /></noscript>
                                </span>
                            </div>
                            <ul id="sub-sub-menu">
                                <li>
                                <a href="marketing.html">
                                    <div class="title">
                                        Marketing											
                                    </div>
                                    <div class="content">
                                        Điều hành, đánh giá chiến dịch											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="cham-soc-khach-hang">
                                    <div class="title">
                                        Chăm sóc khách hàng											
                                    </div>
                                    <div class="content">
                                        Quản lý thông tin tập trung											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="ban-hang.html">
                                    <div class="title">
                                        Bán hàng											
                                    </div>
                                    <div class="content">
                                        Quản lý & chăm sóc khách hàng											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="mua-hang.html">
                                    <div class="title">
                                        Mua hàng											
                                    </div>
                                    <div class="content">
                                        Quản lý hàng hóa, nhà cung cấp											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="hang-hoa-kho.html">
                                    <div class="title">
                                        Hàng hóa kho											
                                    </div>
                                    <div class="content">
                                        Quản lý xuất - nhập - tồn											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="so-quy">
                                    <div class="title">
                                        Sổ quỹ											
                                    </div>
                                    <div class="content">
                                        Số hóa phê duyệt & lưu trữ											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="tien-ich.html">
                                    <div class="title">
                                        Tiện ích											
                                    </div>
                                    <div class="content">
                                        Kết nối tổng đài điện thoại											
                                    </div>
                                </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="hrm-3/index.html">
                            <div class="title">
                                Hrm								
                            </div>
                            <div class="content">
                                Phân hệ cung cấp bộ công cụ dành cho công tác quản trị nguồn nhân lực công ty.								
                            </div>
                        </a>
                        <div id="show-more-mobile">
                            <div class="more">
                                <span class="more-or-cut" data-click="0">Mở rộng</span>
                                <span class="icon">
                                <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/commons/Vector-2.svg" />
                                <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/commons/Vector-2.svg" /></noscript>
                                </span>
                            </div>
                            <ul id="sub-sub-menu">
                                <li>
                                <a href="quan-ly-tuyen-dung.html">
                                    <div class="title">
                                        Tuyển dụng											
                                    </div>
                                    <div class="content">
                                        Quản lý quy trình tuyển dụng											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="phan-mem-quan-ly-nhan-su.html">
                                    <div class="title">
                                        Nhân sự											
                                    </div>
                                    <div class="content">
                                        Lưu trữ thông tin tập trung											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="danh-gia-nang-luc.html">
                                    <div class="title">
                                        Đánh giá năng lực ASK											
                                    </div>
                                    <div class="content">
                                        Đánh giá năng lực trực quan											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="cham-cong.html">
                                    <div class="title">
                                        Chấm công											
                                    </div>
                                    <div class="content">
                                        Đồng bộ dữ liệu chấm công											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="tien-luong.html">
                                    <div class="title">
                                        Tiền lương											
                                    </div>
                                    <div class="content">
                                        Tính lương tự động 24/7											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="quan-ly-kpi.html">
                                    <div class="title">
                                        Quản lý KPI											
                                    </div>
                                    <div class="content">
                                        Quản lý, đánh giá KPI											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="tai-san.html">
                                    <div class="title">
                                        Tài sản											
                                    </div>
                                    <div class="content">
                                        Quản lý thông tin tài sản											
                                    </div>
                                </a>
                                </li>
                                <li>
                                <a href="don-tu.html">
                                    <div class="title">
                                        Đơn từ											
                                    </div>
                                    <div class="content">
                                        Tạo & duyệt đơn Online											
                                    </div>
                                </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <div class="title">
                                ADVANCE
                            </div>
                            <div class="content">
                                Phân hệ cung cấp bộ công cụ dành cho việc cấu hình các quy trình tự động hóa doanh nghiệp
                            </div>
                        </a>
                    </li>
                    </ul>
                </div>
            </li>
        </ul>
        </div>
        <div class="button-website mobile-button text-center">
        <a href="javascript:void(0)" id="btn-registration">
            Đăng ký dùng thử
            <span>
                <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/commons/Vector.svg" />
                <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/commons/Vector.svg" /></noscript>
            </span>
        </a>
        </div>
    </div>
    <div id="start-page">
         <div id="header-sticky">
            <div class="container">
               <header id="header-page">
                  <div class="logo-header">
                     <a href="index.html" id="logo">
                        <img width="169" height="57" src="https://1office.vn/wp-content/uploads/2020/06/logo-1office.png" alt="Nền tảng quản trị tổng thể doanh nghiệp tiên phong trong chuyển đổi số" data-lazy-src="https://1office.vn/wp-content/uploads/2020/06/logo-1office.png">
                        <noscript><img width="169" height="57" src="https://1office.vn/wp-content/uploads/2020/06/logo-1office.png" alt="Phần mềm 1Office &#8211; Nền tảng quản lý tổng thể doanh nghiệp" alt="Nền tảng quản trị tổng thể doanh nghiệp tiên phong trong chuyển đổi số"></noscript>
                     </a>
                  </div>
                  <ul class="main-menu">
                     <li class="item-menu has-sub-menu" id="has-drop-menu">
                        <a>
                        Tính năng
                        </a>
                        <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/commons/arrow.svg"/>
                        <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/commons/arrow.svg"/></noscript>
                     </li>
                     <li class="item-menu has-sub-menu">
                        <a>
                        Bảng giá
                        </a>
                        <img class="active-arrow" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/commons/arrow.svg"/>
                        <noscript><img class="active-arrow" src="https://1office.vn/wp-content/themes/1office/images/icons/commons/arrow.svg"/></noscript>
                        <ul id="sub-main-menu" class="active-submenu">
                           <li>
                              <a href="bang-gia/index.html">
                              Gói On Cloud                                            </a>
                           </li>
                           <li>
                              <a href="bang-gia-chu-ky-so/index.html">
                              Gói Chữ ký số                                            </a>
                           </li>
                        </ul>
                     </li>
                     <li class="item-menu has-sub-menu">
                        <a href="khach-hang/index.html">
                        Khách hàng                                </a>
                        <img class="" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/commons/arrow.svg"/>
                        <noscript><img class="" src="https://1office.vn/wp-content/themes/1office/images/icons/commons/arrow.svg"/></noscript>
                        <ul id="sub-main-menu" class="">
                        </ul>
                     </li>
                     <li class="item-menu has-sub-menu">
                        <a href="tin-tuc/index.html">
                        Tin tức                                </a>
                        <img class="active-arrow" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/commons/arrow.svg"/>
                        <noscript><img class="active-arrow" src="https://1office.vn/wp-content/themes/1office/images/icons/commons/arrow.svg"/></noscript>
                        <ul id="sub-main-menu" class="active-submenu">
                           <li>
                              <a href="category/bao-chi-va-su-kien.html">
                              Báo chí & Sự kiện                                        </a>
                           </li>
                           <li>
                              <a href="category/tinh-nang-moi">
                              Cập nhật tính năng mới                                        </a>
                           </li>
                        </ul>
                     </li>
                     <li class="item-menu has-sub-menu">
                        <a href="blog/index.html">
                        Blog                                </a>
                        <img class="active-arrow" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/commons/arrow.svg"/>
                        <noscript><img class="active-arrow" src="https://1office.vn/wp-content/themes/1office/images/icons/commons/arrow.svg"/></noscript>
                        <ul id="sub-main-menu" class="active-submenu">
                           <li>
                              <a href="category/blog/kien-thuc-quan-tri/index.html">
                              Kiến thức Quản trị                                        </a>
                           </li>
                           <li>
                              <a href="thu-vien-tai-nguyen/index.html">
                              Thư viện Tài nguyên                                        </a>
                           </li>
                        </ul>
                     </li>
                     <li class="item-menu has-sub-menu">
                        <a href="support-docs/index.html">
                        Hỗ trợ                                </a>
                        <img class="" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/commons/arrow.svg"/>
                        <noscript><img class="" src="https://1office.vn/wp-content/themes/1office/images/icons/commons/arrow.svg"/></noscript>
                        <ul id="sub-main-menu" class="">
                        </ul>
                     </li>
                  </ul>
                  <div class="button-menu">
                     <a id="btn-registration">
                        <span>Đăng ký</span>
                        <span>
                           <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/commons/Vector-2.svg" />
                           <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/commons/Vector-2.svg" /></noscript>
                        </span>
                     </a>
                  </div>
                  <div id="open-mobile-menu">
                     <div class="all-line" id="button-open-mobile-menu">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                     </div>
                  </div>
               </header>
            </div>
         </div>
         <div class="section-full-width">
            <div id="drop-menu">
               <div class="container">
                  <div class="row-drop-menu">
                     <div class="col-drop-menu" id="workplace">
                        <div class="header">
                           <a href="workplace-6-2-2/index.html" class="name" >
                           Workplace                                        </a>
                           <div class="infor">
                              Phân hệ cung cấp bộ công cụ cho nhân viên có thể làm việc và giao tiếp nội bộ.                                        
                           </div>
                        </div>
                        <div class="list-drop">
                           <a href="mang-noi-bo.html" class="drop">
                              <span class="icon">
                                 <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/menu/mang-noi-bo.svg">
                                 <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/menu/mang-noi-bo.svg"></noscript>
                              </span>
                              <span class="name">
                              Mạng nội bộ                                                </span>
                              <span class="infor">
                              Truyền thông & giao tiếp nội bộ                                                </span>
                           </a>
                        </div>
                        <div class="list-drop">
                           <a href="chu-ky-so.html" class="drop">
                              <span class="icon">
                                 <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/menu/chu-ky.svg">
                                 <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/menu/chu-ky.svg"></noscript>
                              </span>
                              <span class="name">
                              Chữ ký số                                                </span>
                              <span class="infor">
                              Ký duyệt văn bản trực tiếp trong quy trình                                                </span>
                           </a>
                        </div>
                        <div class="list-drop">
                           <a href="cong-viec.html" class="drop">
                              <span class="icon">
                                 <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/menu/cong-viec.svg">
                                 <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/menu/cong-viec.svg"></noscript>
                              </span>
                              <span class="name">
                              Công việc                                                </span>
                              <span class="infor">
                              Giám sát tiến độ 24/7                                                </span>
                           </a>
                        </div>
                     </div>
                     <div class="col-drop-menu" id="hrm">
                        <div class="header">
                           <a href="hrm-3/index.html" class="name" >
                           Hrm                                        </a>
                           <div class="infor">
                              Phân hệ cung cấp bộ công cụ dành cho công tác quản trị nguồn nhân lực công ty.                                        
                           </div>
                        </div>
                        <div class="list-drop">
                           <a href="quan-ly-tuyen-dung.html" class="drop">
                              <span class="icon">
                                 <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/menu/tuyen-dung.svg">
                                 <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/menu/tuyen-dung.svg"></noscript>
                              </span>
                              <span class="name">
                              Tuyển dụng                                                </span>
                              <span class="infor">
                              Quản lý quy trình tuyển dụng                                                </span>
                           </a>
                        </div>
                        <div class="list-drop">
                           <a href="phan-mem-quan-ly-nhan-su.html" class="drop">
                              <span class="icon">
                                 <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/menu/ho-so-nhan-su.svg">
                                 <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/menu/ho-so-nhan-su.svg"></noscript>
                              </span>
                              <span class="name">
                              Nhân sự                                                </span>
                              <span class="infor">
                              Lưu trữ thông tin tập trung                                                </span>
                           </a>
                        </div>
                        <div class="list-drop">
                           <a href="don-tu.html" class="drop">
                              <span class="icon">
                                 <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/menu/don-tu.svg">
                                 <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/menu/don-tu.svg"></noscript>
                              </span>
                              <span class="name">
                              Đơn từ                                                </span>
                              <span class="infor">
                              Tạo & duyệt đơn Online                                                </span>
                           </a>
                        </div>
                     </div>
                     <div class="col-drop-menu" id="crm">
                        <div class="header">
                           <a href="crm-2/index.html" class="name" >
                           Crm                                        </a>
                           <div class="infor">
                              Phân hệ cung cấp bộ công cụ quản lý marketing, bán hàng, chăm sóc khách hàng.                                        
                           </div>
                        </div>
                        <div class="list-drop">
                           <a href="marketing.html" class="drop">
                              <span class="icon">
                                 <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/menu/mkt.svg">
                                 <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/menu/mkt.svg"></noscript>
                              </span>
                              <span class="name">
                              Marketing                                                </span>
                              <span class="infor">
                              Điều hành, đánh giá chiến dịch                                                </span>
                           </a>
                        </div>
                        <div class="list-drop">
                           <a href="cham-soc-khach-hang" class="drop">
                              <span class="icon">
                                 <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/menu/cskh.svg">
                                 <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/menu/cskh.svg"></noscript>
                              </span>
                              <span class="name">
                              Chăm sóc khách hàng                                                </span>
                              <span class="infor">
                              Quản lý thông tin tập trung                                                </span>
                           </a>
                        </div>
                        <div class="list-drop">
                           <a href="ban-hang.html" class="drop">
                              <span class="icon">
                                 <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" data-lazy-src="https://1office.vn/wp-content/themes/1office/images/icons/menu/ban-hang.svg">
                                 <noscript><img src="https://1office.vn/wp-content/themes/1office/images/icons/menu/ban-hang.svg"></noscript>
                              </span>
                              <span class="name">
                              Bán hàng                                                </span>
                              <span class="infor">
                              Quản lý & chăm sóc khách hàng                                                </span>
                           </a>
                        </div>
                     </div>
                     <div class="col-drop-menu" id="advance">
                        <div class="header">
                           <a href="index.html#/" class="name" >
                           Advance                                        </a>
                           <div class="infor">
                              Phân hệ cung cấp bộ công cụ cho việc cấu hình quy trình tự động hóa doanh nghiệp.                                        
                           </div>
                        </div>
                        <div class="list-drop">
                           <div class="button-advance">
                              <a>
                              Tìm hiểu thêm
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>



