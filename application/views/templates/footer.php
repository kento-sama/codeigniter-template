
        </div>
    </div>

 <!-- // ADDING BOOTSTRAP // -->

    <script type = 'text/javascript' src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

 <!-- // ADDING DataTable // -->
  
    <script type = 'text/javascript' src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script type = 'text/javascript' src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
    <script type = 'text/javascript' src="<?php echo base_url(); ?>assets/js/dataTables.dataTables.min.js"></script>
    
<!-- //ADDING JQuery // -->

    <script type = 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>


    
</body>

<script>
    var base_url = "<?php echo base_url();?>";
</script>

<!--   Core JS Files   -->
<!-- <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script> -->


<script src="<?php echo base_url('assets/js/helper.js');?>"></script>

<!--   JS plugins -->
<?php if(isset($js_plugins)): ?>
    <?php foreach ($js_plugins as $plugin) : ?>
        <script src="<?php echo base_url('assets/js/plugins').'/'.$plugin.'.js';?>"></script>
    <?php endforeach; ?>
<?php endif;?>

<!--   JS Modules -->
<?php if(isset($modules)): ?>
    <?php foreach ($modules as $module) : ?>
        <script src="<?php echo base_url('assets/js/modules').'/'.$module.'-module.js';?>"></script>
    <?php endforeach; ?>
<?php endif;?>

<!--   Custom JS-->
<?php if(isset($custom_js)): ?>
    <?php foreach($custom_js as $js) : ?>
        <script src="<?php echo base_url('assets/js').'/'.$js.'.js';?>"></script>
    <?php endforeach; ?>
<?php endif;?>