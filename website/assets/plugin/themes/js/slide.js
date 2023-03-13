var slide = (function (slideEl, listCount, durationMiniseconds) {
    var slideObject = this;

    slideObject.showSilde = function (idx) {
        var slideTop = 0;
        for (var i = 0; i < parseInt(idx) ; i++) {
            slideTop -= $('.img-idx-' + i, slideEl).height();
        }
        var nav = $('.nav-idx-' + idx, slideEl);
        if (!nav.hasClass('active')) {
            $('.slider-nav-panel', slideEl).removeClass('active');
            nav.addClass('active');
        }
        slideObject.$ulSlideMain.stop().animate({ top: -1 * $('.img-idx-' + idx).first().data('top') });
    }



    slideObject.doSlide = function () {
        slideObject.showSilde(slideObject._idx);
        slideObject._idx++;
        if (slideObject._idx >= slideObject.$slideNavs.length)
            slideObject._idx = 0;

        slideObject.timmerId = window.setTimeout(slideObject.doSlide, durationMiniseconds);
    }

    slideObject.stopSlide = function () {
        if (slideObject.timmerId) {
            window.clearTimeout(slideObject.timmerId);
            slideObject.timmerId = 0;
        }
    }

    slideObject.init = function (successCallback) {
        if ($(slideEl).length > 0) {
            var $slide = $(slideEl);
            var base_url  = $('#base_url').val();
            slideObject.$slide = $slide;
            slideObject.$ulSlideMain = $('.slider-main', $slide);
            slideObject.$ulSlideMain.css({ position: 'relative' });
            slideObject.$slideNav = $('.slider-nav-main', $slide);
            $('.slider-nav', $slide).hide();
            slideObject.$slideImgs = new Array();
            slideObject.$slideNavs = new Array();
            slideObject.$ulSlideMain.append('<li style="text-align:center"><img style="padding:100px;width:auto!important;height:auto!important" src="'+base_url+'assets/img/loader.gif"/></li>');
            $.getJSON(base_url +'/home/getSlides', { request: 'slide', catid: $slide.data('catid'), format_type: 'json' }, function (data) {
                slideObject.$ulSlideMain.empty();
                if (data && data.slide && data.slide.length > 0) {
                    slideObject.ListCount = listCount;
                    var start = 0;
                    if (data.slide.length < listCount) {
                        slideObject.ListCount = data.slide.length;
                    } else {
                        //Chạy random lúc bắt đầu
                        //start = Math.round(Math.random() * slideObject.ListCount);
                    }

                    var slides = data.slide;
                    /*slide viewer*/

                    for (var i = 0; i < slideObject.ListCount; i++) {
                        var ii = i + start;
                        if (ii >= slides.length)
                            ii = ii - slides.length;
                        var o = slides[ii];

                        /*Append main view*/
                        (function (viewer, obj, idx) {
                            var $li = $(document.createElement('li'));
                            $li.addClass('slider-panel');
                            $li.appendTo(viewer);
                            $li.prop('id', obj.id);
                            $li.data('index', idx);
                            $li.hover(function () {
                                slideObject.stopSlide();
                            }, function () {
                                slideObject.doSlide();
                            })

                            var $a = $(document.createElement('a'));
                            $a.prop('href', obj.link);
                            $a.prop('target', '_blank');
                            $a.appendTo($li);

                            var $img = $(document.createElement('img'));
                            $img.prop('src', obj.img);
                            $img.addClass('img_' + obj.id);
                            $img.addClass('img-idx-' + idx);
                            $img.appendTo($a);
                            $img.one("load", function () {
                                $(this).data('top', $(this).offset().top - slideObject.$slide.offset().top);
                                //var x = $(this).offset().top - slideObject.$slide.offset().top;
                                //alert(x);
                                //$(this).data('top','0');
                                //Tính toán để fix slide có độ cao bằng ảnh
                                if ($(window).width() <= 600) {
                                    if ($slide.data('sizefixed') != '1') {
                                        $slide.data('sizefixed', '1');
                                        $slide.stop().animate({ height: $(this).outerHeight(), marginBottom: 10 }, 'fast');
                                    }
                                }
                                //console.log($(this).data('top'));
                            }).each(function () {
                                if (this.complete) $(this).load();
                            });

                            slideObject.$slideImgs.push($li);

                        })(slideObject.$ulSlideMain, o, i);

                        /*Append nav view*/
                        (function (nav, obj, idx) {
                            var $li = $(document.createElement('li'));
                            $li.addClass('slider-nav-panel');
                            $li.addClass('nav-idx-' + idx);
                            $li.addClass('nav_' + obj.id);
                            $li.appendTo(nav);
                            $li.data('index', idx);
                            $li.data('slideid', obj.id);

                            $li.hover(function () {
                                //$(this).addClass('active');
                                slideObject.stopSlide();
                                slideObject._idx = parseInt($(this).data('index'));
                                slideObject.showSilde($(this).data('index'));
                            }, function () {
                                $(this).removeClass('active');
                                slideObject.doSlide();
                            })


                            var $a = $(document.createElement('a'));
                            $a.prop('href', o.link);
                            $a.prop('target', '_blank');
                            $a.data('slideid', obj.id);
                            $a.appendTo($li);



                            var $span = $(document.createElement('span'));
                            $span.addClass('slider-nav-img');
                            $span.appendTo($a);

                            var $img = $(document.createElement('img'));
                            $img.prop('src', obj.thumb);
                            $img.css({ width: '100%', height: '100%' });
                            $img.appendTo($span);

                            var $h3 = $(document.createElement('h3'));
                            $h3.addClass('slider-nav-title');
                            $h3.html(obj.desc + '<i>' + obj.client + '</i>');
                            $h3.appendTo($a);

                            slideObject.$slideNavs.push($li);

                        })(slideObject.$slideNav, o, i);
                        $('.slider-nav', $slide).show();
                    }
                    successCallback();
                }
            });
        }
    }


    slideObject.init(function () {
        slideObject._idx = Math.floor(Math.random() * slideObject.$slideNavs.length);
        slideObject.doSlide();
    });

    $(window).on('beforeunload', function () {
        slideObject.stopSlide();
    });

    return slideObject;
})('#slider', 5, 10000);