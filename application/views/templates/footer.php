
        </div>              
    </div>

    <!-- jQuery -->
    <script type="text/javascript"src="assets/js/jquery-3.6.3.js"></script>
    <link href="<?php echo base_url();?>assets/js/jquery-3.6.3.js" />

    <!-- dataTable -->
    <script type="text/javascript"src="assets/datatables/media/js/dataTables.bootstrap.min.js"></script>
    <link href="<?php echo base_url();?>assets/datatables/media/js/dataTables.bootstrap.min.js"/>

    <!-- bootstarap -->
    <script type="text/javascript"src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"/>

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