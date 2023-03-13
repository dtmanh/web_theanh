<div class="support-hotline">
        <div class="div_title">
            <a data-toggle="modal" data-target="#myModal" class="d-sm-none d-none">
                <span class="icon"><i class="fa fa-phone"></i></span>
            </a>
            <a href="tel:<?= $this->option->hotline1?>" class="d-block">
                <span class="icon"><i class="fa fa-phone"></i></span>
            </a>
        </div>
        <div class="tel">
              <p class="fone"><a href="tel:<?= $this->option->hotline2?>"><?= $this->option->hotline2?></a></p>
          </div>
    </div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:red;font-size: 18px;">Mời bạn nhập thông tin. Chúng tôi sẽ gọi lại tư vấn</h4>
      </div>
      <div class="modal-body">
        <form method="post" name="form1" id="form1" class="login-content validate" action="<?= base_url('contact/add_email')?>">
                    <label class="username">
                        <input class="validate[required,custom[phone]] form-control"  name="phone" value="" type="text" autocomplete="on" placeholder="Mời bạn nhập số điện thoại">
                    </label>
                    <label class="password">
                        <input class="validate[required,custom[email]] form-control"  name="email" value="" type="text" placeholder="Email của bạn">
                    </label>
                    <button class="btn btn-primary"  onclick="return ValidateForm()" type="submit">Gửi yêu cầu!</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
    .modal-body {
    position: relative;
    padding: 15px;
}
.login-content {
    padding-left: 35px;
    background-color: white;
    margin-left: 5px;
    margin-right: 5px;
    height: auto;
    padding-top: 15px;
    overflow: hidden;
}.login-content label {
    display: block;
    padding-bottom: 7px;
}
</style>
<style>
<?php if($this->config_hotline->color==1){ ?>
.support-hotline{
    position: fixed;
        bottom: 5%;
    left: 30px;
    z-index: 50;
    pointer-events: none;
    /* display: none; */
}
<?php }else{?>
.support-hotline{
    position: fixed;
        bottom: 5%;
    right: 30px;
    z-index: 50;
    pointer-events: none;
    /* display: none; */
}
<?php } ?>

