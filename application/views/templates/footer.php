
        </div>
    </div>
</body>

<script>
    var base_url = "<?php echo base_url();?>";
</script>

<!-- add row -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<!-- form modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!--   Core JS Files   -->
<script src="<?= base_url();?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/js/material.min.js" type="text/javascript"></script>


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