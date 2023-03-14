(function($) {
    // Sticky menu
    $(function() {
        $("#event").click(function(event) {
            this.paused ? this.play() : this.pause();
        });
        $('#home-page #btn-registration').click(function(e) {
            e.preventDefault();
        })

        $(window).bind('scroll', function() {
            if ($(window).scrollTop() > 150) {
                $('#header-sticky').addClass('is-sticky');
            } else {
                $('#header-sticky').removeClass('is-sticky');
            }
        });
        // Open Menu Mobile 
        $("#button-open-mobile-menu").click(function() {
            $("#menu-mobile").addClass("active");
            $("#body-overlay").addClass("active");
            $("body").css("overflow", "hidden");
        });
        // Close Menu Mobile
        $("#close-menu-mobile").click(function() {
            $("#menu-mobile").removeClass("active");
            $("#body-overlay").removeClass("active");
            $("body").css("overflow", "visible");
        });
        $(window).on('click', function(e) {
            if ($(e.target).is('#body-overlay')) {
                $("#menu-mobile").removeClass("active");
                $("#body-overlay").removeClass("active");
            }
        });
        // Open sub menu in mobile menu
        $("#menu-mobile .has-child-1 .feature").click(function() {
            $("#menu-mobile .has-child-1 .child-1").fadeToggle(500);
        });
        $("#menu-mobile .has-child-2 .blog").click(function() {
            $("#menu-mobile .has-child-2 .child-2").fadeToggle(500);
        });
        $("#menu-mobile .has-child-3 .blog").click(function() {
            $("#menu-mobile .has-child-3 .child-3").fadeToggle(500);
        });
        $("#menu-mobile .has-child-4 .price").click(function() {
            $("#menu-mobile .has-child-4 .child-4").fadeToggle(500);
        });
        // Open multiple sub menu mobile menu
        $('#menu-mobile .has-child-1 #show-more-mobile').click(function(){
            $('#menu-mobile .has-child-1 #show-more-mobile').removeClass("active");
            $(this).toggleClass('active');
        });
        // Popup form
        $("body #btn-registration").click(function() {
            $("#pop-up-block").addClass("active");
            $('body').css("overflow", "hidden");
            $("#pop-up-block").show();
        });

        // Popup call
        $("body #call-for-ip").click(function() {
            $("#popup-call").fadeIn();
        });
        $("#popup-call #close-popup").click(function() {
            console.log(1);
            $("#popup-call").hide("400");
        });
        $("#close-popup").click(function() {
            $("#pop-up-block").addClass("active");
            $('body').css("overflow", "visible");
            $("#pop-up-block").hide();
        });
        $(window).on('click', function(e) {
            if ($(e.target).is('#pop-up-block')) {
                $("#pop-up-block").hide();
                $('body').css("overflow", "visible");
            }
        });
        // Popup form 2
        $("body #btn-registration-2").click(function() {
            $("#pop-up-block-2").addClass("active");
            $('body').css("overflow", "hidden");
            $("#pop-up-block-2").show();
        });
        $("#pop-up-block-2 #close-popup-2").click(function() {
            $("#pop-up-block-2").addClass("active");
            $('body').css("overflow", "visible");
            $("#pop-up-block-2").hide();
        });
        $(window).on('click', function(e) {
            if ($(e.target).is('#pop-up-block-2')) {
                $("#pop-up-block-2").hide();
                $('body').css("overflow", "visible");
            }
        });
        // Popup form in single post
        $("body .popmake-330").click(function() {
            $("#pop-up-block").addClass("active");
            $('body').css("overflow", "hidden");
            $("#pop-up-block").show();
        });
        $("#close-popup").click(function() {
            $("#pop-up-block").addClass("active");
            $('body').css("overflow", "visible");
            $("#pop-up-block").hide();
        });
        $(window).on('click', function(e) {
            if ($(e.target).is('#pop-up-block')) {
                $("#pop-up-block").hide();
                $('body').css("overflow", "visible");
            }
        });
        
        // Disable submit form after submit
        var disableSubmit = false;
        $('#submit.wpcf7-submit').click(function() {
            $(this).attr('value',"Đang gửi...")
            if (disableSubmit == true) {
                return false;
            }
            disableSubmit = true;
            return true;
        })
        var form1 = document.querySelector( '#wpcf7-f7420-o1' );
        form1.addEventListener( 'wpcf7submit', function( event ) {
            $('#submit.wpcf7-submit').attr('value',"Đăng ký ngay")
            disableSubmit = false;
        }, false );

        $('#submit-2.wpcf7-submit').click(function() {
            $(this).attr('value',"Đang gửi...")
            if (disableSubmit == true) {
                return false;
            }
            disableSubmit = true;
            return true;
        });
        var form2 = document.querySelector( '#wpcf7-f15194-o2' );
        form2.addEventListener( 'wpcf7submit', function( event ) {
            $('#submit-2.wpcf7-submit').attr('value',"Đăng ký tham gia")
            disableSubmit = false;
        }, false );
        // Print output after fill form
        form1.addEventListener( 'wpcf7submit', function() {
            var result = $("#alert-notifi");
            var resultForm = $(".wpcf7-response-output");
            result.append(resultForm);
        });
        form2.addEventListener( 'wpcf7submit', function() {
            var result = $("#alert-notifi-2");
            var resultForm = $(".wpcf7-response-output");
            result.append(resultForm);
        });

        $(document).on('wpcf7mailsent', function(event) {
            window.location.href = 'https://1office.vn/thankyou_partner';
        });

        // Show overlay image in post support center 
        $(".support-page .body-support .main-content #post-support .content img").click(function() {
            $("#overlay-support-center").slideToggle();
            $('#close-all-overlay').show();
            $("#overlay-support-center").append("<img src=" + $(this).attr("src") + " />");
            $('#header-sticky').removeClass('is-sticky');
            $("body").css("overflow", "hidden");
        });

        $(".feature-page .image-banner img").click(function() {
            $("#overlay-support-center").slideToggle();
            $('#close-all-overlay').show();
            $("#overlay-support-center").append("<img src=" + $(this).attr("src") + " />");
            $('#header-sticky').removeClass('is-sticky');
            $("body").css("overflow", "hidden");
        });

        $('#close-all-overlay').click(function() {
            $(this).hide();
            $("#overlay-support-center").hide();
            $("#overlay-support-center").empty();
            $('body').css("overflow", "visible");
        });
        
        // Drop menu
        $('#has-drop-menu').click(function(event){
            event.stopPropagation();
             $('#drop-menu').slideToggle();
             $('#overview-support').hide();
        });
        $('#drop-menu').on("click", function (event) {
            event.stopPropagation();
        });
        $(document).on("click", function () {
            $('#drop-menu').hide();
        });

        $('#has-drop-menu-support').click(function(event){
            event.stopPropagation();
             $('#overview-support').slideToggle();
             $('#drop-menu').hide();
        });
        $('#overview-support').on("click", function (event) {
            event.stopPropagation();
        });
        $(document).on("click", function () {
            $('#overview-support').hide();
        });

        // Open video overlay
        $('#video-overlay').click(function() {
            $('#video-overlay #video').css('display', "block");
        });
        
        $(window).on('click', function(e) {
            if ($(e.target).is('#video-overlay #video')) {
                $('#video-overlay #video').css('display', "none");
            }
        });
        $(document).keyup(function(e) {
            if (e.keyCode === 27) {
                $('#video-overlay #video').css('display', "none");
            }
        });
        // Open video overlay section customer
        $('#section-customer .box-customer .img-customer').click(function () {
            video = $(this).next().html();
            $('#section-video-overlay #video').css('display', "block");
            $('#section-video-overlay #video #video-customer').append(video);
        });

        $(window).on('click', function(e) {
            if ($(e.target).is('#section-video-overlay #video')) {
                $('#section-video-overlay #video').css('display', "none");
                $('#section-video-overlay #video #video-customer').empty();
            }
        });
        $(document).keyup(function(e) {
            if (e.keyCode === 27) {
                $('#section-video-overlay #video').css('display', "none");
                $('#section-video-overlay #video #video-customer').empty();
            }
        });
        // Slide of Home Page
        var home = new Swiper('#home-page .swiper-container', {
            spaceBetween: 30,
            slidesPerGroup: 1,
            autoplay: {
                delay: 3000,
            },
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '#home-page .swiper-pagination',
                clickable: true,
            },
            speed: 1500,
            breakpoints: {
                1024: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 2.3
                },
                640: {
                    slidesPerView: 1.6
                },
                425: {
                    slidesPerView: 1.2,
                    spaceBetween: 15
                },
                375: {
                    slidesPerView: 1,
                },
            },
        });

        // Slide of news lien quan
        var home = new Swiper('#list-all-post .swiper-container', {
            preventClicks: true,
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
            },
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '#list-all-post .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '#list-all-post .swiper-button-next',
                prevEl: '#list-all-post .swiper-button-prev',
            },
            speed: 1500,
            breakpoints: {
                1024: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 2.3
                },
                640: {
                    slidesPerView: 1.6
                },
                425: {
                    slidesPerView: 1.2,
                    spaceBetween: 15
                },
                375: {
                    slidesPerView: 1,
                },
            },
        });
        // Tab menu in home page 
        $('#home-page .news .nav-tab #tab-post').click(function () {
            $(this).addClass('active');
            $('#home-page .news #post-news').addClass('active');

            $('#home-page .news .nav-tab #tab-video').removeClass('active');
            $('#home-page .news #post-video').removeClass('active');
        });
        $('#home-page .news .nav-tab #tab-video').click(function () {
            $(this).addClass('active');
            $('#home-page .news #post-video').addClass('active');

            $('#home-page .news .nav-tab #tab-post').removeClass('active');
            $('#home-page .news #post-news').removeClass('active');
        });
        // Open video in home page
        $('#home-page #post-video .box-news').click(function () {
            video = $(this).next().html();
            $('#body-overlay').addClass('active');
            $('#body-overlay').append(video);
        });
         // Open video in customer page
        $('#customer-page #post-video .box-news').click(function () {
            video = $(this).next().html();
            $('#body-overlay').addClass('active');
            $('#body-overlay').append(video);
        });
        // Slide video in customer page
        var home = new Swiper('#customer-page .list-news #post-video .swiper-container', {
            spaceBetween: 30,
            slidesPerGroup: 1,
            autoplay: {
                delay: 3000,
            },
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '#customer-page .list-news #post-video .swiper-pagination',
                clickable: true,
            },
            speed: 1500,
            breakpoints: {
                1024: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 2.3
                },
                640: {
                    slidesPerView: 1.6
                },
                425: {
                    slidesPerView: 1.2,
                    spaceBetween: 15
                },
                375: {
                    slidesPerView: 1,
                },
            },
        });
        // Slide logo in customer page
        var home = new Swiper('#customer-page .customer ul .swiper-container', {
            spaceBetween: 30,
            slidesPerGroup: 1,
            autoplay: {
                delay: 3000,
            },
            loop: true,
            loopFillGroupWithBlank: true,
            speed: 3000,
            breakpoints: {
                1024: {
                    slidesPerView: 5
                },
                768: {
                    slidesPerView: 4
                },
                640: {
                    slidesPerView: 3
                },
                425: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                375: {
                    slidesPerView: 1,
                },
            },
        });
        $(window).on('click', function(e) {
            if ($(e.target).is('#body-overlay')) {
                $('#body-overlay').removeClass('active');
                $('#body-overlay').empty();
            }
        });
        $(document).keyup(function(e) {
            if (e.keyCode === 27) {
                $('#body-overlay').removeClass('active');
                $('#body-overlay').empty();
            }
        });
        // Slide of Recruitment Page
        var recruitment = new Swiper('#recruitment-page .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
            },
            pagination: {
                el: '#recruitment-page .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '#recruitment-page .swiper-button-next',
                prevEl: '#recruitment-page .swiper-button-prev',
            },
            speed: 1500,
        });
       
        // Slide of tin lien quan
        var mostPost = new Swiper('.category-page .list-all-post .swiper-container', {
            preventClicks: true,
            slidesPerView: 2.3,
            spaceBetween: 30,
            loop: false,
            autoplay: {
                delay: 3000,
            },
            navigation: {
                nextEl: '.category-page .list-all-post .swiper-button-next',
                prevEl: '.category-page .list-all-post .swiper-button-prev',
            },
            speed: 1500,
            breakpoints: {
                1024: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 3
                },
                640: {
                    slidesPerView: 2
                },
                425: {
                    slidesPerView: 1,
                    spaceBetween: 15
                },
                375: {
                    slidesPerView: 1
                },
            }
        });

        // Slide of Most Post
        var mostPost = new Swiper('.category-page .slide-most-post .swiper-container', {
            preventClicks: true,
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
            },
            navigation: {
                nextEl: '.category-page .slide-most-post .swiper-button-next',
                prevEl: '.category-page .slide-most-post .swiper-button-prev',
            },
            speed: 1500,
            breakpoints: {
                1024: {
                    slidesPerView: 4
                },
                768: {
                    slidesPerView: 3
                },
                640: {
                    slidesPerView: 2
                },
                425: {
                    slidesPerView: 1.2,
                    spaceBetween: 15
                },
                375: {
                    slidesPerView: 1
                },
            }
        });
        // Slide of Slide Post
        var slidePost = new Swiper('.category-page .slide-post .swiper-container', {
            slidesPerView: 1,
            autoplay: {
                delay: 3000,
            },
            loop: true,
            navigation: {
                nextEl: '.category-page .slide-post .swiper-button-next',
                prevEl: '.category-page .slide-post .swiper-button-prev',
            },
            speed: 1500,
        });
        // Slide of Related Post
        var relatedPost = new Swiper('#single-post .related-post .swiper-container', {
            slidesPerView: 4,
            spaceBetween: 30,
            autoplay: {
                delay: 3000,
            },
            loop: true,
            navigation: {
                nextEl: '#single-post .related-post .swiper-button-next',
                prevEl: '#single-post .related-post .swiper-button-prev',
            },
            speed: 1500,
        });
        // Slide of Section Common Customer
        var sectionCustomer = new Swiper('#section-customer .swiper-container', {
            slidesPerView: 1,
            autoplay: {
                delay: 3000,
            },
            navigation: {
                nextEl: '#section-customer .swiper-button-next',
                prevEl: '#section-customer .swiper-button-prev',
            },
            speed: 1500,
        });
        // Slide of Related Post
        var relatedPost = new Swiper('#single-post .related-post .swiper-container', {
            slidesPerView: 4,
            spaceBetween: 30,
            autoplay: {
                delay: 3000,
            },
            loop: true,
            navigation: {
                nextEl: '#single-post .related-post .swiper-button-next',
                prevEl: '#single-post .related-post .swiper-button-prev',
            },
            speed: 1500,
        });
        // Select of filter bar
        var city = $("#recruitment-page #city #selected-city");
        var id_city = $("#recruitment-page #city #city-id");
        city.click(function() {
            $("#recruitment-page #city .list-select ul").toggle(function() {
                $("#recruitment-page #city .list-select ul").each(function() {
                    $("#recruitment-page #city .list-select ul li").click(function() {
                        city.text($.trim($(this).text()));
                        id_city.text($(this).attr("data-id"));
                        $("#recruitment-page #city .list-select ul").hide();
                    });
                });
            });
        });
        var position = $("#recruitment-page #position #selected-position");
        var id_position = $("#recruitment-page #position #position-id");
        position.click(function() {
            $("#recruitment-page #position .list-select ul").toggle(function() {
                $("#recruitment-page #position .list-select ul").each(function() {
                    $("#recruitment-page #position .list-select ul li").click(function() {
                        position.text($.trim($(this).text()));
                        id_position.text($(this).attr("data-id"));
                        $("#recruitment-page #position .list-select ul").hide();
                    });
                });
            });
        });
        // Slide of Customer Page
        var customer = new Swiper('#customer-page .bgr-slide .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {
                delay: 3000,
            },
            loop: true,
            pagination: {
                el: '#customer-page .bgr-slide .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '#customer-page .bgr-slide .swiper-button-next',
                prevEl: '#customer-page .bgr-slide .swiper-button-prev',
            },
            speed: 1500,
        });
        var $btn = $('#button-top-scroll');
        $(window).scroll(function() {
            var act = $(window).scrollTop() > 300 ? 'addClass' : 'removeClass';
            $btn[act]('show');
        });

        $('#button-top-scroll').click(function(e) {
            alert(111);
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, '300');
        }, false , 1000);
        
        // Filter recruitment
        $(document).on('click', '#recruitment-page #button-fillter', function() {
            var valCity = [];
            var valJob = [];
            valCity = $("#recruitment-page #city #city-id").text();
            valJob = $("#recruitment-page #position #position-id").text();
            $.ajax({
                type: 'get',
                dataType: 'text',
                url: '/wp-admin/admin-ajax.php',
                data: {
                    'action': 'ajax_filter',
                    valCity: valCity,
                    valJob: valJob
                },
                success: function(result) {
                    $('#ajax-results').html(result);
                }
            });
        });

        // Show price page
        $("#price-page .main-price .infor-price .title").click(function() {
            $("#price-page .main-price .infor-price .list-option").addClass("show");
            $("#price-page .main-price .infor-price .close-list-price").css("display","block");
        });
        $("#price-page .main-price .infor-price .close-list-price").click (function() {
            $("#price-page .main-price .infor-price .list-option").removeClass("show");
            $("#price-page .main-price .infor-price .close-list-price").css("display","none");
        })
        // Show faq
        $(".main-faq .list-faq .item-faq").click(function() {
            $(".main-faq .list-faq .item-faq").removeClass("active");
            $(this).toggleClass('active');
        });

        // Show faq in faq page
        $('#faq-page .list-tip-cate .item .title-post').bind('click',function () {
            $(this).addClass('active');
            $(this).next().slideToggle();
        });

        $(window).on('load',function() {
            $('.ab-kite-wrapper').append('<div id='+'"call-to-action"'+'>Gọi cho chúng tôi<div>');
        });

        $('#category-document .list-category>li').each(function(index) {
            $('#category-document .list-category>li[data-index=' + index + ']').click(function() {
                var status = $(this).attr('data-click');
                if (status == 0) {
                    $(this).attr('data-click','1');
                    $(this).addClass('active');
                    $('#category-document .list-category>li[data-index=' + index + '] .sub-list').slideToggle(500);
                } else if (status == 1) {
                    $(this).removeClass('active');
                    $(this).attr('data-click','0');
                    $('#category-document .list-category>li[data-index=' + index + '] .sub-list').hide(500);
                }
            });
        });
        $('.menu-category-responsive .title').click(function() {
            $('.menu-category-responsive .main-menu').slideToggle();
        });
        $('body').ready(function() {
            $('.lead-form .hidden-1 option').first().attr('hidden','hidden');
            $('.lead-form .hidden-2 option').first().attr('hidden','hidden');
            $('.lead-form .hidden-3 option').first().attr('hidden','hidden');
            $('.lead-form .hidden-4 option').first().attr('hidden','hidden');
            $('.lead-form .hidden-5 option').first().attr('hidden','hidden');
            $('.lead-form .hidden-6 option').first().attr('hidden','hidden');
            $('.lead-form .hidden-7 option').first().attr('hidden','hidden');
        });
        // Section full width in child page feature. Style 3
        // Add class active to first child in section option and section image
        $('.section-add-more #style-add-3 .options .item[data-index=' + 1 + ']').addClass('active');
        $('.section-add-more #style-add-3 .imgs .img[data-index=' + 1 + ']').addClass('active');


        $(".section-add-more #style-add-3 .options .item").click(function() {
            $(".section-add-more #style-add-3 .options .item").removeClass("active");
            $(this).toggleClass('active');
            var index = $(this).attr('data-index');
            $(".section-add-more #style-add-3 .imgs .img").removeClass("active");
            $('.section-add-more #style-add-3 .imgs .img[data-index=' + index + ']').addClass('active');

        });

        $('.section-add-more #style-add-3 .imgs .img').click(function() {
            $("#overlay-support-center").slideToggle();
            $('#close-all-overlay').show();
            $("#overlay-support-center").append("<img src=" + $(this).find('img').attr("src") + " />");
            $('#header-sticky').removeClass('is-sticky');
            $("body").css("overflow", "hidden");
        });

        // Set padding: 0 cho những section nền màu trắng
        $('.section-add-more').each(function() {
            if ( $(this).attr('style') == 'background: #ffffff' || $(this).attr('style') == '' || $(this).attr('style') == 'background: #FFFFFF' ) {
                $(this).css('padd\ing','0')
            }
        })

        // Bảng giá CKS
        $('#price-page #group-1 .nav-tabs #tab-enterprise').click(function () {
            $(this).addClass('active');
            $('#price-page #group-1 #price-enterprise').addClass('active');

            $('#price-page #group-1 .nav-tabs #tab-public').removeClass('active');
            $('#price-page #group-1 #price-public').removeClass('active');
        });
        $('#price-page #group-1 .nav-tabs #tab-public').click(function () {
            $(this).addClass('active');
            $('#price-page #group-1 #price-public').addClass('active');

            $('#price-page #group-1 .nav-tabs #tab-enterprise').removeClass('active');
            $('#price-page #group-1 #price-enterprise').removeClass('active');
        });

        $('#price-page #group-3 .nav-tabs #tab-once').click(function () {
            $(this).addClass('active');
            $('#price-page #group-3 #price-once').addClass('active');

            $('#price-page #group-3 .nav-tabs #tab-more').removeClass('active');
            $('#price-page #group-3 #price-more').removeClass('active');
        });
        $('#price-page #group-3 .nav-tabs #tab-more').click(function () {
            $(this).addClass('active');
            $('#price-page #group-3 #price-more').addClass('active');

            $('#price-page #group-3 .nav-tabs #tab-once').removeClass('active');
            $('#price-page #group-3 #price-once').removeClass('active');
        });

        // Show price page
        $("#price-page .price-premise .main-price .infor-price .title").click(function() {
            $("#price-page .price-premise .main-price .infor-price .list-option").addClass("show");
            $("#price-page .price-premise .main-price .infor-price .close-list-price").css("display","block");
        });
        $("#price-page .price-premise .main-price .infor-price .close-list-price").click (function() {
            $("#price-page .price-premise .main-price .infor-price .list-option").removeClass("show");
            $("#price-page .price-premise .main-price .infor-price .close-list-price").css("display","none");
        })
    });
})(jQuery);