.support-hotline .div_title{
    position: relative;
    z-index: 20;
    pointer-events: auto;
    cursor: pointer;
    -webkit-transition:all 0.5s ease;
    -moz-transition:all 0.5s ease;
    -o-transition:all 0.5s ease;
    transition:all 0.5s ease;
    -webkit-transform:translate(0px,0);
    -moz-transform:translate(0px,0);
    -o-transform:translate(0px,0);
    -ms-transform:translate(0px,0);
    transform:translate(0px,0);
}
.support-hotline .div_title span.icon{
    width: 60px;
    height: 60px;
    position: relative;
    display: block;
}
.support-hotline .div_title span.icon:before{
    background-color: rgba(47,197,235,0.2);
    opacity: .75;
    top: -20px;
    left: -20px;
    right: -20px;
    bottom: -20px;
    position: absolute;
    content: '';
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    border: 2px solid transparent;
    -webkit-animation: quick-alo-circle-fill-anim 2.3s infinite ease-in-out;
    -moz-animation: quick-alo-circle-fill-anim 2.3s infinite ease-in-out;
    -ms-animation: quick-alo-circle-fill-anim 2.3s infinite ease-in-out;
    -o-animation: quick-alo-circle-fill-anim 2.3s infinite ease-in-out;
    animation: quick-alo-circle-fill-anim 2.3s infinite ease-in-out;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;
    -webkit-transform-origin: 50% 50%;
    -moz-transform-origin: 50% 50%;
    -ms-transform-origin: 50% 50%;
    -o-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
}
.support-hotline .div_title span.icon:after{
    top: -30px;
    left: -30px;
    right: -30px;
    bottom: -30px;
    position: absolute;
    content: '';
    background-color: transparent;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    border: 2px solid rgba(47,197,235,0.4);
    opacity: .1;
    -webkit-animation: quick-alo-circle-anim 1.2s infinite ease-in-out;
    -moz-animation: quick-alo-circle-anim 1.2s infinite ease-in-out;
    -ms-animation: quick-alo-circle-anim 1.2s infinite ease-in-out;
    -o-animation: quick-alo-circle-anim 1.2s infinite ease-in-out;
    animation: quick-alo-circle-anim 1.2s infinite ease-in-out;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;
    -webkit-transform-origin: 50% 50%;
    -moz-transform-origin: 50% 50%;
    -ms-transform-origin: 50% 50%;
    -o-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
}
.support-hotline .div_title i{
    position: relative;
    display: block;
    width: 100%;
    height: 100%;
    padding-top: 12px;
    background: #2fc5eb;
    font-size: 35px;
    line-height: 35px;
    text-align: center;
    color: #ffffff;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    border: 2px solid transparent;
    -webkit-animation: quick-alo-circle-img-anim 1s infinite ease-in-out;
    -moz-animation: quick-alo-circle-img-anim 1s infinite ease-in-out;
    -ms-animation: quick-alo-circle-img-anim 1s infinite ease-in-out;
    -o-animation: quick-alo-circle-img-anim 1s infinite ease-in-out;
    animation: quick-alo-circle-img-anim 1s infinite ease-in-out;
    -webkit-transform-origin: 50% 50%;
    -moz-transform-origin: 50% 50%;
    -ms-transform-origin: 50% 50%;
    -o-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
}
.support-hotline .div_title.show{
    -webkit-transform:translate(0,0);
    -moz-transform:translate(0,0);
    -o-transform:translate(0,0);
    -ms-transform:translate(0,0);
    transform:translate(0,0);
}
.support-hotline .div_title span.text a{
    display: block;
    position: absolute;
    bottom: 7px;
    width: 100%;
    text-align: center;
    color: #ffffff;
    font-size: 11px;
    line-height: 16px;
}
.support-hotline  .div_content{
    pointer-events: auto;
    width: 250px;
    position: absolute;
    top: 0;
    right: 85px;
    background-color: #fff;
    border: 2px solid #ff0000;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    -o-border-radius: 6px;
    -ms-border-radius: 6px;
    border-radius: 6px;
    -webkit-transform:translate(400px,0);
    -moz-transform:translate(400px,0);
    -o-transform:translate(400px,0);
    -ms-transform:translate(400px,0);
    transform:translate(400px,0);
    -webkit-transition:all 0.5s ease;
    -moz-transition:all 0.5s ease;
    -o-transition:all 0.5s ease;
    transition:all 0.5s ease;
    padding: 18px;
    color: #ffffff;
}
.support-hotline.show  .div_content{
    -webkit-transform:translate(0,0);
    -moz-transform:translate(0,0);
    -o-transform:translate(0,0);
    -ms-transform:translate(0,0);
    transform:translate(0,0);
}
.support-hotline  .div_content:before{
    position: absolute;
    content: '';
    top: 16px;
    right: -16px;
    border-left: 16px solid #ff0000;
    border-top: 16px solid transparent;
    border-bottom: 16px solid transparent;
}
.support-hotline  .div_content:after{
    position: absolute;
    content: '';
    top: 18px;
    right: -14px;
    border-left: 14px solid #fff;
    border-top: 14px solid transparent;
    border-bottom: 14px solid transparent;
}
.support-hotline  .div_content .title_hotline{
    font-size: 14px;
    line-height: 20px;
    margin-bottom: 0;
    text-transform: uppercase;
    color: #333333;
}
.support-hotline  .div_content .number_phone a{
    font-size: 26px;
    line-height: 40px;
    color: #ff0000;
    margin-bottom: 10px;
    position: relative;
    font-weight: bold;
}
.support-hotline  .div_content .yahoo_skype{
    margin-bottom: 0;
}
.support-hotline  .div_content .yahoo_skype .fl{
    width: 49%;
    float: left;
    background: #521596;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -o-border-radius: 4px;
    -ms-border-radius: 4px;
    border-radius: 4px;
    -webkit-transition:all 0.5s ease;
    -moz-transition:all 0.5s ease;
    -o-transition:all 0.5s ease;
    transition:all 0.5s ease;
}
.support-hotline  .div_content .yahoo_skype .fr{
    width: 45%;
    float: left;
    background: #00adef;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -o-border-radius: 4px;
    -ms-border-radius: 4px;
    border-radius: 4px;
    -webkit-transition:all 0.5s ease;
    -moz-transition:all 0.5s ease;
    -o-transition:all 0.5s ease;
    transition:all 0.5s ease;
    margin-left: 10px;

}
.support-hotline  .div_content .yahoo_skype a{
    display: block;
    font-size: 14px;
    line-height: 20px;
    padding: 7px 10px 7px 45px;
    color: #ffffff;
    font-style: italic;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -o-border-radius: 4px;
    -ms-border-radius: 4px;
    border-radius: 4px;
    -webkit-transition:all 0.5s ease;
    -moz-transition:all 0.5s ease;
    -o-transition:all 0.5s ease;
    transition:all 0.5s ease;
    background-repeat: no-repeat;
    background-position: 10px 50%;
}
.support-hotline  .div_content .yahoo_skype a:hover{
    background-color: #0085ba;
}

@-moz-keyframes quick-alo-circle-img-anim {
    0% {
        transform: rotate(0deg) scale(1) skew(1deg)
    }
    10% {
        -moz-transform: rotate(-25deg) scale(1) skew(1deg)
    }
    20% {
        -moz-transform: rotate(25deg) scale(1) skew(1deg)
    }
    30% {
        -moz-transform: rotate(-25deg) scale(1) skew(1deg)
    }
    40% {
        -moz-transform: rotate(25deg) scale(1) skew(1deg)
    }
    50% {
        -moz-transform: rotate(0deg) scale(1) skew(1deg)
    }
    100% {
        -moz-transform: rotate(0deg) scale(1) skew(1deg)
    }
}

