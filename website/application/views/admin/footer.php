</div>
<footer class="main-footer>
<div class="pull-right hidden-xs">
    <b>Version</b> 2.3.8
</div>
<strong>Copyright &copy; 2019-2020 <a href="http://techtology4.0.com/">techtology4.0.com</a>.</strong> All rights
reserved.
</footer>
</div>
<style type="text/css">
ol, ul{
margin-bottom: -10px;
}
.cat_checklist {
list-style: none;
}
.cat_checklist ul{
list-style: none;
}
</style>
<!-- Slimscroll -->
<script src="<?= base_url('assets/css_admin/back_end/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/css_admin/back_end/plugins/fastclick/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/js_admin/app.min.js')?>"></script>

<script src="<?=base_url('assets/js_admin/mainadmin_tech.js')?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/plugin/ValidationEngine/css/validationEngine.jquery.css') ?>">
<script src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine-vi.js') ?>"
charset="utf-8"></script>
<script src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine.js') ?>"></script>
<input type="hidden" id="baseurl" value="<?=base_url('')?>"/>
<div id="show_success_mss" style="position: fixed; top: 40px; right: 20px;z-index:9999;">
<?php if(@$this->session->flashdata('mess')): ?>
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="icon fa fa-success"></i><?=@$this->session->flashdata('mess'); ?>
</div>
<?php endif; ?>

</div>
<script>
$(document).ready(function(){
$(".validate").validationEngine();
});
setTimeout(function(){
$('#show_success_mss').fadeOut().empty();
}, 6000);
function base_url(){
return '<?php echo base_url();?>';
}
window.setTimeout(function(){
window.location.href = base_url() +"/techadmin/logout/index";
}, 1800000);
</script>

</body>
</html>