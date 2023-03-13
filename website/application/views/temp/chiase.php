 

<?php if($this->config_chiase->color==1){ ?>
<div id="share">

  <!-- facebook -->
  <a class="facebook" href="https://www.facebook.com/share.php?u={{url}}&title={{title}}" target="blank"><i class="icofont-facebook"></i></a>

  <!-- twitter -->
  <a class="twitter" href="https://twitter.com/intent/tweet?status={{title}}+{{url}}" target="blank"><i class="icofont-twitter"></i></a>

  <!-- google plus -->
  <a class="googleplus" href="https://plus.google.com/share?url={{url}}" target="blank"><i class="icofont-google-plus"></i></a>

  <!-- linkedin -->
  <a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url={{url}}&title={{title}}&source={{source}}" target="blank"><i class="icofont-linkedin"></i></a>
  
  <!-- pinterest -->
  <a class="pinterest" href="https://pinterest.com/pin/create/bookmarklet/?media={{media}}&url={{url}}&is_video=false&description={{title}}" target="blank"><i class="icofont-pinterest"></i></a>
  
</div>
<?php }else{?>

 <?php } ?>
<style>
/* Fixed Positioned AddThis Toolbox */
<?php if($this->config_chiase->color==1){ ?>
.sharing_box_namkna {
position: Fixed;
left: 0%;
top: 0%;
border: 0px solid #00EE00;
padding: 5px 5px 1px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
border-radius: 4px;
background: #F0FFFF;
width: 60px;
min-height: 295px;
}
<?php }else{?>
    .sharing_box_namkna {
position: Fixed;
width: 60px;
min-height: 295px;
}
    <?php } ?>
#share {
    width: 100%;
    margin: 100px auto;
    text-align: center;
}

/* buttons */

#share a {
    width: 50px;
    height: 50px;
    display: inline-block;
    margin: 8px;
    border-radius: 50%;
    font-size: 24px;
    color: #fff;
    opacity: 0.75;
    transition: opacity 0.15s linear;
}

#share a:hover {
    opacity: 1;
}

/* icons */

#share i {
    position: relative;
    top: 10%;
    transform: translateY(-50%);
}

/* colors */

.facebook {
    background: #3b5998;
}

.twitter {
    background: #55acee;
}

.googleplus {
    background: #dd4b39;
}

.linkedin {
    background: #0077b5;
}

.pinterest {
    background: #cb2027;
}
</style>