@-webkit-keyframes quick-alo-circle-img-anim {
    0% {
        -webkit-transform: rotate(0deg) scale(1) skew(1deg)
    }
    10% {
        -webkit-transform: rotate(-25deg) scale(1) skew(1deg)
    }
    20% {
        -webkit-transform: rotate(25deg) scale(1) skew(1deg)
    }
    30% {
        -webkit-transform: rotate(-25deg) scale(1) skew(1deg)
    }
    40% {
        -webkit-transform: rotate(25deg) scale(1) skew(1deg)
    }
    50% {
        -webkit-transform: rotate(0deg) scale(1) skew(1deg)
    }
    100% {
        -webkit-transform: rotate(0deg) scale(1) skew(1deg)
    }
}

@-o-keyframes quick-alo-circle-img-anim {
    0% {
        -o-transform: rotate(0deg) scale(1) skew(1deg)
    }
    10% {
        -o-transform: rotate(-25deg) scale(1) skew(1deg)
    }
    20% {
        -o-transform: rotate(25deg) scale(1) skew(1deg)
    }
    30% {
        -o-transform: rotate(-25deg) scale(1) skew(1deg)
    }
    40% {
        -o-transform: rotate(25deg) scale(1) skew(1deg)
    }
    50% {
        -o-transform: rotate(0deg) scale(1) skew(1deg)
    }
    100% {
        -o-transform: rotate(0deg) scale(1) skew(1deg)
    }
}
@keyframes quick-alo-circle-img-anim {
    0% {
        transform: rotate(0deg) scale(1) skew(1deg)
    }
    10% {
        transform: rotate(-25deg) scale(1) skew(1deg)
    }
    20% {
        transform: rotate(25deg) scale(1) skew(1deg)
    }
    30% {
        transform: rotate(-25deg) scale(1) skew(1deg)
    }
    40% {
        transform: rotate(25deg) scale(1) skew(1deg)
    }
    50% {
        transform: rotate(0deg) scale(1) skew(1deg)
    }
    100% {
        transform: rotate(0deg) scale(1) skew(1deg)
    }
}

@-moz-keyframes quick-alo-circle-fill-anim {
    0% {
        transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .2
    }
    50% {
        transform: rotate(0deg) scale(1) skew(1deg);
        opacity: .2
    }
    100% {
        transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .2
    }
}

@-webkit-keyframes quick-alo-circle-fill-anim {
    0% {
        transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .2
    }
    50% {
        transform: rotate(0deg) scale(1) skew(1deg);
        opacity: .2
    }
    100% {
        transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .2
    }
}

@-o-keyframes quick-alo-circle-fill-anim {
    0% {
        transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .2
    }
    50% {
        transform: rotate(0deg) scale(1) skew(1deg);
        opacity: .2
    }
    100% {
        transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .2
    }
}

@keyframes quick-alo-circle-fill-anim {
    0% {
        transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .2
    }
    50% {
        transform: rotate(0deg) scale(1) skew(1deg);
        opacity: .2
    }
    100% {
        transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .2
    }
}

@-moz-keyframes quick-alo-circle-anim {
    0% {
        transform: rotate(0deg) scale(.5) skew(1deg);
        opacity: .1
    }
    30% {
        transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .5
    }
    100% {
        transform: rotate(0deg) scale(1) skew(1deg);
        opacity: .1
    }
}

@-webkit-keyframes quick-alo-circle-anim {
    0% {
        transform: rotate(0deg) scale(.5) skew(1deg);
        opacity: .1
    }
    30% {
        transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .5
    }
    100% {
        transform: rotate(0deg) scale(1) skew(1deg);
        opacity: .1
    }
}

@-o-keyframes quick-alo-circle-anim {
    0% {
        transform: rotate(0deg) scale(.5) skew(1deg);
        opacity: .1
    }
    30% {
        transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .5
    }
    100% {
        transform: rotate(0deg) scale(1) skew(1deg);
        opacity: .1
    }
}

@keyframes quick-alo-circle-anim {
    0% {
        transform: rotate(0deg) scale(.5) skew(1deg);
        opacity: .1
    }
    30% {
        transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .5
    }
    100% {
        transform: rotate(0deg) scale(1) skew(1deg);
        opacity: .1
    }
}
.tel {
    background: #eee;
    background-color: rgb(238, 238, 238);
    background-size: auto auto;
    width: 205px;
    height: 40px;
    position: fixed;
    overflow: hidden;
    background-size: 40px;
    border-radius: 28px;
    border: solid 1px #ccc;
        bottom: 44px;
}
.fone {
    font-size: 22px;
    color: #f00;
    line-height: 35px;
    font-weight: bold;
    padding-left: 60px;
}
.fone a {
    color: #007bff;
}
    </style>